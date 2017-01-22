@extends('layout.new_front')


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
              <li><a href="/storelist">Store List</a></li>
              <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Apply</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 
  <!-- Start Single Product Detailes -->
  <div class="single-product-details-area">
    <div class="container">
      <div class=""> 
        <!-- Start Product Details Image -->
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="single-product-large-image">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active fade in" id="single-img-1"> <img class="img-responsive " src="{{$store['logo']}}" alt="<?php echo $store['name'] ?>"> </div>
            </div>
          </div>
          <div class="single-product-small-image">

          </div>
        </div>
        <!-- /End Product Details Image --> 
        <!-- Start Product Details Content -->
        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="product-details"> 
            <!-- Product Name -->
            <a href="<?php echo "../index.php?store=".$store['store_username']; ?>"><h2 class="product-name"> <?php echo $store['store_name']; ?> </h2></a>
            <!-- Product Reviews Stars -->
            <?php $avg = Helper::get_average($store->id, 'store');?>
            
            @if($avg)
            <div class="reviews">
              <ul class="reviews-star">
             
               @for($i=1;$i<=(int)$avg;$i++)
                <li class="star-active"> <a> <i class="icon_star"></i> </a> </li>
               @endfor
              </ul>
              
            </div>
          @endif
            <!-- Product Price -->
            <div class="product-price-area">
              <p class="color-text">Rs. <?php echo $store['min_wage']; ?> - <span class="color-text">Rs. <?php echo $store['max_wage']; ?> </span> </p>
            </div>
            <!-- Products Short Description -->
            <p class="product-details-content" style="text-align: justify; text-justify: inter-word;">{!!$store['description'] !!}</p>
            <!-- Product Stock Availability -->
            <p class="availability">Employment: <?php if($store['employment'] == 1){?><span class="instock"> Open</span><?php } ?><?php if($store['employment']==0){?><span style="color: Red;" class="instock"> Closed</span><?php }?></p>
            <!-- Products Fillter Options -->
          </div>
        </div>
        <!-- /End Product Details Content --> 
      </div>
      <!-- Start Products Descriptions Tabs -->
      <div class="">
        <div class="product-descriptions-tabs clearfix padding-bottom">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="descriptions-tabs-nav" role="tablist">
              <li role="presentation" class="active"> <a href="#description" aria-controls="description" role="tab" data-toggle="tab"> Impressum </a> </li>
              <li role="presentation"> <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"> Reviews </a> </li>
            </ul>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="tab-content descriptions-content">
              <div role="tabpanel" class="tab-pane active fade in" id="description">
                <p style="text-align: justify;text-justify: inter-word;">{!! $store['impressum'] !!}</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="reviews">
                
              <script>
                $(document).ready(function()
                {
                  $(".star").click(function(e)
                  {
                    e.preventDefault();
                    window.star = $(this).attr("id");
                    $('.star').children('.icon_star').removeClass('star-active');
                    $(this).children('.icon_star').addClass('star-active');
                  });
                  $("#rev_form").submit(function(e)
                  {
                    e.preventDefault();
                    var store = $("#rev_store").attr("value");
                    var name = $("#rev_name").val();
                    var email = $("#rev_email").val();
                    var rev = $("#rev_rev").val();
                    $.ajax(
                    {
                      url: '/save_reviews',
                      method: 'GET',
                      data: {"rev_store": store, "rev_name":name, "rev_email":email, "rev_rev":rev, "rev_star": star,"type":"store"},
                      success: function(d)
                      {
                        console.log(d);
                      }
                    });
                  });
                });
              </script>

                <div class="reviews-form">
                  <h2>Write your review now.</h2>
                  <form action="" method="POST" id="rev_form">
                   <div class="form-group rating">
                   <input type="text" class="hidden" name="rev_store" id="rev_store" value="{{$store->id}}">
                      <p>Rating : </p>
                      <ul class="reviews-star-list">
                        <li> <a href="" class="star" id="1"> <i class="icon_star"></i> </a> </li>
                        <li> <a href="" class="star" id="2"> <i class="icon_star"></i> </a> </li>
                        <li> <a href="" class="star" id="3"> <i class="icon_star"></i> </a> </li>
                        <li> <a href="" class="star" id="4"> <i class="icon_star"></i> </a> </li>
                        <li> <a href="" class="star" id="5"> <i class="icon_star"></i> </a> </li>
                      </ul>
                    </div>
                    <div class="form-group">
                      <input type="text" class="txt-fc form-control" name="rev_name" id="rev_name" placeholder="Write your name..." required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="txt-fc form-control" name="rev_email" id="rev_email" placeholder="Write your Email..." required>
                    </div>
                    <div class="form-group">
                      <textarea name="rev_rev" class="txt-fc form-control" id="rev_rev" placeholder="Write your review here..." required></textarea>
                    </div>
                   
                    <div class="">
                      <input type="submit" value="Submit" class="btn-fc" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /End Products Descriptions Tabs --> 
      <!-- Related Products Title -->
    @if($view=='account')
      <div class="row">
        <div class="col-md-12 col-sm-12"> 
          <!-- Section Title  -->
          <div class="company-story-content">
            <h2 class="title">Account at <span class="color-text">Mera Store</span> </h2>
          </div>
        </div>
      </div>
      <!-- Related Products Row -->
      <script>
        $(document).ready(function()
        {
          /*$("#reg_form").submit(function(e)
          {
            e.preventDefault();
            $.ajax(
            {
              url: '/store/employment.php',
              method: 'POST',
              data: $("#reg_form").serialize(),
              success: function(d)
              {
                console.log(d);
              }
            });
          });*/
          //$("#reg_form").hide();
          $("#regNew").click(function(e)
          {
            e.preventDefault();
            $("#reg_form").toggleClass("hidden");
          })
        });
      </script>
      <style>
        .btn-fc:hover
        {
          background: #ffad1f;
        }
      </style>
      <div class="">
      
        <form method="post" name="registration_form" id="reg_form" action="employment.php" class="hidden">
              <input type="text" name="storeid" value="{{$store->id}}" class="hidden" />
              <div class="form-title">
            </div>
                <div class="form-group">
                  <label>Email<span>*</span></label>
                  <input class="form-control txt-fc" type="text" name="email" id="email" required />
                </div>
                <div class="form-group">
                  <label>Username<span>*</span></label>
                  <input  class="form-control txt-fc" type='text' name='username' id='username' required />
                </div>
                <div class="form-group">
                  <label>Password<span>*</span></label>
                  <input class="form-control txt-fc" type="password" name="password" id="password" />
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control txt-fc" type="password" name="confirmpwd" id="confirmpwd" />
                </div>
                <input class="hidden" name="priv" value="Employee"/>
                <div class="">
                  <input class="btn-fc" style="background: #00B2ED;" type="submit" value="Continue" onclick="return regformhash(this.form,this.form.username,this.form.email,this.form.password,this.form.confirmpwd);" />
                </div>
              </form>
              <a href="#" id="regNew">Register as New Employee!</a>
              <p>OR</p>
              <a href="/employment/details">Already have account?</a>
      </div>
    
      @endif




















      @if($view=="details")

     


        <div class="row">
        <div class="col-md-12 col-sm-12"> 
          <!-- Section Title  -->
          <div class="company-story-content">
            <h2 class="title">Account at <span class="color-text">Mera Store</span> </h2>
          </div>
        </div>
      </div>
      <!-- Related Products Row -->
      <script>
         $(document).ready(function()
        {
          $("#formEmployee").submit(function(e)
          {
            e.preventDefault();
            var sid = $("#storeid").attr('value');
            var eid = $("#empid").attr('value');
            $.ajax(
            {
              url: '../scripts/emp_dets.php',
              method: 'POST',
              data: $("#formEmployee").serialize(),
              success: function(d)
              {
                console.log(d);
              }
            });
            window.location.replace("http://localhost:9999/store/employment.php?view=apply&store="+sid);
          });
        });
      </script>
        <script>
          $(document).ready(function()
          {
            $(".info").on('focus',function()
            {
              $(".limiter").hide();
              //$(".validate").hide();
              window.id = $(this).attr('id');
              $('#limit'+id).show();
              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
            $("#4").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 3)
              {
                $("#4").val($("#4").val()+'-');
              }
            });
            $("#5").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 4)
              {
                $("#5").val($("#5").val()+'-');
              }
            });
            $("#6").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 2)
              {
                var dd = $(this).val().length == 2;
                /*if(dd>31)
                {
                  this.value = this.value.replace(/[^0-9\.|-]/g,'');
                }*/
                $("#6").val($("#6").val()+'-');
              }
              if($(this).val().length == 5)
              {
                $("#6").val($("#6").val()+'-');
              }
            });
            $("#7").on('keyup',function(e)
            {
              this.value = this.value.replace(/[^0-9\.|-]/g,'');
              if($(this).val().length == 5)
              {
                $("#7").val($("#7").val()+'-');
              }
              if($(this).val().length == 13)
              {
                $("#7").val($("#7").val()+'-');
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
      <div class="">
        <form action="" method="post" id="formEmployee">
                <div class="form-title">
                    <p>Lets get your profile set up.</p>
                </div>
                <div class="form-group">    
                <div>
                    <input class="hidden" id="storeid" type="text" name="store" value="{{$store->id}}"/>
                    <input class="hidden" type="text" id="empid" name="user" value="<?php echo $_GET['employee'] ?>"/>
                </div>
                  <label>First Name <span>*</span></label>
                  <input required type="text" name="firstname" class="txt-fc info form-control" id="1" maxlength="50"  />
                  <span id="limit1" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" name="middlename" class="txt-fc info form-control" maxlength="50" id="2" />
                  <span id="limit2" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>Last Name<span>*</span></label>
                  <input required type="text" name="lastname" class="txt-fc info form-control" maxlength="50" id="3" />
                  <span id="limit3" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>Contact<span>* (eg 021-12345678)</span></label>
                  <input type="text" name="contact" class="txt-fc info form-control" maxlength="12" id="4" />
                  <span id="limit4" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>Mobile<span>* (eg 0333-1234567)</span></label>
                  <input required type="text" name="mobile" class="txt-fc info form-control" maxlength="12" id="5" />
                  <span id="limit5" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>Date of Birth<span>* (eg DD-MM-YYYY)</span></label>
                  <input required type="text" name="dob" class="txt-fc info form-control" maxlength="10" id="6" /> 
                  <span id="limit6" class="limiter"></span>
                </div>
                <div class="form-group">
                  <label>NIC<span>* (eg xxxxx-xxxxxxx-x)</span></label>
                  <input required type="text" name="nic" class="txt-fc info form-control" maxlength="15" id="7" /> 
                  <span id="limit7" class="limiter"></span>
                </div>
                <div class="form-action">
                  <input class="button btn-fc" style="background: #00B2ED;" type="submit" value="Continue" name="continue"/>
                </div>
              </form>
          </div>


        @endif


      <?php  if(!isset($_GET['employee'])){ ?>
        <script>
          
          /*$(document).ready(function()
          {
            $("#login_form").submit(function(e)
            {
              e.preventDefault();
              $.ajax(
              {
                url: '../includes/check_emp.php',
                method: 'POST',
                data: ''
              });
            });
          });*/
        </script>
           <form action="/{{$store->username}}/employment/login" method="post" id="" name="login_form">
           <span class=".error"><?php if(isset($_GET['alert'])){echo "Invalid username/password";} ?></span>
           <?php if(isset($_GET['alert'])){if($_GET['alert']==1){echo '<span style="color:Red;">Invalid Email/Password</span>';}} ?>
                <div class="form-group">
                <input class="hidden" required type="text" name="store" value="{{$store->id}}"/>
                  <label>Email<span>*</span></label>

                  <input type="text" name="email" class="txt-fc form-control" placeholder="Email" />
                </div>
                <div class="form-group">
                  <label>Password<span>*</span></label>
                  <input type="password" name="password" id="password" class="txt-fc form-control" placeholder="Password"/>
                </div>
                <div class="form-action">
                  <input class="button btn-fc" style="background: #00B2ED;" type="submit" value="Login" onclick="formhash(this.form, this.form.password);"/>
                  <a href="/passwordrecovery.php?view=verifyemail">Forgot your password ?</a>
                </div>
              </form>

        <?php } 
        ?>


        <?php if($view=="apply"){?>
        <script>
          $(document).ready(function()
          {
            $("#formEmployeeProp").submit(function(e)
            {
              e.preventDefault();
              $.ajax(
              {
                url: '../scripts/emp_prop.php',
                method: 'POST',
                data: $("#formEmployeeProp").serialize(),
                success: function(d)
                {
                  console.log(d);
                }
              });
              $("#formEmployeeProp").fadeOut('800');
              $("#formDiv").html("<p>You have applied. Wait till your store replies. Good luck!</p>");
            });
          });  

        </script>


          <div class="" id="formDiv">
        <form action="" method="post" id="formEmployeeProp">
                <div class="form-title">
                    <p>Apply Now</p>
                </div>
                <div class="form-group">    
                <div>
                    <input class="hidden" required type="text" name="store" value="{{$store->id}}"/>
                    <input class="hidden" type="text" name="user" value="<?php echo $_SESSION['userid']; ?>"/>
                </div>
                  <label>Proposed Salary <span>*</span></label>
                  Rs. <input required type="text" name="prop_sal" class="txt-fc" />
                </div>
                <div class="form-group">
                  <label>Proposal Message</label>
                  <textarea name="prop_message" class="txt-fc form-control" rows="5" cols="5" class="form-control"></textarea>
                </div>
                <div class="form-action">
                  <input class="button btn-fc" style="background: #00B2ED;" type="submit" value="Submit" name="prop_submit"/>
                </div>
              </form>
          </div>
        <?php } ?>













    </div>
  </div>
  <!-- /End Single Product Detailes --> 
 </div>
 

  @stop
