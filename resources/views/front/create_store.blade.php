
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="x-ua-compatible" content="ie=edge"/>
<title>Create Store @ FlashCart</title>
<meta name="description" content="Profile of Store, statistics, sales records, employees records and every other record will be displayed here. This is working desk of Store."/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="/assets/uploads/Weblogo/Flash_Cart.ico" />
<!-- Place favicon.ico in the root directory -->

<!-- Google Fonts -->

<link href="/assets/fonts/googlefonts.css" rel="stylesheet"/>  

<!-- all css here -->
<!-- bootstrap v3.3.6 css -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
<!-- animate css -->
<link rel="stylesheet" href="/assets/css/animate.css"/>
<!-- jquery-ui.min css -->
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css"/>
<!-- meanmenu css -->
<link rel="stylesheet" href="/assets/css/meanmenu.css"/>
<!-- owl.carousel css -->
<link rel="stylesheet" href="/assets/css/owl.carousel.css"/>
<!-- font-legant css -->
<link rel="stylesheet" href="/assets/css/legant.css"/>
<!-- style css -->
<link rel="stylesheet" href="/assets/css/style.css"/>
<!-- responsive css -->
<link rel="stylesheet" href="/assets/css/responsive.css"/>

<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

<link rel="stylesheet" href="/assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/fc-logo-setting.css" />
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="/assets/css/fc-elements.css" />
<script src="/assets/js/fc-elements.js"></script>
</head>
<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 

<!-- Start About Us Page -->
<div class="about"> 
  <header id="main-header" class="main-header"> 
    <!--Start Header Top -->
    <div class="header-top" style="background-color: white;">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-8"> 
            <!-- Header Top Left Text -->
            <div class="header-top-left padding15">
              <p class="fc_social">Follow Us @ <span><a class="fc_social" href="https:/www.facebook.com/flashcartofficial" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></span>&nbsp;<span><a class="fc_social" href="https:/www.twitter.com/flashcartofficial" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></span>&nbsp;<span><a class="fc_social" href="https:/www.instagram.com/flashcartofficial" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></span></p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--/End Header Top --> 
    <!-- Start Header Bottom -->
    <div class="header-bottom">
      <div class="container">
        <div class=" mega-menu-relative"> 
          <!-- Main Logo Area -->
          <div style="float:left;">
          <div class="divLogo">
            <div class="logo"> <a href="/"> <img width="100" height="100" class="img-logo img-responsive img-thumbnail" src="/uploads/Weblogo/flashcart.png"/> </a></div>
          </div>
          <!-- Main Menu Area -->

           <div id="name-tag">
            <div id="store-name"><a href="/"><h2 class="title"><span class="color-text">FlashCart</span></h2></a></div>
            <div id="store-tagline"><italic style="color: #00B2ED;">Buy... Set... Sell</italic></div>       
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- /End Breadcrumb Area--> 
  <!-- Start Company Story Area -->
  <div class="company-story-area section-padding">
    <div class="container">
     <div class="row"> 
        <!-- About Us Content Here -->










        <script>
          
          $(document).ready(function()
          {
            $(".info").on('focus',function()
            {
              $(".limiter").hide();
              $(".infoDiv").hide();
              window.id = $(this).attr('id');
              $('#limit'+id).show();
              $("#div"+id).show();

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
              if($(this).val().length ==4)
              {
                $("#5").val($("#5").val()+'-');
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

            
        <div class="col-md-7 col-sm-12">
          
          <div class="company-story-content">
            <h2 class="title">Set your Store's <span class="color-text">Identity</span> </h2></div>
            <div>
             <span class="error"> {{Session::get('error')}} </span>
                    <div class="form-fields">
            
            <script>
            	$(document).ready(function()
            	{
            		$("#city").change(function()
            		{
            			var id = $(this).find(':selected')[0].value;
            			$.ajax(
            			{
            				url: '/scripts/get_areas',
            				method: 'POST',
            				data: {'city_id':id},
            				/*success: function(data)
            				{
            					var $area = $('#area');
            					$area.empty();
            					for (var i = 0; i < data.length; i++) 
            					{
                					$area.append('<option value=' + data[i].area_id + '>' + data[i].area + '</option>');
            					}
            				}*/

	
							success: function(data) 
							{ 
								var $area = $('#area'); 
								$area.empty(); 
								for (var i = 0; i < data.length; i++) 
								{ 
									var obj = jQuery.parseJSON(data); 
									$area.append('<option value=' + obj[i].area_id + '>' + obj[i].area + '</option>'); 
								} 
							} 
            			});
            		});
            	});
            </script>
            
              <form id="formStore" method="POST" action="/save_store">
                <div class="form-title">
                </div>
                <div class="form-group">
                  <label>Store Username <span>*</span></label>
                  <input required type="text" name="storeusername" class="form-control info txt-fc" id="1" maxlength="20" value="{{old('storeusername')}}" />
                  <span id="limit1" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Store Name<span>*</span></label>
                  <input required type="text" name="storename" class="form-control info txt-fc" id="2" maxlength="50" value="{{old('storename')}}" />
                  <span id="limit2" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Category<span>*</span></label>
                  <select name="category" id="3" class="form-control info txt-fc">
                    @foreach(Helper::get_categories() as $ct) 
                    <option value="<?php echo $ct['id'];?>" name="<?php echo $ct['id'];?>"><?php echo $ct['name']; ?></option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Store Contact (Landline): (eg 021-12345678)</label>
                  <input type="text" name="storephcontact" class="form-control info txt-fc" id="4" maxlength="12" value="{{old('storephcontact')}}"/> 
                  <span id="limit4" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Store Contact (Mobile): (eg 0333-1234567)<span>*</span></label>
                  <input required type="text" name="storecontact" class="form-control info txt-fc" id="5" maxlength="12" value="{{old('storecontact')}}"/> 
                  <span id="limit5" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Location<span>*</span></label>
                  <textarea type="text" name="location" class="form-control info txt-fc" rows="5" cols="5" maxlength="150" id="6" value="{{old('location')}}"></textarea>
                  <span id="limit6" class="limiter"><span>
                </div>

                <div class="form-group">
                  <label>Store City:<span>*</span></label>
                  <select required name="storecity" class="form-control txt-fc" id="city">
                  	<option disabled selected>Select City</option>
                  	@foreach(Helper::get_cities() as $city)
                  	<option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                  	@endforeach
                  </select>
                  <span id="limit7" class="limiter"><span>
                </div>

                <div class="form-group">
                	<label>Area:<span>*</span></label>
                	<select required name="storearea" class="form-control txt-fc" id="area">
                		<option disabled selected>Select Area</option>
                	</select>
                </div>

                <div class="form-group">
                  <label>Store Email:<span>*</span></label>
                  <input required type="text" name="storeemail" class="form-control info txt-fc" maxlength="40" id="7" value="{{old('storeemail')}}"/>
                  <span id="limit7" class="limiter"><span>
                </div>
                <div class="form-action clearfix">
                    <input class="btn-fc" type="submit" value="Continue" name="submit"/>
                </div>             
                
              </form>
              </div>
          </div>
        </div>


        
        <!-- About Us Right Image Here -->
       
        <div class="col-md-5 col-sm-12">
        
        <div id="div1" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Username</span> </h2></div>
          <p>Store username is unique and it will be used to find your store.</p>
          <p>For example www.flashcart.com/<span class="color-text">abc</span> to find store that has <span class="color-text">abc</span> username.</p>
          <p>Please keep in mind before choosing username.</p>
          <p>
            <ul>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;Username can contain <span class="color-text">Alphabets</span><li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;Username can contain <span class="color-text">Numbers</span>.</li>
              <li>&nbsp;&nbsp;&nbsp;&nbsp;Username can contain <span class="color-text">Underscores</span>.</li>
            </ul>
          </p>
        </div>

        <div id="div2" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Name</span> </h2></div>
          <p>Out of all the things. This is a true <span class="color-text">identity</span> of your Store</p>
          <p>Pick a <span class="color-text">name</span> that is not of other stores.</p>
          <p>Note: <span class="color-text">Name</span> should not exceed more than 50 letters. It can be Alphanumeric</p>
        </div>
        
        <div id="div3" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Category</span> </h2></div>
          <p>This defines what type of <span class="color-text">category</span> your store lies in.</p>
          <p>Store <span class="color-text">category</span> can be changed letter is <span class="color-text">settings.</span></p>
        </div>

        <div id="div4" class="infoDiv">
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

        <div id="div5" class="infoDiv">
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

        <div id="div6" class="infoDiv">
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

        <div id="div7" class="infoDiv">
          <div class="company-story-content"><h2 class="title">Store <span class="color-text">Email</span> </h2></div>
          <p>Give the primary <span class="color-text">email</span> of your store.</p>
        </div>

        </div>
      </div>
    </div>
  </div>


  <footer class="main-footer-area"> 

    <div class="footer-bottom-area section-padding" style="background-color: white;">
      <div class="container">
        <div class="row"> 
          <!-- Copyright Text -->
          <div class="col-md-6 col-sm-6">
            <div class="copyright-text">
              <p style="color: black;"> Copyright &copy; <a href="http:/www.flashcart.com.pk"> <span class="color-text">FlashCart 2016</span> </a>. All Rights Reserved. </p>
            </div>
          </div>
          <!-- Payment Method Images -->
          <div class="col-md-6 col-sm-6">
            <div class="payment-list"> <img src="" class="pull-right" /> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /End Footer Bottom Area --> 
  </footer>
  <!-- /End Main Footer Area --> 
</div>
<!-- /End Contcat Us Page --> 

<!-- jquery latest version --> 
<script src="/assets/js/functions.js"></script>
<script src="/assets/js/vendor/jquery-1.12.0.min.js"></script> 
<!-- bootstrap js --> 
<script src="/assets/js/bootstrap.min.js"></script> 
<!-- meanmenu js --> 
<script src="/assets/js/jquery.meanmenu.js"></script> 
<!-- jquery-ui js --> 
<script src="/assets/js/jquery-ui.min.js"></script> 
<!-- wow js --> 
<script src="/assets/js/wow.min.js"></script> 
<!-- Scroll To Top js --> 
<script src="/assets/js/jquery.scrollUp.js"></script> 
<!-- Owl Carousel --> 
<script src="/assets/js/owl.carousel.min.js"></script> 
<!-- plugins js --> 
<script src="/assets/js/plugins.js"></script> 
</body>
</html>