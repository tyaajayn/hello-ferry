<?php include('company_hp_db.php'); ?>
<?php 
    if (isset($_GET['edit'])) 
    {
        $adID = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM Admin WHERE adID=$adID");

            $n = mysqli_fetch_array($record);
            $adName = $n['adName'];
            $adUsername = $n['adUsername'];
            $adEmail = $n['adEmail'];
            $adPass = $n['adPass'];
            $adTelNo = $n['adTelNo'];
            $adWorkPlace = $n['adWorkPlace'];
            $adComp = $n['adComp'];
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
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="coProfile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="coLog.php?logout='1'">Logout</a></li></ul>
            </div>
        </div>
    </nav>
</section>

<section class="form5 cid-sn1Q6oEwoi" id="form5-17">
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>Company Homepage</strong></h3>
        </div>
    </div>
    <br><br>
    <center>
<form name="adReg" method="post" action="company_hp_db.php">
    <?php include ('errors.php');?>
<br><br><table cellpadding="5" cellspacing="5">
<tbody><tr><h4>Add Admin</h4></tr>
<tr><td></td>
<td><input type="hidden" name="adID" class="form-control" value="<?php echo $adID?>">
</td></tr>
<tr>
<td>
</td><td> Name : </td>
<td><input name="adName" class="form-control" required="" value="<?php echo $adName?>"></td>
</tr>
<tr>
<td>
</td><td> Username : </td>
<td><input name="adUsername" class="form-control" required=""value="<?php echo $adUsername?>"></td>
</tr>
<tr>
<td>
</td><td> Phone Number : </td>
<td><input name="adTelNo" class="form-control" required=""value="<?php echo $adTelNo?>"></td>
</tr>
<tr>
<td>
</td><td> Work Place : </td>
<td>
<select name="adWorkPlace">
  <option disabled selected> Select Location</option>
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
<td>
</td><td> Company : </td>
<td>
<select name="adComp">
  <option disabled selected> Select Company</option>
   <?php
        $records = mysqli_query($db, "SELECT coID, coName FROM Company ORDER BY (coID) ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['coID'] ." - ". $data['coName'] ."'>" .$data['coID'] ." - ". $data['coName'] ."</option>";  // displaying data in option menu
        } 
    ?>  
</select></td>
</tr>
<tr>
<td>
</td><td> Email : </td>
<td><input type="email" name="adEmail" class="form-control"required="" value="<?php echo $adEmail?>"></td>
</tr>
<tr>
<td>
</td><td> Temporary Password : </td>
<td><input type="password" name="adPass" class="form-control"  required="">
</td>
</tr>
</tbody>
</table><br>
        <?php if ($update == true): ?>
        <input name="update" value="Update" type="submit" class="btn btn-success">
        <?php else: ?>
        <input name="adReg" value="Insert" type="submit" class="btn btn-success">
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
    <form name="search" method="post" action="company_homepage.php">
    <table cellpadding="5" cellspacing="5">
    <tbody><tr><h3>Find Admin</h3></tr>
    <tr></tr>
    <tr><td> Company : </td>
    <td><select name="adComp">
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
    <tr><td colspan="2" rowspan="1"><center>
        <input name="find" value="Search" type="submit" class="btn btn-success"></center>
    </td></tr></tbody></table><br>

    <?php  
        echo"<table table class='table table-bordered;' style='text-align:center;'>";
            echo"<thead><tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Workplace</th>
                </tr></thead>";

            $adID = "";
            $adName = "";
            $adUsername = "";
            $adEmail = "";
            $adTelNo = "";
            $adWorkPlace = "";

    if (isset($_POST['find'])) 
      {
        // receive all input values from the form
        $adComp = mysqli_real_escape_string($db, $_POST['adComp']);

        $sql = "SELECT * From Admin, Company, Terminal WHERE adComp='$adComp' AND coID = adComp AND adWorkPlace = terID ORDER BY adID ASC ";        

        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>"; echo $row["adID"]; echo "</td>";
            echo "<td>"; echo $row["adName"]; echo "</td>";
            echo "<td>"; echo $row["adUsername"]; echo "</td>";
            echo "<td>"; echo $row["adEmail"]; echo "</td>";
            echo "<td>0"; echo $row["adTelNo"]; echo "</td>";
            echo "<td>"; echo $row["terName"]; echo "</td>";
            echo "<td>"; ?> <a href="company_homepage.php?edit=<?php echo $row['adID']; ?>"class="btn btn-success-outline" >Edit</a><?php echo "</td>"; 
            echo "<td>"; ?>  <a href="company_hp_db.php?del=<?php echo $row['adID']; ?>" class="btn btn-danger-outline">Delete</a><?php echo "</td>"; 
            echo "</tr>";
          }

      }
    ?>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
 
  
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

  </body>
</html>