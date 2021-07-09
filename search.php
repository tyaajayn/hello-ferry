<?php include ('resultdb.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/image-processing20200410-18222-tl5tm1-128x53.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Booking</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
</head>
<body>
<section class="menu menu3 cid-sn21qrccRj" once="menu" id="menu3-1e">
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white text-primary display-7" href="home.html">HelloFerry</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="cust_homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="custProfile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="custLog.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</section>
<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
	<section class="form5 cid-sn1Q6oEwoi" id="form5-17"> 
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Search</strong></h3>
            
        </div>
<center>
<form name="frmbook" action="result.php" method="post">
<table cellpadding="5" cellspacing="5">
<tbody><tr><td>
</td></tr>
<tr>
<td> Date : </td>
<td><input type="date" name="tranDate"> 
</td>
</tr>
<tr>
<td> From : </td>
<td>
<select name="tranFrom">
  <option disabled selected> Select Terminal</option>
   <?php
        $records = mysqli_query($db, "SELECT terID, terName From Terminal ORDER BY (terID) ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['terID'] ." - ". $data['terName'] ."'>" .$data['terID'] ." - ". $data['terName'] ."</option>";   // displaying data in option menu
        } 
    ?>  
</select></td>
</tr>
<tr>
<td> To : </td>
<td>
<select name="tranTo">
  <option disabled selected> Select Terminal </option>
   <?php
        $records = mysqli_query($db, "SELECT terID, terName From Terminal ORDER BY (terID) ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['terID'] ." - ". $data['terName'] ."'>" .$data['terID'] ." - ". $data['terName'] ."</option>";   // displaying data in option menu
        } 
    ?>  
</select></td>
</tr>
<tr>
<td> Transport Type : </td>
<td>
<select name="tranType">
  <option disabled selected>Select Transport Type</option>
  <option>Vehicle Ferry</option>
  <option>Express Ferry</option>
  <option>Speed Boat</option>
</select></td>
</tr>
<tr>
<td colspan="2" rowspan="1">
<center>
<input name="find" value="Search" type="submit" class="btn btn-success"></center>
</td></tr></tbody></table>
</form>
</center>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>