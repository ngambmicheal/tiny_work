@extends('layout.front')

@section('content')
  <!-- /End Mian Header --> 
  <!-- Start Breadcrumb Area-->
    <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li><a href="/store/profile">Profile</a></li>
              <li><a href="/store/settings">Settings</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

<style>
  #side-menu
  {
    width: 12%;
    float:left;

  }
  #main-div
  {
    bottom: 2cm;
  }
  .side-panel
  {
    width: 25%;
  }
</style>




<div id="main-div">
  <div class="company-story-area section-padding">
    <div class="container">
     <div> 

    
      
      <div id="side-menu">
        <div class="company-story-content" ><h2 class="title">Menu</h2></div>

          <ul class="fc-subside nav nav-stacked">
            <li id="list-menu1"><a href="/store/settings/store">Store</a></li>
            <li id="list-menu2"><a href="/store/settings/details">Details</a></li>
            <li id="list-menu3"><a href="/store/settings/categories">Categories</a></li>
            <li id="list-menu4"><a href="/store/settings/logo">Logo</a></li>
            <li id="list-menu5"><a href="/store/settings/employment">Employment</a></li>
            <li id="list-menu6"><a href="/store/settings/policy">Policies</a></li>
            <li id="list-menu7"><a href="/store/settings/style">Style</a></li>
          </ul>
      </div>  


        <!-- About Us Content Here -->  
      <div>
      
    @if($view=='store')
         <script>
       $(document).ready(function()
       {
          $("#list-menu1").addClass("current");
       });
     </script>

        <div class="col-md-7 col-sm-12">

          <div class="company-story-content" ><h2 class="title">Setting <span class="color-text">Store</span> </h2></div>
              <script>
            $(document).ready(function()
            {
               $("#updateStore").submit(function(e)
               {
                    e.preventDefault();
                    $.ajax(
                    {
                       url: '/store/scripts/store_store',
                       method: 'POST',
                       data: $("#updateStore").serialize(),
                       success: function(d)
                       {
                            console.log(d);
                       } 
                    });
                    $("#updateStore").fadeOut('800').fadeIn();
               });
               
            });
            </script>

            <div class="form-fields">
                <form action="" id="updateStore" method="POST">
                <input type="text" class="hidden" value="{{$store->id}}" name="storeid" />
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control txt-fc info" maxlength="50" id="1" name="email" value="<?php echo $row['email']; ?>" />
                        <span id="limit1" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control txt-fc info" id="2" maxlength="12" name="phone" value="<?php echo $row['phone']; ?>" />
                        <span id="limit2" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Mobile:</label>
                        <input type="text" class="form-control txt-fc info" id="3" maxlength="12" name="mobile" value="<?php echo $row['mobile']; ?>" />
                        <span id="limit3" class="limiter"><span>
                    </div>

                    <div class="form-group">
                        <label>Location:</label>
                        <textarea class="txt-fc form-control info" name="location" maxlength="100" id="4" rows="5" cols="5"><?php echo $row['location']; ?></textarea>
                        <span id="limit4" class="limiter"><span>
                    </div>
                    <div class="form-action clearfix">
                        <input class="store-save btn-fc" type="submit" value="Save" style="width:100%;" />
                    </div>
                </form>
            </div>  
        </div>
        <!-- About Us Right Image Here -->
        <div class="col-md-5 col-sm-12 side-panel">
        <div id="div1" class="infoDiv" >
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Email</span> </h2></div>
          <p>Give the primary <span class="color-text">email</span> of your store.</p>
        </div>
           <div id="div2" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Phone Contact</span> </h2></div>
          <p>This is very useful and vital information.</p> <p>Store <span class="color-text">phone</span> number is important. As people tend to call
           and ask for the information. Provide the primary <span class="color-text">phone</span> number of your store.</p>
           <p>Please keep in mind the format of <span class="color-text">phone</span> number.</p>
           <ul>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;First 3 digits are <span class="color-text">area</span> code (021)<li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;Rest of the digits are the <span class="color-text">contact </span>numbers.</li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="color-text">Hyphen</span> or <span class="color-text">dashes</span> will automatically be inserted.</li>
            </ul>
        </div>

        <div id="div3" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Mobile Contact</span> </h2></div>
          <p>This is another very useful and vital information.</p> <p>Store <span class="color-text">mobile</span> number is also important. As people tend to call
           and ask for the information. Provide the primary <span class="color-text">mobile</span> number of your store.</p>
           <p>Please keep in mind the format of <span class="color-text">mobile</span> number.</p>
           <ul>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;First 4 digits are <span class="color-text">network</span> code (021)<li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;Rest of the digits are the <span class="color-text">mobile </span>numbers.</li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;<span class="color-text">Hyphen</span> or <span class="color-text">dashes</span> will automatically be inserted.</li>
            </ul>
        </div>

        <div id="div4" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Location</span> </h2></div>
          <p>If you have single branch then write proper <span class="color-text">address</span> and <span class="color-text">location</span>.</p>
          <p>If you have multiple branches then you can enter <span class="color-text">address</span> of main branch. Further branches will be entertained in setting menu of your store.</p>
          <p>Format of editing:</p>
          <uL>
            <li><span class="color-text">-n- </span> for new line.</li>
            <br />
            <li><span class="color-text">-b- </span> to start the text as <span class="color-text">bold</span> and to end <span class="color-text">-.n- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-b- My Store -.b- will be displayed as <span style="font-style: bold;"> My Store</span></li>
            <br />
            <li><span class="color-text">-i- </span> to start the text as <span class="color-text">italicize</span> and to end <span class="color-text">-.i- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-i- My Store -.i- will be displayed as <span style="font-style: italic;"> My Store</span></li>
            <br />
            <li><span class="color-text">-u- </span> to start the text as <span class="color-text">underlined</span> and to end <span class="color-text">-.u- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-u- My Store -.u- will be displayed as <span style="text-decoration: underline;"> My Store</span></li>
          </uL>
        </div>
        </div>
      
      @endif

       

        <script>
          
          $(document).ready(function()
          {
            $(".info").on('focus',function()
            {
              $(".limiter").hide();
              $(".infoDiv").hide();
              $(".infoDivOnLoad").hide();
              window.id = $(this).attr('id');
              $('#limit'+id).show();
              $("#div"+id).show();

              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
            $("#2").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 3)
              {
                $("#2").val($("#2").val()+'-');
              }
            });
            $("#3").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length ==4)
              {
                $("#3").val($("#3").val()+'-');
              }
            });

          });
          function updateCount() 
          {
            var cs = $(this).val().length;
            var limit = $(this).attr('maxlength');
            var countLeft = limit-cs;
            
            $('#limit'+id).text(countLeft);
            if(countLeft == 0)
            {
              $('#limit'+window.id).text("Limit Reached").css({"color":"Red"});
            }
            else
            {
              $('#limit'+window.id).css({"color":"Black"});
            }
          }
        </script>


     @if($view=='details')
       
         <script>
            $(document).ready(function()
            {
               $("#updateDetails").submit(function(e)
               {
                    e.preventDefault();
                    $.ajax(
                    {
                       url: '/store/scripts/store_details',
                       method: 'POST',
                       data: $("#updateDetails").serialize(),
                       success: function(d)
                       {
                            console.log(d);
                       } 
                    });
                    $("#updateDetails").fadeOut('800').fadeIn();
               });
            });
            </script>
             <script>
       $(document).ready(function()
       {
          $("#list-menu2").addClass("current");
       });
     </script>

        <div class="col-md-7 col-sm-12">
          <div class="company-story-content"><h2 class="title">Setting <span class="color-text">Details</span> </h2></div>
          <div class="form-fields">
                <form action="" id="updateDetails" method="POST">
                <input type="text" class="hidden" value="{{$store->id}}" name="storeid" />
                  <div class="form-group">
                        <label>Tagline:</label>
                        <input type="text" class="form-control txt-fc info" maxlength="50" name="tagline" id="11" value="<?php echo $row['tagline']; ?>" />
                        <span id="limit11" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Impressum:</label>
                        <textarea class="form-control txt-fc info" name="impressum" maxlength="500" rows="5" id="12" cols="5"><?php echo $row['impressum']; ?></textarea>
                        <span id="limit12" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control txt-fc info" name="description" maxlength="500" rows="5" id="13" cols="5"><?php echo $row['description']; ?></textarea>
                        <span id="limit13" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Achievements:</label>
                        <textarea class="form-control txt-fc info" name="achievements" maxlength="500" rows="5" id="14" cols="5"><?php echo $row['achievements']; ?></textarea>
                        <span id="limit14" class="limiter"><span>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Official Website:</label>
                        <input type="text" class="form-control txt-fc info" name="website" maxlength="35" id="15" value="<?php echo $row['website']; ?>" />
                        <span id="limit15" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Facebook:</label>
                        <input type="text" class="form-control txt-fc info" name="facebook" maxlength="35" id="16" value="<?php echo $row['facebook']; ?>" />
                        <span id="limit16" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Twitter:</label>
                        <input type="text" class="form-control txt-fc info" name="twitter" maxlength="35" id="17" value="<?php echo $row['twitter']; ?>" />
                        <span id="limit16" class="limiter"><span>
                    </div>
                    <div class="form-group">
                        <label>Instagram:</label>
                        <input type="text" class="form-control txt-fc info" name="instagram" id="18" value="<?php echo $row['instagram']; ?>" />
                        <span id="limit17" class="limiter"><span>
                    </div>
                    <div class="form-action clearfix">
                        <input class="details-save btn-fc" type="submit" value="Save" style="width:100%;" />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 follow-scroll side-panel">

        <div id="div11" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Tagline</span> </h2></div>
          <p><span class="color-text">Tagline</span> is the main line of your store. It gives quite a great impression.</p>
          <p>Keep in mind that <span class="color-text">tagline</span> should not be long. Just a few letters to describe your store exquisitely.</p>
          <p>You can also update your <span class="color-text">tagline</span> in settings.</p>
        </div>

        <div id="div12" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Impressum</span> </h2></div>
          <p>This is very important to your page.</p>
          <p><span class="color-text">Impressum</span> is the basic policy/rules of your store. Keep in mind every action you want to have in your store.</p>
          <p>Further policies are made in settings once your store is ready to go.</p>
          <p>Write <span class="color-text">Impressum</span> wise and clear. Words/phrases should not be double meaning or confusing. Be open, formal and straight forward.</p>
          <p>Format of editing:</p>
          <uL>
            <li><span class="color-text">-n- </span> for new line.</li>
            <br />
            <li><span class="color-text">-b- </span> to start the text as <span class="color-text">bold</span> and to end <span class="color-text">-.n- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-b- My Store -.b- will be displayed as <span style="font-style: bold;"> My Store</span></li>
            <br />
            <li><span class="color-text">-i- </span> to start the text as <span class="color-text">italicize</span> and to end <span class="color-text">-.i- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-i- My Store -.i- will be displayed as <span style="font-style: italic;"> My Store</span></li>
            <br />
            <li><span class="color-text">-u- </span> to start the text as <span class="color-text">underlined</span> and to end <span class="color-text">-.u- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-u- My Store -.u- will be displayed as <span style="text-decoration: underline;"> My Store</span></li>
          </uL>
        </div>

        <div id="div13" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Description</span> </h2></div>
          <p>Enter the full and proper <span class="color-text">details</span> or <span class="color-text">description</span> of what your store is.</p>
          <p>What kind of products it sells.</p>
          <p>What kind of services it provides.</p>
          <p>How did you open your store.</p>
          <p>What inspired you.</p>
          <p>Every single <span class="color-text">description</span> is very important. Be careful.</p>
          <p>Format of editing:</p>
          <uL>
            <li><span class="color-text">-n- </span> for new line.</li>
            <br />
            <li><span class="color-text">-b- </span> to start the text as <span class="color-text">bold</span> and to end <span class="color-text">-.n- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-b- My Store -.b- will be displayed as <span style="font-style: bold;"> My Store</span></li>
            <br />
            <li><span class="color-text">-i- </span> to start the text as <span class="color-text">italicize</span> and to end <span class="color-text">-.i- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-i- My Store -.i- will be displayed as <span style="font-style: italic;"> My Store</span></li>
            <br />
            <li><span class="color-text">-u- </span> to start the text as <span class="color-text">underlined</span> and to end <span class="color-text">-.u- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-u- My Store -.u- will be displayed as <span style="text-decoration: underline;"> My Store</span></li>
          </uL>
        </div>

        <div id="div14" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Achievements</span> </h2></div>
          <p>Now is the time to write some of the <span class="color-text">achievements</span> of your store.</p>
          <p>Write anything that makes your store's worth stronger.</p>
          <p>Format of editing:</p>
          <uL>
            <li><span class="color-text">-n- </span> for new line.</li>
            <br />
            <li><span class="color-text">-b- </span> to start the text as <span class="color-text">bold</span> and to end <span class="color-text">-.n- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-b- My Store -.b- will be displayed as <span style="font-style: bold;"> My Store</span></li>
            <br />
            <li><span class="color-text">-i- </span> to start the text as <span class="color-text">italicize</span> and to end <span class="color-text">-.i- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-i- My Store -.i- will be displayed as <span style="font-style: italic;"> My Store</span></li>
            <br />
            <li><span class="color-text">-u- </span> to start the text as <span class="color-text">underlined</span> and to end <span class="color-text">-.u- </span>.</li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;-u- My Store -.u- will be displayed as <span style="text-decoration: underline;"> My Store</span></li>
          </uL>
        </div>

        <div id="div15" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Official Website</span> </h2></div>
          <p>If your store has a <span class="color-text">website</span>. Please provide full url for your <span class="color-text">website</span>.</p>
        </div>

        <div id="div16" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Facebook</span> </h2></div>
          <p>If you have <span class="color-text">facebook</span> page or group, provide its username.</p>
        </div>

        <div id="div17" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Twitter</span> </h2></div>
          <p>If you have <span class="color-text">Twitter</span> account, provide its username.</p>
        </div>

        <div id="div18" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Instagram</span> </h2></div>
          <p>If you have <span class="color-text">Instagram</span> account, provide its username.</p>
        </div>


        <div class="cat-infoDiv infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Categories</span> </h2></div>
          <p>Store<span class="color-text"> categories </span> are part of your store.</p>
          <p>Add as many as you can. You can also add or update in settings.</p>
        </div>
        </div>

        @endif





        @if($view=="categories")

    
         <script>
       $(document).ready(function()
       {
          $("#list-menu3").addClass("current");
       });
     </script>
            <script>
            $(document).ready(function()
            {
               $("#updateCategories").submit(function(e)
               {
                    e.preventDefault();
                    $.ajax(
                    {
                       /*url: '../scripts/store_s.php',
                       method: 'POST',
                       data: $("#updateStore").serialize(),
                       success: function(d)
                       {
                            console.log(d);
                       } */
                    });
               });
            });
            </script>
            <script type="text/javascript">
              $(document).ready(function()
              {
                $('.cat-form .add-category').click(function()
                {
                  var n = $('.text-category').length + 1;

                  var category_html = $('<p class="text-category"><label for="category' + n + '">Category <span class="category-number">' + '</span></label> <select class="form-control txt-fc" required type="text" name="categories[]" value="" id="category1">                         @foreach($store->categories as $cat)  <option value="{{$cat->id}}">{{$cat->name}}</option>           @endforeach                       </select> <a href="#" class="remove-category">Remove</a></p>');
                  category_html.hide();
                  $('.cat-form p.text-category:last').after(category_html);
                  category_html.fadeIn('slow');
                  return false;
                });
                $('.cat-form').on('click', '.remove-category', function()
                {
                  $(this).parent().css( 'background-color', '#FF6C6C' );
                  $(this).parent().fadeOut("slow", function() 
                  {
                    $(this).remove();

                    $('.category-number').each(function(index)
                    {
                      $(this).text( index + 1 );
                    });
                  });
                return false;
                });
              });
              $(document).ready(function() 
              {
                $("#newCats").submit(function(e)
                {
                    e.preventDefault();
                    $.ajax(
                    {
                       url: '../scripts/cat_new.php',
                       method: 'POST',
                       data: $("#newCats").serializeArray(),
                       success: function(d)
                       {
                            console.log(d);
                       } 
                    });
                    $("#newCats").fadeOut('800').fadeIn();
                });
                $(".cat-info").on('focus',function()
            {
              //$(".limiter").hide();
              $(".cat-infoDiv").hide();
              //$(".validate").hide();
              $(".infoDiv").hide();
              //$('#limit'+id).show();
              $(".cat-infoDiv").show();

              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
              });
            </script>
            <script>
            /*$(function () 
            {
              $(document).on('click', 'span.loadNum', function () 
              {
                var input = $('<input />', 
                {
                  'type': 'text',
                  'name': 'pre-cat',
                  'value': $(this).html()
                });
                $(this).parent().append(input);
                $(this).remove();
                input.focus();
              });

              $(document).on('blur', 'input', function () 
              {
                $(this).parent().append($('<span />').addClass('loadNum').html($(this).val()));
                $(this).remove();
              });
            });*/
            </script>

            <div class="col-md-7 col-sm-12">
              <div class="company-story-content"><h2 class="title">Setting <span class="color-text">Categories</span> </h2></div>

              <div class="form-fields">
                <form action="" id="updateCategories" method="POST">
                  <input type="text" class="hidden" value="{{$store->id}}" name="storeid" />
                    <div class="form-group">
                        <div class="company-story-content">
                          <a>Current Categories</a>
                          <hr>
                        </div>
                          <div>
                            @foreach($store->categories as $category)
                            <span class="loadNum">{{$category->name}}</span><br/>
                            @endforeach
                          </div>
                    </div>
                </form>
                <div>
                  <form id="newCats" method="POST">
                    <div class="company-story-content">
                          <a>New Categories</a>
                        </div>
                        <hr>
                        <div class="form-group">
                          <div class="cat-form">
                            <p class="text-category">
                
                            <div>
                              <a class="add-category" href="#">Add More</a> 
                            </div>
                            </p>

                          </div>
                        </div>
                        <div class="form-action clearfix">
                        <input class="store-save btn-fc" type="submit" value="Save" style="width:100%;" />
                    </div>
                  </form>

                </div>
            </div>
            </div>

            <div class="col-md-5 col-sm-12 side-panel">
              <div class="cat-infoDiv infoDiv">
                <div class="company-story-content"><h2 class="title">Store <span class="color-text">Categories</span> </h2></div>
                <p>Store<span class="color-text"> categories </span> are part of your store.</p>
                <p>Add as many as you can. You can also add or update in settings.</p>
              </div>
            </div>
        
      @endif





         @if($view=="logo")
         <script>
            $(document).ready(function()
            {
               $("#updateLogo").submit(function(e)
               {
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax(
                    {
                        url: '/store/scripts/logo_up',
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (d)
                        {
                          console.log(d);
                        },
                    });
                    $("#updateLogo").fadeOut('800').fadeIn();
               });
            });
            </script>
             <script>
       $(document).ready(function()
       {
          $("#list-menu4").addClass("current");
       });
     </script>
            <div class="col-md-7 col-sm-12" style=" float: left">
              <div class="company-story-content"><h2 class="title">Setting <span class="color-text">Logo</span> </h2></div>
              <div class="form-fields">
                <form action="" id="updateLogo" method="POST" enctype="multipart/form-data">
                    
                  <div class="form-group">
                  <label for="logo" class="btn-fc">
                    <i class="fa fa-cloud-upload"></i> Logo Upload
                  </label>
                    <input type="hidden" name="storeid" value="{{$store->id}}">
                    <input type="file" name="logo" id="logo" style="display: none;" />
                  </div>
                    <div>
                        <input class="logo-save btn-fc" type="submit" value="Save" style="width:100%;" />
                    </div>
                </form>
            </div>
            </div>

            <div class="col-md-5 col-sm-12" style="width: 25%;">
              <div class="company-story-content"><h2 class="title">Current <span class="color-text">Logo</span> </h2></div>
              <div class="company-story-image"> <img src="{{$store->logo}}" alt="{{$store->name}}" width="460" height="300"> </div> 
            </div>
            

        @endif




        @if($view=="employment")

         <script>
       $(document).ready(function()
       {
          $("#list-menu5").addClass("current");
       });
     </script>
        <script>
            $(document).ready(function()
            {
               $("#formEmp").submit(function(e)
               {
                    e.preventDefault();
                    
                    $.ajax(
                    {
                        url: '/store/scripts/emp_set',
                        type: 'POST',
                        data: $("#formEmp").serialize(),
                        success: function (d)
                        {
                          console.log(d);
                        },
                    });
                    $("#formEmp").fadeOut('800').fadeIn();
               });
              $("#emp").change(function()
              {
                if($(this).prop('checked') == true)
                {
                    
                    $.ajax(
                    {
                        url: '../scripts/emp_up.php',
                        type: 'POST',
                        success: function (d)
                        {
                          console.log(d);
                        },
                    });
                    $("#emp-span").text("Opened");
                }
                else
                {
                    $.ajax(
                    {
                        url: '../scripts/emp_down.php',
                        type: 'POST',
                        success: function (d)
                        {
                          console.log(d);
                        },
                    });
                    $("#emp-span").text("Closed");
                }
              });
            });
            </script>
            <div class="col-md-7 col-sm-12">
              <div class="company-story-content"><h2 class="title">Setting <span class="color-text">Employment</span> </h2></div>
              <div class="form-fields">
                <form action="" id="" method="POST">
                    <p>Employment status indicates whether your store is open to hire employees that would work with your store.</p>
                  <div class="form-group">
                    <input id="emp" type="checkbox" name="emp_status"  /> Currently: <span id="emp-span"></span>
                  </div>
                </form>
            </div>
            <div class="form-fields">
              <form action="" id="formEmp" method="POST">
                <div>
                  <p>Set settings of your employment.</p>
                </div>
              <div class="form-group">
                <input type="hidden" value="{{$store->id}}" name="storeid">
                <div class="form-group">Mininum Salary: <input type="text" class=" form-control txt-fc" name="min_wage" style="width:200px" value="<?php echo $store['min_wage']; ?>"></div>
                <div class="form-group">Maximum Salary: <input type="text" name="max_wage" class=" form-control txt-fc" style="width:200px" value="<?php echo $store['max_wage']; ?>"></div>
              Message: <textarea cols="5" rows="5" class="form-control txt-fc info" id="1" maxlength="200" name="message" class="form-control"><?php echo $store['message']; ?></textarea>
              <span id="limit1" class="limiter"><span>
              </div>
              <div>
                <input type="submit" name="emp_set_submit" value="Save" class="btn-fc" style="width:100%;">
              </div>
              </form>
            </div>
            <div>
              <br />
              <br />
              <div class="company-story-content"><h2 class="title">Current <span class="color-text">Employees</span> </h2></div>
              <table class="table table-hover table-condensed table-responsive">
                <thead>
                  <tr>
                    <td>Names</td>
                    <td>Status</td>
                  </tr>
                </thead>
                <tbody>
             @foreach($store->employees as $emps)
                  <tr>
                    <td><a class="getemp" id="<?php echo $emps['employee_id']; ?>" href="#"><?php echo $emps['first_name']." ".$emps['last_name']; ?></a></td>
                    <td><?php echo $emps['employee_status']; ?></td>
                  </tr>
            @endforeach
                <p id="namememe"></p>
                </tbody>
              </table>
            </div>
            </div>
            <script>
              $(document).ready(function()
              {
                $(".getemp").click(function(e)
                {
                  e.preventDefault();
                  var id = $(this).attr('id');
                  $.ajax(
                  {
                    url: '../scripts/get_emp.php',
                    method: 'POST',
                    data:{"id":id},
                    dataType: "json",
                    success:function(data)
                    {
                      emp_id = data.employee_id;
                     
                      first_name = data.first_name;
                      middle_name= data.middle_name;
                      last_name= data.last_name;
                      email= data.email;
                      contact= data.contact;
                      dob= data.dob;
                      mobile= data.mobile;
                      status= data.employee_status;
                      designation= data.designation;
                      salary= data.salary;
                      $("#emp_id").val(emp_id);
                      $(".emp_name").text(first_name);
                      $("#emp_fullname").text(first_name + " " + middle_name + " " + last_name);
                      $("#emp_email").text(email);
                      $("#emp_phone").text(contact);
                      $("#emp_mobile").text(mobile);
                      $("#emp_dob").text(dob);
                      $("#emp_status").text(status);
                      $("#emp_designation").text(designation);
                      $("#emp_salary").text(salary);
                      $("#txt_emp_designation").val(designation);
                      $("#txt_emp_salary").val(salary);

                      console.log(data);
                    }

                  });
                });
              });
            </script>
            <style>
              #editService
              {
                width: 15%;
              }
            </style>
            
          <div class="col-md-5 col-sm-12" id="editService">
          <div class="company-story-content"><h2 class="title">View <span class="color-text emp_name"></span> </h2></div>
          <table class="table table-hover table-condensed table-responsive">
                    <tr><td>Full Name:</td><td><span class="color-text" id="emp_fullname"></span></td></tr>
                    <tr><td>Email:</td><td><span class="color-text" id="emp_email"></span></td></tr>
                    <tr><td>Phone:</td><td><span class="color-text" id="emp_phone"></span></td></tr>
                    <tr><td>Mobile:</td><td><span class="color-text" id="emp_mobile"></span></td></tr>
                    <tr><td>Date of Birth:</td><td><span class="color-text" id="emp_dob"></span></td></tr>
                    <tr><td>Status</td><td><span class="color-text" id="emp_status"></span></td></tr>
                    <tr><td>Designation:</td><td><span class="color-text" id="emp_designation"></span></td></tr>
                    <tr><td>Salary:</td><td><span class="color-text" id="emp_salary"></span></td></tr>

          </table>

          <script>
            $(document).ready(function()
            {
              $("#showServiceForm").click(function()
              {
                $("#hiddenFormService").show();
              });
              $("#ServiceForm").submit(function(e)
              {
                e.preventDefault();
                $.ajax(
                {
                  url: '../scripts/save_emp_dets.php',
                  method: 'POST',
                  data: $("#ServiceForm").serialize(),
                  success:function(d)
                  {
                    console.log(d);
                  }
                });
                $("#ServiceForm").fadeOut('800', function(){}).fadeIn();
              });
            });
          </script>
         <a style="cursor:pointer;" id="showServiceForm">Edit Service</a>
         <div id="hiddenFormService" style="display:none;">
          <div class="company-story-content"><h2 class="title">Service of <span class="color-text emp_name"></span> </h2></div>
          <form accept="" method="POST" id="ServiceForm">
            <input type="text" class="hidden" name="emp_id" id="emp_id" value="" />
            <div class="form-group">Designation: <input type="text" class="form-control txt-fc" name="designation" value="" id="txt_emp_designation"/></div>
            <div class="form-group">Salary: <input type="text" name="salary" class="form-control txt-fc" value="" id="txt_emp_salary"/></div>
            <input type="submit" name="Submit" style="width:100%" value="Save" class="btn-fc" />
          </form>
         </div>
        </div>
          @endif



      @if($view=="policy")

         <script>
       $(document).ready(function()
       {
          $("#list-menu6").addClass("current");
       });
     </script>
        <script>
          $(document).ready(function()
          {
            $("#formPolicies").submit(function(e)
            {
              e.preventDefault();
              $.ajax(
              {
                url: '/store/scripts/add_pol',
                method: 'POST',
                data: $("#formPolicies").serialize(),
                success: function(d)
                {
                  console.log(d);
                }
              });
              $("#formPolicies").fadeOut('800', function()
              {
                $(this)[0].reset();
              }).fadeIn();
            });
          
          });
        </script>

          <div class="col-md-7 col-sm-12">
              <div class="company-story-content"><h2 class="title">Setting <span class="color-text">Policies</span> </h2></div>
              <form action="" method="POST" id="formPolicies">
                <div class="form-group">Title of Policy: <input type="text" name="title" class="info form-control txt-fc" maxlength="30" id="57" /></div>
                <span id="limit57" class="limiter"></span>
                <div class="form-group">Give two word Tag: <input type="text" name="tag" class="info form-control txt-fc" maxlength="15" id="58" /></div>
                <span id="limit58" class="limiter"></span>
                <input type="hidden" name="storeid" value="{{$store->id}}">
                <div class="form-group">Detailed Policy: <textarea style="resize:vertical;" name="policy" class="form-control txt-fc"></textarea></div>
                <input type="submit" name="submit" class="btn-fc" value="Save" style="width: 100%;" />
              </form>
              
          </div>
          <div class="col-md-5 col-sm-12">
            <div class="company-story-content"><h2 class="title">Existing <span class="color-text">Policies</span> </h2></div>
            
              <table class="table table-responsive table-hover">
                @foreach($store->policies as $policy)
                <tr><td><a href="/store/settings/policy?pol_id={{$policy['id']}}">{{$policy->title}}</a></td></tr>
                @endforeach
              </table>
            
          </div>


          <?php if(isset($_GET['pol_id'])){
      
          ?>
          <script>
          $(document).ready(function()
          {
            $("#formPoliciesUpdate").submit(function(e)
            {
              var t = $("#upTitle").val();
              var p = $("#upPolicy").val();
              e.preventDefault();
              $.ajax(
              {
                url: '../scripts/up_pol.php',
                method: 'POST',
                data: $("#formPoliciesUpdate").serialize(),
                success: function(d)
                {
                  console.log(d);
                }
              });
              $("#formPoliciesUpdate").fadeOut('800', function()
              {
                $(this)[0].reset();
                $("#upTitle").text(t);
                $("#upPolicy").text(p);
              }).fadeIn();
            });
          
          });
        </script>
             <div class="col-md-7 col-sm-12">
              <div class="company-story-content"><h2 class="title">Update <span class="color-text"><?php echo $policy['title']; ?></span> </h2></div>
              <form action="" method="POST" id="formPoliciesUpdate">
                <input type="text" class="hidden" name="pol_id" value="<?php echo $_GET['pol_id']; ?>" />
                <div class="form-group"> <div class="form-group">Title of Policy: <input type="text" name="title" class="info txt-fc form-control" id="upTitle" maxlength="30" id="59" value="<?php echo $policy['title']; ?>" /></div></div>
                <span id="limit59" class="limiter"></span>
                <div class="form-group"> <div class="form-group">Tag: <input type="text" name="tag" class="txt-fc form-control info" maxlength="15" id="60" value="<?php echo $policy['tag']; ?>" /></div></div>
                <span id="limit60" class="limiter"></span>
                <div class="form-group"> <div class="form-group">Detailed Policy: <textarea style="resize:vertical;" name="policy" id="upPolicy" class="form-control txt-fc"><?php echo $policy['policy']; ?></textarea></div></div>
                <input type="submit" name="submit" class="btn-fc" value="Save" />
              </form>
              
          </div>
          <?php } ?>

      @endif







        <?php if($view=='style') {
        
        ?>
         <script>
       $(document).ready(function()
       {
          $("#list-menu7").addClass("current");
       });
     </script>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content" ><h2 class="title">Setting <span class="color-text">Style</span> </h2></div>
              <script>
            $(document).ready(function()
            {
               $("#updateStyle").submit(function(e)
               {
                    e.preventDefault();
                    $.ajax(
                    {
                       url: '/store/scripts/up_style',
                       method: 'POST',
                       data: $("#updateStyle").serialize(),
                       success: function(d)
                       {
                            console.log(d);
                       } 
                    });
                    $("#updateStyle").fadeOut('800').fadeIn();
               });
            });
            </script>

            <script>
              /*$("input[type=text]").keydown(function(e) 
              {
                var oldvalue=$(this).val();
                var field=this;
                setTimeout(function () 
                {
                  if(field.value.indexOf('#') !== 0) 
                  {
                    $(field).val(oldvalue);
                  } 
                }, 1);
              });*/
            </script>
          <style>
          </style>
            <script src="/assets/js/jscolor.js"></script>
            <div class="form-fields">
              <form action="" id="updateStyle" method="POST">
              
            <div>

            <div style="width: 25%; float: left; margin-right: 10px;">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="tab" href="#anchor">Anchor</a></li>
                <li><a data-toggle="tab" href="#button">Button</a></li>
                <li><a data-toggle="tab" href="#textbox">TextBox</a></li>
                <li><a data-toggle="tab" href="#mainmenu">Main Menu</a></li>
                <li class="side"><a class="side" data-toggle="tab" href="#sidemenu">Side Menu</a></li>
                <li><a data-toggle="tab" href="#socacc">Social/Account</a></li>
                <li><a data-toggle="tab" href="#footer">Footer</a></li>
                <li><a data-toggle="tab" href="#heading">Heading</a></li>
                <li><a data-toggle="tab" href="#breadcrumb">Breadcrumbs</a></li>
              </ul>
            </div>

            <div style="">
              <div class="tab-content">

                <div id="anchor" class="tab-pane fade in active">
                  <div class="form-group">
                    <table class="table table-responsive">
                        <tr><td><span>Color of Text</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="71" maxlength="7" name="a" value="<?php echo $style['a']; ?>" /></td></tr>
                        <tr><td><span>Color When Hovered</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="72" maxlength="7" name="a_hover" value="<?php echo $style['a_hover']; ?>" /></td></tr>
                        <tr><td><span>Color When Clicked</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="73" maxlength="7" name="a_click" value="<?php echo $style['a_click']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <div id="button" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Default Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="74" maxlength="7" name="btn" value="<?php echo $style['btn']; ?>" /></td></tr>
                      <tr><td><span>Hover Style</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="75" maxlength="7" name="btn_hover" value="<?php echo $style['btn_hover']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="textbox" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Border Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="76" maxlength="7" name="txt_border" value="<?php echo $style['txt_border']; ?>" /></td></tr>
                      <tr><td><span>Border When Hovered</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="77" maxlength="7" name="txt_border_hover" value="<?php echo $style['txt_border_hover']; ?>" /></td></tr>
                      <tr><td><span>Border When Focused</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="78" maxlength="7" name="txt_border_focus" value="<?php echo $style['txt_border_focus']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="mainmenu" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Color of Text</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="79" maxlength="7" name="top_menu" value="<?php echo $style['top_menu']; ?>" /></td></tr>
                      <tr><td><span>Color When Hovered</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="710" maxlength="7" name="top_menu_hover" value="<?php echo $style['top_menu_hover']; ?>" /></td></tr>
                      <tr><td><span>Color When Clicked</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="711" maxlength="7" name="top_menu_active" value="<?php echo $style['top_menu_active']; ?>" /></td></tr>
                      <tr><td><span>Active State Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="723" maxlength="7" name="top_menu_current" value="<?php echo $style['top_menu_current']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="sidemenu" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Color of Text</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="712" maxlength="7" name="side_menu" value="<?php echo $style['side_menu']; ?>" /></td></tr>
                      <tr><td><span>Color When Hovered</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="713" maxlength="7" name="side_menu_hover" value="<?php echo $style['side_menu_hover']; ?>" /></td></tr>
                      <tr><td><span>Color When Clicked</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="714" maxlength="7" name="side_menu_active" value="<?php echo $style['side_menu_active']; ?>" /></td></tr>
                      <tr><td><span>Active State Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="724" maxlength="7" name="side_menu_current" value="<?php echo $style['side_menu_current']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="socacc" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Color of Social Media</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="715" maxlength="7" name="top_social_media" value="<?php echo $style['top_social_media']; ?>" /></td></tr>
                      <tr><td><span>Color of Account</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="716" maxlength="7" name="fc_action" value="<?php echo $style['fc_action']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="footer" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Background Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="717" maxlength="7" name="footer" value="<?php echo $style['footer']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="heading" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Colored Paragraph</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="719" maxlength="7" name="important_span" value="<?php echo $style['important_span']; ?>" /></td></tr>
                      <tr><td><span>Heading Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="720" maxlength="7" name="heading" value="<?php echo $style['heading']; ?>" /></td></tr>
                      <tr><td></td><td></td></tr>
                    </table>
                  </div>
                </div>

                <div id="breadcrumb" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td><span>Background Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="721" maxlength="7" name="breadcrumb" value="<?php echo $style['breadcrumb']; ?>" /></td></tr>
                      <tr><td><span>Anchor Color</span></td><td><input type="text" class="txt-fc info fc-color jscolor user-styler" id="722" maxlength="7" name="breadcrumb_a" value="<?php echo $style['breadcrumb_a']; ?>" /></td></tr>
                    </table>
                  </div>
                </div>

                <div id="breadcrumb" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td></td><td></td></tr>
                      <tr><td></td><td></td></tr>
                      <tr><td></td><td></td></tr>
                    </table>
                  </div>
                </div>

                <div id="breadcrumb" class="tab-pane fade">
                  <div class="form-group">
                    <table class="table table-responsive">
                      <tr><td></td><td></td></tr>
                      <tr><td></td><td></td></tr>
                      <tr><td></td><td></td></tr>
                    </table>
                  </div>
                </div>


              </div>
            </div>

            </div>

                    <div class="form-action clearfix">
                        <input class="store-save btn-fc" type="submit" value="Save" style="width:100%;" />
                    </div>
                </form>
            </div>  
        </div>
        <script>
        
          $(document).ready(function()
          {
            $(".user-styler").on('change', function()
            {
              var id = $(this).attr('id');
              var hex = $(this).val();
              $("#"+id).css({"background-color":"#"+hex});
              if(id == 71)
              {
                  
                  $(".a").css({"color":"#"+hex});
              }
              if(id == 72)
              {
                  $(".a").hover(function()
                  {
                    $(this).css({"color":"#"+hex});
                  });
              }
              if(id == 73)
              {
                $(".a").on('click', function()
                {

                  $(this).css({"color":"#"+hex});
                  $(this).attr('target', '_blank');
                })
              }
              if(id == 74)
              {
                $(".btn-style").css({"background-color":"#"+hex});
              }
              if(id == 75)
              {
                $(".btn-style").hover(function()
                {
                  $(this).css({"background-color":"#"+hex})
                });
              }
              if(id == 76)
              {
                $(".txt-style").css({"border-color": "#"+hex});
              }
              if(id == 77)
              {
                $(".txt-style").hover(function()
                {
                  $(this).css({"border-color": "#"+hex});
                })
              }
              if(id == 78)
              {
                $(".txt-style").blur(function()
                {
                  $(this).css({"border-color": "#"+hex});
                })
              }
              if(id == 79)
              {
                $(".main-menu-area ul.text-right li a").css({"color":"#"+hex});
              }
              if(id == 710)
              {
                $(".main-menu-area ul.text-right li a").hover(function()
                {
                  $(this).css({"color":"#"+hex});
                });
              }
              if(id == 711)
              {
                $(".main-menu-area ul.text-right li a").click(function()
                {
                  $(this).css({"color":"#"+hex});
                });
              }
              if(id == 712)
              {
                $("ul.fc-subside li a").css({"color":"#"+hex});
              }
              if(id == 713)
              {
                $("ul.fc-subside li a").hover(function()
                {
                  $(this).css({"color":"#"+hex});
                });
              }
              if(id == 714)
              {
                $("ul.fc-subside li a").click(function()
                {
                  $(this).css({"color":"#"+hex});
                });
              }
              if(id == 715)
              {
                $(".header-top-left > p > span > a").css({"color":"#"+hex});
              }
              if(id == 716)
              {
                $(".header-top-right > ul > li > a > i").css({"color":"#"+hex});
              }
              if(id == 717)
              {
                $(".footer-bottom-area").css({"background-color":"#"+hex});
              }
              if(id == 719)
              {
                $(".color-text").css({"color":"#"+hex});
              }
              if(id == 720)
              {
                $(".title .color-text").css({"color":"#"+hex});
              }
              if(id == 721)
              {
                $(".breadcrumb-area ol.breadcrumb").css({"background-color":"#"+hex});
              }
              if(id == 722)
              {
                $(".breadcrumb-area ol.breadcrumb li a").css({"color":"#"+hex});
              }
              if(id == 723)
              {
                $(".main-menu-area ul.text-right li a.current").css({"color":"#"+hex});
              }
              if(id == 724)
              {
                $("ul.fc-subside li.current").css({"background-color":"#"+hex});
                $("side").css({"background-color":"#"+hex});
              }
            });

          });  

        </script>
        <!-- About Us Right Image Here -->
    <div class="col-md-5 col-sm-12 side-panel" >
        <div id="0" class="infoDivOnLoad">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Style</span> </h2></div>
          <p>Here you create your own style sheet of your store. Be careful and give it a lot of time because appereance of your store is important.</p>
          <p>Colors are defined by their HEX (ffffff is for white).</p>
          <p>HEX picker is visible once clicked on the textbox, below. Just float on the color picker and HEX will be picked automatically.</p>
        </div>
        <div id="div71" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Anchor <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the links.</p>
          <a class="a" href="">This is the Anchor Link</a>
        </div>       
        <div id="div72" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Anchor <span class="color-text">Hovered</span> </h2></div>
          <p>Select the color of the links when mouse is hovered on it but not clicked.</p>
          <a class="a" href="">This is the Anchor Link hover on it.</a>
        </div>
        <div id="div73" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Anchor <span class="color-text">Clicked</span> </h2></div>
          <p>Select the color of the links when mouse is clicked on it.</p>
          <a class="a" href="" id="aTag">This is the Anchor Link click on it.</a>
        </div>
        <div id="div74" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Button <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the buttons.</p>
          <input type="button" style="width: 100%;" class="btn-style btn-fc" value="Button" />
        </div>
        <div id="div75" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Button <span class="color-text">Hovered</span> </h2></div>
          <p>Select the color of the buttons when mouse is hovered on it.</p>
          <input type="button" style="width: 100%;" class="btn-style btn-fc" value="Button" />
        </div>

        <div id="div76" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Textbox <span class="color-text">Border</span> </h2></div>
          <p>Select the color of the textbox border.</p>
          <p>The grey outline is the border. Check below.</p>
          <input type="text" class="txt-style txt-fc" placeholder="Text Box" />
        </div>
        <div id="div77" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Textbox <span class="color-text">Hovered</span> </h2></div>
          <p>Select the color of the textbox when mouse is hovered on it.</p>
          <input type="text" class="txt-style txt-fc" placeholder="Text Box" />
        </div>
        <div id="div78" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Textbox <span class="color-text">Focused</span> </h2></div>
          <p>Select the color of the buttons when mouse is clicked on it.</p>
          <input type="text" class="txt-style txt-fc" placeholder="Text Box" />
        </div>
        <div id="div79" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Main Menu <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the main menu and sub main menu.</p>
          
        </div>
        <div id="div710" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Main Menu <span class="color-text">Hovered</span> </h2></div>
          <p>Select the color of the main menu and sub main menu when mouse is hovered on it.</p>
          
        </div>
        <div id="div711" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Main Menu <span class="color-text">Focused</span> </h2></div>
          <p>Select the color of the main menu and sub main menu when mouse is clicked on it.</p>
          
        </div>

         <div id="div712" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Side Menu <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the side menu.</p>
          
        </div>
        <div id="div713" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Side Menu <span class="color-text">Hovered</span> </h2></div>
          <p>Select the color of the side menu when mouse is hovered on it.</p>
          
        </div>
        <div id="div714" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Side Menu <span class="color-text">Focused</span> </h2></div>
          <p>Select the color of the side menu when mouse is clicked on it.</p>
         
        </div>

        <div id="div715" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Social Media <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the social media color.</p>
         
        </div>
        <div id="div716" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Account Action <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the account and search options.</p>
      
        </div>
        <div id="div717" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Footer <span class="color-text">Background</span> </h2></div>
          <p>Select the color of the footer.</p>
     
        </div>
        <div id="div719" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Colored <span class="color-text">Texts</span> </h2></div>
          <p>Select the color of the text that are colored in the paragraph.</p>
          
        </div>
        <div id="div720" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Colored <span class="color-text">Heading</span> </h2></div>
          <p>Select the color of the colored headings.</p>
          
        </div>
        <div id="div721" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Breadcrumb Background <span class="color-text">Color</span> </h2></div>
          <p>Select the color of the background color of your breadcrumb.</p>
    
        </div>
        <div id="div722" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Breadcrumb Text<span class="color-text"> Color</span> </h2></div>
          <p>Select the color of the text in breadcrumb.</p>
    
        </div>
        <div id="div723" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Active State<span class="color-text"> Color</span> </h2></div>
          <p>Select the color of the text when that main menu is currently active ie. You are currently inside.</p>
    
        </div>

        <div id="div724" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Active State<span class="color-text"> Color</span> </h2></div>
          <p>Select the color of the text when that side menu is currently active ie. You are currently inside.</p>
    
        </div>

        </div>
        <?php } ?>


















      </div>
    </div>
  </div>
  </div>
</div>

</div>
<!-- /End Contcat Us Page --> 


@stop