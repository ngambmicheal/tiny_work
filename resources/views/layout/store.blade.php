<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="x-ua-compatible" content="ie=edge"/>
<title> - Profile</title>
<meta name="description" content="Profile of Store, statistics, sales records, employees records and every other record will be displayed here. This is working desk of Store."/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="/assets/uploads/Weblogo/Flash_Cart.ico" />
<!-- Place favicon.ico in the root directory -->

<!-- Google Fonts -->

<link href="/assets/fonts/googlefonts.css" rel="stylesheet"/>  
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
<!-- modernizr css -->
<script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
<script type="text/javascript" src="/assets/js/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="/assets/user-style.php" media="screen" />
<script src="/assets/js/functions.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/css/fc-logo-setting.css" />
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
              <p>Follow Us @ 
              @if(isset($store->facebook)) 
              <span><a href="https:/www.facebook.com/{{$store->facebook}}" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></span>
              @endif
              @if(isset($store->twitter)) 
              &nbsp;<span><a href="https:/www.twitter.com/{{$store->twitter}}" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></span>
            &nbsp;<span><a href="https:/www.instagram.com/'.''.$store['store_instagram'].'"'.' target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></span></p>
              @endif
            </div>
          </div>
          <div class="col-md-6 col-sm-4"> 
            <!-- Header Top Right Menu -->
            <div class="header-top-right text-right">
              <ul>
                <li class="mobile-search"><a href="#"><i class="icon_search"></i></a>
                  <div class="search-box-area">
                    <form action="productlist.php" method="GET">
                      <input type="text" name="s" placeholder="Enter product name" class="txt-fc" />
                    </form>
                  </div>
                </li>
                <li><a href="#"><i class="icon_profile"></i></a>
                  <ul class="header-top-right-dropdown">
                    <li><a href="#">My Account</a></li>
                    <li><a href="/assets/includes/logout.php">Log Out</a></li>
                  </ul>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/End Header Top --> 
    <!-- Start Header Bottom -->


    <div class="header-bottom">
      <div class="container">
        <div class="mega-menu-relative"> 
          <!-- Main Logo Area -->
          <div style="float:left;">
          <div class="divLogo">
            <div class="logo"> <a href="<?php "/assets/index.php?store=".$store['username']; ?>"> <img width="100" height="100" class="img-logo img-responsive" src="<?php echo "/assets/uploads/store/logo/".$store['logo']; ?>"/> </a></div>
          </div>
          <!-- Main Menu Area -->

           <div id="name-tag">
            <div id="store-name"><a href="<?php echo "/assets/index.php?store=".$store['store_username']; ?>"><h2 class="title"><span class="color-text"><?php echo $store['store_name']; ?></span></h2></a></div>
            <div id="store-tagline"><italic><?php echo $store['store_tagline']; ?></italic></div>       
          </div>
          </div>
          <!-- Main Menu Area -->
           <div class="col-md-9 col-sm-12 hidden-xs" style="float:right">
            <nav class="main-menu-area">
              <ul class="text-right">
              <li> <a href="<?php echo "/assets/index.php?store=".$store['store_username']; ?>">{{$store->name}}</a></li>
                <li> <a href="/store/profile.php?view=dashboard" class="current">Profile</a></li>
                <li><a href="/store/products/manageproducts.php?view=list">My Products</a>
                    <ul class="main-dropdown-menu">
                        <li><a href="/store/products/manageproducts.php?view=add_p">Add Products</a></li>
                    </ul>
                </li>
                <li><a href="/store/sales/managesales.php?view=list">My Sales</a>
                    <ul class="main-dropdown-menu">
                        <li><a href="/assets//assets/store/sales/managesales.php?view=create">Create Sale</a></li>
                    </ul>
                </li>
                <li> <a href="<?php echo "/store/settings.php?view=store&storeid=".$_SESSION['storeid'];?>">Settings</a></li>

              </ul>
            </nav>
                   
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- /End Mian Header --> 
  <!-- Start Breadcrumb Area-->
 <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
                <li><a href="/assets/store/profile.php">Profile</a></li>
              </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 
  <!-- Start Company Story Area -->
  <div class="company-story-area section-padding">
    <div class="container">
     <div class="row"> 
        <!-- About Us Content Here -->




<style>
#postDiv {
  margin: 0;
  min-width: 250px;
}

/* Include the padding and border in an element's total width and height */
#postDiv * {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
#myUL {
  margin: 0;
  padding: 0;
}



/* Style the header */
.header {

  padding: 30px 40px;
  color: black;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
#myInput
{
  width: 75%;
  height: 85%;
  resize: none;
  border: none !important;
  overflow:hidden;
}

/* Style the "Add" button */
.addBtn 
{
  text-align: center;
  cursor: pointer;
  transition: 0.3s;

}

</style>
<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("ul#myUL LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}


// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var span = document.createElement("span");
  span.className = "post";
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  span.appendChild(t);
  li.appendChild(span);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").prepend(li);
  }
  //document.getElementById("myInput").value = "";
  var div = document.createElement("div");
  var a = document.createElement("a");
  var txt = document.createTextNode("Delete");
  a.className = "close";
  a.appendChild(txt);
  div.appendChild(a);
  li.appendChild(div);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
</script>
<style>
  hr.side { border: solid black; border-width: 1px 0 0; clear: both; margin: 22px 0 21px; height: 0; }
</style>
        <?php if($_GET['view'] == "dashboard"){ 

          $stmtgetallposts = $mysqli->prepare("SELECT * FROM store_posts WHERE store_id = ? ORDER BY post_id DESC");
          $stmtgetallposts->bind_param("i",$_SESSION['storeid']);
          $stmtgetallposts->execute();
          $getallposts = $stmtgetallposts->get_result();
          $stmtgetallposts->close();
          ?>

        <script>
          $(document).ready(function()
          {
            $(".addBtn").click(function(e)
            {
              var post = $("#myInput").val();
              $.ajax(
              {
                url: '/assets/scripts/add_post.php',
                method: 'POST',
                data: {"store": <?php echo $_SESSION['storeid']; ?>, "user":<?php echo $_SESSION['userid']; ?>, "post": post },
                success:function(data)
                {

                }
              });
              $("#myInput").fadeOut('800', function()
                {
                  $(this).val("");
                }).fadeIn();
            });
            $(".close").click(function()
            {
              var id = $(this).attr('id');
              $.ajax(
              {
                url: '/assets/scripts/del_post.php',
                method: 'POST',
                data: {"id":id},
                success:function(data)
                {

                }

              });
              $(this).parent().parent().hide();
            });

            $(".post-input").on('focus',function()
            {
              $(".limiter").show();
              $(this).keyup(updateCount);
              $(this).keydown(updateCount);
            });
          });
          function updateCount() 
          {
            var cs = $(this).val().length;
            var limit = $(this).attr('maxlength');
            var countLeft = limit-cs;
            
            $('.limiter').text(countLeft);
            if(countLeft == 0)
            {
              $('.limiter').css({"color":"Red"});
            }
            else
            {
              $('.limiter').css({"color":"Black"});
            }
          }
        </script>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Dashboard <span class="color-text"><?php echo $_SESSION['storename'];?></span> </h2>

            <div id="postDiv">







            <div id="myDIV" class="header">
              <hr class="side" />

              <textarea id="myInput" class="txt-fc post-input" onkeyup="textAreaAdjust(this)" placeholder="Post for your store..." maxlength="200"></textarea>
              
              <span onclick="newElement()" class="addBtn btn-fc">Add <span class="limiter"></span></span>

              <hr class="side" />

            </div>
            

            







            </div>
          </div>    
        </div>
        <?php } ?>













        <?php if($_GET['view']=="emp_req" && $_SESSION['priv']=="Owner"){ ?>

        <?php  
        $stmtgetreqs = $mysqli->prepare("SELECT ep.id, prop_sal, prop_date, first_name, last_name FROM employee_proposal ep 
          INNER JOIN member_details md ON ep.emp_id=md.userid
          WHERE ep.store_id=? AND ep.prop_status='Pending'");


        $stmtgetreqs->bind_param("i",$_SESSION['storeid']);
        $stmtgetreqs->execute();
        $getreqs = $stmtgetreqs->get_result();
        $stmtgetreqs->close();

        ?>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Employees <span class="color-text">Requests</span></h2>

            <div>
              <table class="table table-responsive table-hover table-striped table-condensed">
                <thead>
                  <tr>
                    <td>Date of Application</td>
                    <td>Name</td>
                    <td>Proposed Salary</td>
                  </tr>
                </thead>
                <tbody>
                <?php while($reqs = $getreqs->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $reqs['prop_date']; ?></td>
                    <td><a class="fc-emp" href="#" id="<?php echo $reqs['id']; ?>"><?php echo $reqs['first_name']." ".$reqs['last_name']; ?></a></td>
                    <td>Rs. <?php echo $reqs['prop_sal']; ?></td>
                  </tr>
                 <?php }?> 
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(function()
          {
            $(".fc-emp").click(function(e)
            {
              e.preventDefault();
              var id = $(this).attr("id");
              $.ajax(
              {
                url: '/assets/scripts/emp_prof_det.php',
                method: 'POST',
                data: {"id":id},
                dataType: "json", 
                success: function(data)
                {
                  first_name = data.first_name;
                  middle_name = data.middle_name;
                  last_name = data.last_name;
                  e = data.email;
                  p = data.contact;
                  m = data.mobile;
                  pm = data.prop_message;
                  ps = data.prop_status;
                  ao = data.prop_date;
                  ei = data.emp_id;
                  id = data.id;
                  $("#emp_f").text(first_name);
                  $("#emp_full").text(first_name + " " + middle_name + " " + last_name);
                  $("#emp_e").text(e);
                  $("#emp_p").text(p);
                  $("#emp_m").text(m);
                  $("#emp_ao").text(ao);
                  $("#emp_ps").text(ps);
                  $("#emp_pm").text(pm);
                  $(".accept").attr("id", id + '-' + ei);
                  $(".reject").attr("id", id + '-' + ei);
                  console.log(data);
                }
              });
            });
          });
        </script>

        <?php }
         else if($_GET['view']=="emp_req" && $_SESSION['priv'] == "Employee"){ 
          echo '<script> location.replace("profile.php?view=dashboard"); </script>';
          //header("Refresh:0, url=profile.php?view=dashboard");
          } ?>






        
        <?php if($_GET['view']=="emp_req" && $_SESSION['priv']=="Owner"){?>
        <div class="col-md-5 col-sm-12">
          <div class="company-story-content"><h2 class="title">View <span class="color-text" id="emp_f"></span> </h2></div>
          <table class="table table-hover table-condensed table-responsive">
          <tr><td><span>Full Name: </span></td><td><span class="color-text" id="emp_full"></span></td></tr>
          <tr><td><span>Email: </span></td><td><span class="color-text" id="emp_e"></span></td></tr>
          <tr><td><span>Phone: </span></td><td><span class="color-text" id="emp_p"></span></td></tr>
          <tr><td><span>Mobile: </span></td><td><span class="color-text" id="emp_m"></span></td></tr>
          <tr><td><span>Applied On: </span></td><td><span class="color-text" id="emp_ao"></span></td></tr>
          <tr><td><span>Proposed Salary: </span></td><td><span class="color-text" id="emp_ps"></span></td></tr>
          <tr><td><span>Proposal: </span></td><td><span class="color-text" id="emp_pm"></span></td></tr>
          </table>
          <br />
          <div class="section-title">
            <a href="" class="accept btn-fc" id="" >Accept</a>
            <a href="" class="reject btn-fc" id="" >Reject</a>
            <br />
            <br />
            <div id="r_form" class="hidden">
              <form method="POST" action="" id="rej_form">
                <textarea name="message" rows="5" cols="5" class="form-control txt-fc" id="prop_r_message"></textarea>
                <input type="submit" name="submit" value="Reject" class="form-control btn btn-sm" />
              </form>
            </div>
          </div>

          <br />
          <div class="company-story-content"><h2 class="story-title">Quick <span class="color-text">Nav</span> </h2></div>
          <nav>
            <ul>
              <li><a href="profile.php?view=dashboard">Dashboard</a></li>
              <?php if($_SESSION['priv']=="Owner") {?><li><a href="profile.php?view=emp_req">View Employees Requests</a></li> <?php } ?>
              <li><a href="/assets/store/products/manageproducts.php?view=list">All Products</a></li>
              <li><a href="/assets/store/products/manageproducts.php?view=add_p">Add Product(s)</a></li>
            </ul>
          </nav>
        </div>
        

        <script>
          $(document).ready(function()
          {
            $(".accept").click(function(e)
            {
              e.preventDefault();
              var arr = $(this).attr('id').split('-');
              
              $.ajax(
              {
                url: '/assets/scripts/prop_acc.php',
                method: 'POST',
                data: {"id": arr[0],"emp_id": arr[1]},
                success: function(d)
                {
                  console.log(d);
                }
              });
            });

            $(".reject").click(function(e)
            {
              var arr = $(this).attr('id').split('-');
              
              e.preventDefault();

              $("#r_form").removeClass("hidden");
            

              $("#rej_form").submit(function(e)
              {
                var message = $("#prop_r_message").val();
                e.preventDefault();
                $.ajax(
                {
                  url: '/assets/scripts/prop_rej.php',
                  method: 'POST',
                  data: {"id": arr[0], "message": message},
                  success: function(d)
                  {
                    console.log(d);
                  }
                });
              });
            });
          });


        </script>



       

        <?php } ?>





























































        <!-- About Us Right Image Here -->
        <?php if($_GET['view']=="dashboard"){?>
        <div class="col-md-5 col-sm-12">
        
          <div class="company-story-content"><h2 class="title">Quick <span class="color-text">Nav</span> </h2></div>
          <nav>
            <ul>
              <li><a href="profile.php?view=dashboard">Dashboard</a></li>
              <?php if($_SESSION['priv']=="Owner") {?><li><a href="profile.php?view=emp_req">View Employees Requests</a></li> <?php } ?>
              <li><a href="/assets/store/products/manageproducts.php?view=list">All Products</a></li>
              <li><a href="/assets/store/products/manageproducts.php?view=add_p">Add Product(s)</a></li>
            </ul>
          </nav>

          
          <style>
            #myUL li 
            {
              
              
              word-wrap: break-word;
              height: auto;
            }
            
            .post
            {
              margin-left: 20px;

            }
            .close 
            {
              color: #00B2ED;

            }
            .id-content
            {
              margin-top: 25px;
              font-style: italic;
              font-size: 12px;
            }
            .content
            {
              font-size: 10px;
            }
            #posts
            {
              height: 300px;
              overflow: auto;
            }
          </style>
          <br />
          <div id="posts">
          <h2 class="title">Posts</h2>
            <ul id="myUL">
              <?php while($allposts = $getallposts->fetch_assoc()){?>
              <li>
                <span class="post"><?php echo $allposts['store_post']; ?></span>
                
                <div class="id-content">
                  <span class="content">By </span><?php echo $allposts['post_by']; ?>
                  <span class="content"> @ </span>
                  <?php echo $allposts['post_time']; ?>
                  <a class="close" id="<?php echo $allposts['post_id']; ?>">Delete</a>
                </div>
              </li>
              <hr />
              <?php }?>
              
            </ul>
          </div>
          

        </div>
        <?php } ?>
      </div>
    </div>
  </div>

</div>

@yield('content')

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
  <footer class="main-footer-area"> 
    <!-- Start Footer Top Area -->
    <div class="footer-top-area section-padding">
      <div class="container">
        <div class="row"> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Contact Us </h2>
              <div class="footer-top-contact">
                <ul class="contac-details">
                <li>
                    <div class="address"> <?php echo trim($store['store_location']); ?> </div>
                  </li>
                  <li>
                    <div class="mobile-no"> <?php echo $store['phone']; ?><br>
                      <?php echo $store['mobile']; ?></div>
                  </li>
                  <li>
                    <div class="email"> <?php echo $store['store_email']; ?></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
            <h2 class="footer-top-widget-title border-spacing"> Information </h2>
              <!-- Widget Title -->
              <div class="footer-top-information">
                <ul class="footer-top-menu">
                  <li><a href="<?php echo "/assets/about-policy.php?view=about&store=".$_SESSION['storeid']; ?>">About Us</a></li>
                  <li><a href="<?php echo "/assets/about-policy.php?view=contact&store=".$_SESSION['storeid']; ?>">Contact Us</a></li>
                  <li><a href="<?php echo "/assets/about-policy.php?view=employees&store=".$_SESSION['storeid']; ?>">Employees</a></li>
                  <li><a href="<?php echo "/assets/about-policy.php?view=policy&store=".$_SESSION['storeid']; ?>">Policies</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing"> Account </h2>
              <div class="footer-top-my-information">
                <ul class="footer-top-menu">
                  <li><a href="<?php echo "/assets/index.php?store=".$store['store_username']; ?>">Visit Store</a></li>
                  <li><a href=""></a>Personal Account</li>
                  <li><a href="/assets/includes/logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
          <!-- Start Footer Top Single Widget -->
         
          <div class="col-md-3 col-sm-3">
            <div class="footer-top-single-widget"> 
              <!-- Widget Title -->
              <h2 class="footer-top-widget-title border-spacing">Nav</h2>
              <div class="footer-top-information">
               <ul class="footer-top-menu">
                  <li><a href="profile.php?view=dashboard">Dashboard</a></li>
                  <li><a href="products/manageproducts.php?view=add_p">Add Product</a></li>
                  <li><a href="sales/managesales.php?view=create">Create Sale</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /End Footer Top Single Widget --> 
        </div>
      </div>
    </div>
    <!-- /End Footer Top Area --> 
    <!-- Start Footer Bottom Area -->
    <div class="footer-bottom-area section-padding">
      <div class="container">
        <div class="row"> 
          <!-- Copyright Text -->
          <div class="col-md-6 col-sm-6">
            <div class="copyright-text">
              <p> Copyright &copy; <a href="/store/profile.php?view=dashboard"> <?php echo $store['store_name'] ?> </a>. All Rights Reserved. </p>
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
</body>

</html>