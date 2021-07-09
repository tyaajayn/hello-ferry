<?php
session_start();

// initializing variables
$coName = "";
$coUsername = "";
$coEmail = "";
$coPass = "";
$newPass = "";
$confPass = "";
$coTelNo = "";
$coHq = "";
$errors = array(); 
$_SESSION['success']="";
$coUsername = $_SESSION ['coUsername'];

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
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white text-primary display-7">HelloFerry</a></span>
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
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="company_homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="coLog.php">Logout</a></li></ul>
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
    <?php  
        echo"<table cellpadding='5' cellspacing='5' style='align:center;'>";

        // receive all input values from the form
        $sql = "SELECT * From Company WHERE coUsername='$coUsername'";        

        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
          {
            echo "<tr>"; 
            echo "<td><th>Name : </th></td>"; echo "<td>"; echo $row["coName"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Username : </th></td>"; echo "<td>"; echo $row["coUsername"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Email : </th></td>"; echo "<td>"; echo $row["coEmail"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Phone Number : </th></td>"; echo "<td>0"; echo $row["coTelNo"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Headquarters : </th></td>"; echo "<td>"; echo $row["coHq"]; echo "</td>"; 
             echo "</tr></center></table><br><br>";
          }

    ?>
    <button type="button" class="btn btn-success" onclick="openForm()">Edit</button>

    <form class="form-popup" id="edit" name="edit" method="post" action="coProfile.php">
    <br><br>
    <label for="coName"><b>Company Name</b></label>
    <input name="coName" class="form-control" value="<?php echo $coName?>"><br>

    <label for="coUsername"><b>Company Username</b></label>
    <input name="coUsername" class="form-control" value="<?php echo $coUsername?>"><br>

    <label for="coEmail"><b>Company Email</b></label>
    <input name="coEmail" class="form-control" value="<?php echo $coEmail?>"><br>

    <label for="coTelNo"><b>Company Telephone Number</b></label>
    <input name="coTelNo" class="form-control" value="<?php echo $coTelNo?>"><br>

    <label for="coHq"><b>Headquarters</b></label>
    <input name="coHq" class="form-control" value="<?php echo $coHq?>"><br>

    <label for="newPass"><b>New Password</b></label>
    <input type="password" name="newPass" class="form-control" value="<?php echo $newPass?>"><br>

    <label for="confPass"><b>Confirm Password</b></label>
    <input type="password" name="confPass" class="form-control"><br>

    <input name="update" value="Update" type="submit" class="btn btn-success"><br>
    <button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>

</form>
    <script>
    function openForm() {
      document.getElementById("edit").style.display = "block";
    }

    function closeForm() {
      document.getElementById("edit").style.display = "none";
    }
    </script>
</center>
<?php
if (isset($_POST['update'])) 
{
  // receive all input values from the form
  $coName = mysqli_real_escape_string($db, $_POST['coName']);
  $coUsername = mysqli_real_escape_string($db, $_POST['coUsername']);
  $coEmail = mysqli_real_escape_string($db, $_POST['coEmail']);
  $coTelNo = mysqli_real_escape_string($db, $_POST['coTelNo']);
  $coHq = mysqli_real_escape_string($db, $_POST['coHq']);
  $newPass = mysqli_real_escape_string($db, $_POST['newPass']);
  $confPass = mysqli_real_escape_string($db, $_POST['confPass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
    
    $newPass = md5($_POST ['newPass']);
    $query = "UPDATE Company SET coName='$coName', coUsername='$coUsername', coEmail='$coEmail', coPass='$newPass', coTelNo='$coTelNo', coHq='$coHq' WHERE coUsername='$coUsername'";
    mysqli_query($db, $query);
    $_SESSION['coUsername'] = $coUsername;
    $_SESSION['message'] = "Data inserted!"; 
}
?>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
 
  
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

  </body>
</html>