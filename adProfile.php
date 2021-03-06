<?php
session_start();

// initializing variables
$adName = "";
$adUsername = "";
$adEmail = "";
$newPass = "";
$confPass = "";
$adTelNo = "";
$adWorkPlace = "";
$adComp = "";
$errors = array(); 
$_SESSION['success']="";
$adUsername = $_SESSION ['adUsername'];

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
            <strong>Admin Homepage</strong></h3>
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
        $sql = "SELECT * From Admin, Company, Terminal WHERE adUsername='$adUsername' AND coID = adComp AND adWorkPlace = terID ORDER BY adID ASC ";        

        $result = $db->query($sql);
        while ($row = $result->fetch_assoc())
          {
            echo "<tr>"; 
            echo "<td><th>Name : </th></td>"; echo "<td>"; echo $row["adName"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Username : </th></td>"; echo "<td>"; echo $row["adUsername"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Email : </th></td>"; echo "<td>"; echo $row["adEmail"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Phone Number : </th></td>"; echo "<td>0"; echo $row["adTelNo"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Company : </th></td>"; echo "<td>"; echo $row["coName"]; echo "</td>"; 
            echo "</tr>";
            echo "<tr>"; 
            echo "<td><th>Workplace : </th></td>"; echo "<td>"; echo $row["terName"]; echo "</td>"; 
             echo "</tr></center></table><br><br>";
          }

    ?>
    <button type="button" class="btn btn-success" onclick="openForm()">Edit</button>

    <form class="form-popup" id="edit" name="edit" method="post" action="adProfile.php">
    <br><br>
    <label for="adName"><b>Name</b></label>
    <input name="adName" class="form-control" value="<?php echo $adName?>"><br>

    <label for="adUsername"><b>Username</b></label>
    <input name="adUsername" class="form-control" value="<?php echo $adUsername?>"><br>

    <label for="adEmail"><b>Email</b></label>
    <input name="adEmail" class="form-control" value="<?php echo $adEmail?>"><br>

    <label for="adTelNo"><b>Phone Number</b></label>
    <input name="adTelNo" class="form-control" value="<?php echo $adTelNo?>"><br>

    <label for="adWorkPlace"><b>Work Place</b></label><br>
       <select name="adWorkPlace">
      <option disabled selected> Select Location</option>
       <?php
            $records = mysqli_query($db, "SELECT terID, terName FROM Terminal ORDER BY (terID) ASC");  // Use select query here 

            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['terID'] ." - ". $data['terName'] ."'>" .$data['terID'] ." - ". $data['terName'] ."</option>";  // displaying data in option menu
            } 
        ?>  
    </select><br>

    <label for="adComp"><b>Company</b></label><br>
   <select name="adComp">
      <option disabled selected> Select Company</option>
       <?php
            $records = mysqli_query($db, "SELECT coID, coName FROM Company ORDER BY (coID) ASC");  // Use select query here 

            while($data = mysqli_fetch_array($records))
            {
                echo "<option value='". $data['coID'] ." - ". $data['coName'] ."'>" .$data['coID'] ." - ". $data['coName'] ."</option>";  // displaying data in option menu
            } 
        ?>  
    </select><br>

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
  $adName = mysqli_real_escape_string($db, $_POST['adName']);
  $adUsername = mysqli_real_escape_string($db, $_POST['adUsername']);
  $adEmail = mysqli_real_escape_string($db, $_POST['adEmail']);
  $adTelNo = mysqli_real_escape_string($db, $_POST['adTelNo']);
  $adComp = mysqli_real_escape_string($db, $_POST['adComp']);
  $adWorkPlace = mysqli_real_escape_string($db, $_POST['adWorkPlace']);
  $newPass = mysqli_real_escape_string($db, $_POST['newPass']);
  $confPass = mysqli_real_escape_string($db, $_POST['confPass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
    
    $newPass = md5($_POST ['newPass']);
    $query = "UPDATE admin SET adName='$adName', adUsername='$adUsername', adEmail='$adEmail', adPass='$newPass', adTelNo='$adTelNo', adWorkPlace='$adWorkPlace', adComp='$adComp' WHERE adUsername='$adUsername'";
    mysqli_query($db, $query);
    $_SESSION['adUsername'] = $adUsername;
    $_SESSION['message'] = "Data inserted!"; 
}
?>
</section>
<section style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;"><a href="https://mobirise.site/z" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>  <script src="assets/popper/popper.min.js"></script>  <script src="assets/tether/tether.min.js"></script>  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/mbr-switch-arrow/mbr-switch-arrow.js"></script>  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  <script src="assets/formstyler/jquery.formstyler.js"></script>  <script src="assets/formstyler/jquery.formstyler.min.js"></script>  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>  <script src="assets/dropdown/js/nav-dropdown.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  <script src="assets/theme/js/script.js"></script>  <script src="assets/formoid/formoid.min.js"></script>  
 
  
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">

  </body>
</html>