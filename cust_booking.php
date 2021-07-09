<?php
// initializing variables
$bookID = "";
$bookType = "";
$noOfAdult = "";
$noOfChild = "";
$bookFrom = "";
$bookTo = "";
$tranName = "";
$tranType = "";
$terID = "";
$terName = "";
$errors = array();
// connect to the database
$db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'bdf41ebfb5bd3b', '7d2da349', 'heroku_21795df27a7e941');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/image-processing20200410-18222-tl5tm1-128x53.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Homepage</title>
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

  <style type="text/css">

.form-popup 
{
  position: fixed;
  display: none;
  bottom: 0;
  border: 3px solid #f1f1f1;
  z-index: 9;
  padding: 10px;
  background-color: white;
    overflow-x:hidden;
  overflow-y:auto;
  min-height:300px;
  max-height:700px;
} 
</style>  
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
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="adProfile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="admin_homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="adLog.php?logout='1'">Logout</a></li></ul>
            </div>
        </div>
    </nav>
</section>
<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>Homepage</strong></h3><br><br>
        </div>
    </div>
    <br><br>
       <center>
    <form name="search" method="post" action="cust_booking.php">
    <table cellpadding="5" cellspacing="5">
    <tbody><tr><td></td></tr>
    <tr></tr>
    <tr><td> Transport Type : </td>
        <td><select name="tranType">
          <option disabled selected>Select Transport Type</option>
          <option>Vehicle Ferry</option>
          <option>Express Ferry</option>
          <option>Speed Boat</option>
    </select></td></tr>

    <tr><td colspan="2" rowspan="1"><center>
        <input name="find" value="Search" type="submit" class="btn btn-success display-4"></center>
    </td></tr></tbody></table><br>

    <?php  
        echo"<table table class='table table-bordered;' style='text-align:center;'>";
            echo"<thead><tr>
                <th>#</th>
                <th>Customer ID</th>
                <th>Transport Type</th>
                <th>Transport Cabin</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Time</th>
                </tr></thead>";

            $bookID = "";
            $custUsn = "";
            $tranType = "";
            $tranCabin = "";
            $tranComp = "";
            $tranFrom = "";
            $tranTo = "";
            $tranDate = "";
            $tranTime = "";
            $terName="";

    if (isset($_POST['find']))
    {
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);

        $sql = "SELECT * From Booking WHERE tranType ='$tranType'";        
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
        {
                echo "<tr>";
                echo "<td>"; echo $row["bookID"]; echo "</td>";
                echo "<td>"; echo $row["custUsn"]; echo "</td>";
                echo "<td>"; echo $row["tranType"]; echo "</td>";
                echo "<td>"; echo $row["tranCabin"]; echo "</td>";
                echo "<td>"; echo $row["tranFrom"]; echo "</td>";
                echo "<td>"; echo $row["tranTo"]; echo "</td>";
                echo "<td>"; echo $row["tranDate"]; echo "</td>";
                echo "<td>"; echo $row["tranTime"]; echo "</td>";
                echo "<td>"; ?> <a href="cust_bk_edit.php?edit=<?php echo $row['bookID']; ?>"class="btn btn-success-outline" >Edit</a><?php echo "</td>"; 
            echo "<td>"; ?> <a href="cust_booking.php?del=<?php echo $row['bookID']; ?>" class="btn btn-danger-outline">Delete</a><?php echo "</td>"; 
            echo "</tr>";
        }

        echo "1 - Jesselton Point ||";
        echo " 2 - Labuan International Ferry Terminal ||";
        echo " 3 - Terminal Feri Menumbok ";

        }


    if (isset($_GET['del'])) 
    {
      $bookID = $_GET['del'];
      mysqli_query($db, "DELETE FROM Booking WHERE bookID=$bookID");
      $_SESSION['message'] = "Data deleted!"; 
      header('location: cust_booking.php');
    }

    ?>
</form></center>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
 
  
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>