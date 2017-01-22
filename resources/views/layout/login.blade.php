
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="x-ua-compatible" content="ie=edge"/>
<title>Login / Register - FlashCart</title>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="/uploads/Weblogo/Flash_Cart.ico" />

<link href="/fonts/googlefonts.css" rel="stylesheet"/>  

<link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>

<link rel="stylesheet" href="/assets/css/style.css"/>
<link rel="stylesheet" href="/assets/css/main.css" />
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<style>

</style>

  
  

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

    <div class="container">

            <div id="mainLogo">
              <a href="/"><img src="/uploads/Weblogo/flashcart.png" width="400" height="400" /></a>
            </div>
            

      @yield('content')
          
    </div>
         
     
<!-- Start Main Footer Area -->
  <div class="main-footer-area"> 
    <!-- Start Footer Bottom Area -->
    <div class="footer-bottom-area section-padding" style="background-color: white;">
      <div class="container">
        <div class="row"> 
          <!-- Copyright Text -->
          <div class="col-md-6 col-sm-6">
            <div class="copyright-text">
              <p style="color: black;"> Copyright &copy; <a href="/"> <span class="color-text">FlashCart 2016</span> </a>. All Rights Reserved. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    </div>



<script type="text/JavaScript" src="/assets/js/sha512.js"></script> 
<script type="text/JavaScript" src="/assets/js/forms.js"></script>
<script src="/assets/js/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
</body>
</html>