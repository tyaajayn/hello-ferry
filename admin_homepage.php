<?php
 
// Starting the session, to use and
// store data in session variable
session_start();
  
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'adLog.php' page
// to allow the user to adLog
if (!isset($_SESSION['adUsername'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: adLog.php');
}
  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'adLog.php'
// after loggin out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['adUsername']);
    header("location: adLog.php");
}
?>
<?php include('admin_hp_db.php'); ?>
<?php 
    if (isset($_GET['edit'])) 
    {
        $tranID = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM Transport WHERE tranID=$tranID");

            $n = mysqli_fetch_array($record);
            $tranName = $n['tranName'];
            $tranType = $n['tranType'];
            $tranCabin = $n['tranCabin'];
            $tranComp = $n['tranComp'];
            $tranFrom = $n['tranFrom'];
            $tranTo = $n['tranTo'];
            $tranDate = $n['tranDate'];
            $tranTime = $n['tranTime'];
    }
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
</head>

<body>
    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
<?php  if (isset($_SESSION['adUsername'])) : ?>
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
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="cust_booking.php">Manage</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="adLog.php?logout='1'">Logout</a></li></ul>
            </div>
        </div>
    </nav>
</section>
<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>Admin Homepage</strong></h3>
        </div>
    </div>
        <div class="container">
            <h6 class="mbr-fonts-style align-center mb-0 display-2">
            <strong>Hello <?php echo $_SESSION ['adUsername'];?></strong></h6>
    </div>
    <br><br>
    <center>
    <form name="addTran" method="post" action="admin_hp_db.php">
    <br><table cellpadding="5" cellspacing="5">
    <tbody><tr><td></td></tr>

    <tr><td></td>
        <td><input type="hidden" name="tranID" class="form-control" value="<?php echo $tranID?>">
    </td></tr>

    <tr><td></td><td> Transport Name : </td>
        <td><input name="tranName" class="form-control" value="<?php echo $tranName?>">
    </td></tr>

    <tr><td></td><td> Transport Type : </td>
    <td>
        <select name="tranType" value="<?php echo $tranType?>">
          <option disabled selected>Select Transport Type</option>
          <option>Vehicle Ferry</option>
          <option>Express Ferry</option>
          <option>Speed Boat</option>
        </select></td></tr>

    <tr><td></td><td> Transport Cabin : </td>
        <td>
            <input type="radio" name="tranCabin" value="Economy"/> Economy
            <input type="radio" name="tranCabin" value="First"/> First
        </td></tr>

    <tr><td></td><td> Company : </td>
    <td><select name="tranComp">
            <option disabled selected> Select Company </option>
                <?php
                    $records = mysqli_query($db, "SELECT coID, coName FROM Company ORDER BY (coID) ASC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                    {
                        echo "<option value='". $data['coID'] ." - ". $data['coName'] ."'>" .$data['coID'] ." - ". $data['coName'] ."</option>";  
                        // displaying data in option menu
                    } 
                ?>  
        </select></td></tr>

    <tr><td></td><td> From : </td>
    <td><select name="tranFrom">
          <option disabled selected> Select Location </option>
           <?php
                $records = mysqli_query($db, "SELECT terID, terName From Terminal ORDER BY (terID) ASC");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['terID'] ." - ". $data['terName'] ."'>" .$data['terID'] ." - ". $data['terName'] ."</option>";   // displaying data in option menu
                } 
            ?>  
    </select></td></tr>

    <tr><td></td><td> To : </td>
        <td><select name="tranTo">
          <option disabled selected> Select Location</option>
           <?php
                $records = mysqli_query($db, "SELECT terID, terName From Terminal ORDER BY (terID) ASC");  // Use select query here 

                while($data = mysqli_fetch_array($records))
                {
                    echo "<option value='". $data['terID'] ." - ". $data['terName'] ."'>" .$data['terID'] ." - ". $data['terName'] ."</option>";   // displaying data in option menu
                } 
            ?>  
        </select></td></tr>

    <tr><td></td><td> Date : </td><td>
        <input type="date" name="tranDate" class="form-control" value="<?php echo $tranDate?>">
    </td></tr>
    
    <tr><td></td><td> Time (HH:MM:SS): </td><td>
        <input name="tranTime" class="form-control" value="<?php echo $tranTime?>" placeholder="Enter in 24H format">
    </td></tr>

    </tbody></table>
        <?php if ($update == true): ?>
        <input name="update" value="Update" type="submit" class="btn btn-success display-4">
        <?php else: ?>
        <input name="addTran" value="Insert" type="submit" class="btn btn-success display-4">
        <?php endif ?>
    </form></center><br><br>
        
<?php if (isset($_SESSION['message'])): ?>
    <center>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    </center>
    <?php endif ?>
    <br><br>

    <center>
    <form name="search" method="post" action="admin_homepage.php">
    <table cellpadding="5" cellspacing="5">
    <tbody><tr><td></td></tr>
    <tr></tr>
    <tr><td> Company : </td>
    <td><select name="tranComp">
            <option disabled selected> Select Company </option>
                <?php
                    $records = mysqli_query($db, "SELECT coID, coName FROM Company ORDER BY (coID) ASC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                    {
                        echo "<option value='". $data['coID'] ." - ". $data['coName'] ."'>" .$data['coID'] ." - ". $data['coName'] ."</option>";  
                        // displaying data in option menu
                    } 
                ?>  
        </select></td></tr>

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
                <th>Name</th>
                <th>Type</th>
                <th>Cabin Class</th>
                <th>Date</th>
                <th>Time</th>
                </tr></thead>";

            $tranID = "";
            $tranName = "";
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
        // receive all input values from the form
        $tranComp = mysqli_real_escape_string($db, $_POST['tranComp']);
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);

        $sql = "SELECT * From Transport, Company WHERE tranComp='$tranComp' AND coID = tranComp AND tranType = '$tranType' ORDER BY tranID ASC ";        

        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>"; echo $row["tranID"]; echo "</td>";
            echo "<td>"; echo $row["tranName"]; echo "</td>";
            echo "<td>"; echo $row["tranType"]; echo "</td>";
            echo "<td>"; echo $row["tranCabin"]; echo "</td>";
            echo "<td>"; echo $row["tranDate"]; echo "</td>";
            echo "<td>"; echo $row["tranTime"]; echo "</td>";
            echo "<td>"; ?> <a href="admin_homepage.php?edit=<?php echo $row['tranID']; ?>"class="btn btn-success-outline" >Edit</a><?php echo "</td>"; 
            echo "<td>"; ?> <a href="admin_hp_db.php?del=<?php echo $row['tranID']; ?>" class="btn btn-danger-outline">Delete</a><?php echo "</td>"; 
            echo "</tr>";
          }

      }
    ?>
</form></center>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
 
  
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
<?php endif ?>
  </body>
</html>