
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
              <a href="index.php"><img src="/uploads/Weblogo/flashcart.png" width="400" height="400" /></a>
            </div>
            
            <div class="form-fields">
            
                        
                          <form method="post" name="registration_form" action="/register">
              
               <div class="company-story-content"><h2 class="story-title">Create <span class="color-text">Account</span></h2></div>
               <span class="error" id="regError"></span>
                <div class="form-group">
                  <label>Email<span>*</span></label>
                  <input class="form-control txt-fc info" id="1" type="text" name="email" id="email" maxlength="50" required />
                   <span id="limit1" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Username<span>*</span></label>
                  <input  class="form-control txt-fc info" id="2" maxlength="20" type='text' name='username' id='username' required />
                   <span id="limit2" class="limiter"><span>
                </div>
                <div class="form-group">
                  <label>Password<span>*</span></label>
                  <input class="form-control txt-fc" type="password" name="password" id="password" />
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control txt-fc" type="password" name="confirmpwd" id="confirmpwd" />
                </div>
                <input class="hidden" name="priv" value="Owner"/>
                <div class="form-action clearfix">
                  <input type="button" class="btn-fc" onclick="location.href='login.php?view=login'" value="Go Back" style="width: 49.5%; background-color: lightgrey;"/>&nbsp;&nbsp;<input class="btn-fc" style="width: 49.68%" type="submit" value="Continue" onclick="return regformhash(this.form,this.form.username,this.form.email,this.form.password,this.form.confirmpwd);" />
                </div>
                </form>
                                

              
              
            </div>
         
     

              
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