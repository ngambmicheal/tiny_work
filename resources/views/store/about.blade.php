@extends('front.new_front')

@section('content')


<div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="breadcrumb-container">
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li><a href="<?php echo "http://localhost:9999/index.php?store=".$row['store_username']; ?>"><?php echo $row['store_name']; ?></a></li>
                <li><a href="../store/about-policy.php?view=about">About/Policy</a></li>
              </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /End Breadcrumb Area--> 
  <!-- Start Company Story Area -->
  <style>
    #mainContent
    {
      margin-top: -100px;
    }
  </style>
  <div class="company-story-area section-padding" id="mainContent">
    <div class="container">
     <div class=""> 
        <!-- About Us Content Here -->
        <div class="sub-main-menu">
        <nav class="main-menu-area">
            <ul>
              <li><a href="<?php echo "about-policy.php?view=about&store=".$_GET['store']; ?>">About Us</a></li>
              <li><a href="<?php echo "about-policy.php?view=contact&store=".$_GET['store']; ?>">Contact</a></li>
              <li><a href="<?php echo "about-policy.php?view=employees&store=".$_GET['store']; ?>">Employees</a></li>
              <li><a href="<?php echo "about-policy.php?view=policy&store=".$_GET['store']; ?>">Policies</a></li>
            </ul>
          </nav>
          </div>



        <?php if($_GET['view']=="about" && isset($_GET['store'])){

          /*$stmtgetdets = $mysqli->prepare("SELECT store_name,store_about,store_description, store_founded,first_name, middle_name,last_name FROM store_details sd
            INNER JOIN members m ON sd.store_id=m.store_id
            INNER JOIN member_details md ON m.id = md.userid
            INNER JOIN store s ON sd.store_id=s.store_id
            WHERE sd.store_id=? AND m.privilege='Owner'");
          $stmtgetdets->bind_param("i",$_GET['store']);
          $stmtgetdets->execute();
          $getdets = $stmtgetdets->get_result();
          $dets = $getdets->fetch_assoc();
          $stmtgetdets->close();*/
        ?>
          <div class="company-story-content">
            <h2 class="title">About <span class="color-text"><?php echo $row['store_name'];?></span> </h2>
           <p><?php echo paragraph_modifier($row['store_about']); ?></p>
          </div>

          <div class="company-story-content">
            <h2 class="title">Description <span class="color-text"><?php echo $row['store_name'];?></span> </h2>
            <p>Founded by: <?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name']; ?></p>
            <p>Founded On: <?php echo $row['store_founded']; ?></p>
           <p><?php echo paragraph_modifier($row['store_description']); ?></p>
          </div>

          <div class="company-story-content">
            <h2 class="title">Achievements <span class="color-text"><?php echo $row['store_name'];?></span> </h2>
           <p><?php echo paragraph_modifier($row['store_achievements']); ?></p>
          </div>
        <?php } ?>


















        <?php if($_GET['view']=="contact" && isset($_GET['store']))
        {
          /*$stmtgetdets = $mysqli->prepare("SELECT store_name,store_website, store_twitter, store_facebook, store_instagram, store_location FROM store_details sd
            INNER JOIN store s ON sd.store_id=s.store_id
            WHERE sd.store_id=?");
          $stmtgetdets->bind_param("i",$_GET['store']);
          $stmtgetdets->execute();
          $getdets = $stmtgetdets->get_result();
          $dets = $getdets->fetch_assoc();
          $stmtgetdets->close();*/
        ?>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Location <span class="color-text"><?php echo $row['store_name'];?></span></h2>
            <p><?php echo $row['store_location']; ?></p>

          </div>

        </div>
        <div class="col-md-5 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Social <span class="color-text"><?php echo $row['store_name'];?></span> </h2>
            <?php if(isset($row['store_facebook'])){echo '<p><a href="https:/www.facebook.com/'.''.$row['store_facebook'].'"'.' target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Visit our Facebook</a></p>';} if(isset($row['store_twitter'])){echo '<p><a href="https:/www.twitter.com/'.''.$row['store_twitter'].'"'.' target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i> Visit our Twitter</a></p>';} if(isset($row['store_instagram'])){echo '<p><a href="https:/www.instagram.com/'.''.$row['store_instagram'].'"'.' target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Visit our Instagram</a></p>';}?>
          </div>
        </div>
        <div class="col-md-7 col-sm-12">
          <div class="company-story-content">
            <h2 class="title">Contact <span class="color-text"><?php echo $row['store_name'];?></span></h2>
            <p>Phone: <?php echo $row['phone']; ?></p>
            <p>Phone: <?php echo $row['mobile']; ?></p>
          </div>
        <?php } ?>




         <?php if($_GET['view']=="employees" && isset($_GET['store'])){

          $stmtgetdets = $mysqli->prepare("SELECT first_name, middle_name, last_name FROM store_employees se
            INNER JOIN member_details md ON se.employee_id=md.userid
            WHERE se.store_id=?");
          $stmtgetdets->bind_param("i",$_GET['store']);
          $stmtgetdets->execute();
          $getdets = $stmtgetdets->get_result();
          
          $stmtgetdets->close();
        ?>
          <div class="company-story-content">
            <h2 class="title">Employees <span class="color-text"><?php echo $row['store_name'];?></span> </h2>
            <?php while($dets = $getdets->fetch_assoc()){?>
           <p><?php echo $dets['first_name']." ".$dets['middle_name']." ".$dets['last_name']; ?></p>
           <?php } ?>
          </div>

        <?php } ?>














        <?php if($_GET['view']=="policy" && isset($_GET['store'])){

          $stmtgetpolicies = $mysqli->prepare("SELECT * FROM store_policies WHERE store_id=?");
          $stmtgetpolicies->bind_param("i",$_GET['store']);
          $stmtgetpolicies->execute();
          $getpolicies=$stmtgetpolicies->get_result();
          $stmtgetpolicies->close();
        ?>
        <style>
          .divPol.hastarget
          {
            background: #ffedce;
          }
        </style>

        <?php while($policies=$getpolicies->fetch_assoc()){?>

          <div class="company-story-content divPol" name="<?php echo $policies['tag']; ?>">
            <h2 class="title">Policy <span class="color-text"><?php echo $policies['title'];?></span> </h2>
            <p><?php echo paragraph_modifier($policies['policy']); ?></p>
          </div>
        <?php }?>
        <?php 
        
        ?>

        <?php } ?>











        
      </div>
    </div>
  </div>
  <!-- /End Company Story Area --> 

  <!-- /End Our Team Area --> 
  <!-- Start Main Footer Area -->

  <!-- /End Main Footer Area --> 
</div>

@stop