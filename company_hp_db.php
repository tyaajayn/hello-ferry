<?php
session_start();

// initializing variables
  $adName = "";
  $adUsername = "";
  $adEmail = "";
  $adPass = "";
  $password2 = "";
  $adTelNo = "";
  $adWorkPlace = "";
  $adComp = "";
  $update = false;
  $errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fypdb');
      // Check connection
    if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
      } 

// REGISTER USER
if (isset($_POST['adReg'])) {
  // receive all input values from the form
  $adName = mysqli_real_escape_string($db, $_POST['adName']);
  $adUsername = mysqli_real_escape_string($db, $_POST['adUsername']);
  $adEmail = mysqli_real_escape_string($db, $_POST['adEmail']);
  $adPass = mysqli_real_escape_string($db, $_POST['adPass']);
  $adTelNo = mysqli_real_escape_string($db, $_POST['adTelNo']);
  $adWorkPlace = mysqli_real_escape_string($db, $_POST['adWorkPlace']);
  $adComp = mysqli_real_escape_string($db, $_POST['adComp']);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $admin_check_query = "SELECT * FROM admin WHERE adUsername='$adUsername' OR adEmail='$adEmail' LIMIT 1";
  $result = mysqli_query($db, $admin_check_query);
  $admin = mysqli_fetch_assoc($result);
  
  if ($admin) 
  { // if user exists

    if ($admin['adUsername'] === $adUsername) 
    {
      array_push($errors, "Username already exists");
    }

    if ($admin['adEmail'] === $adEmail) 
    {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $adPass = md5($_POST ['adPass']);
    $query = "INSERT INTO Admin (adName, adUsername, adEmail, adPass, adTelNo, adWorkPlace, adComp) 
          VALUES('$adName', '$adUsername', '$adEmail', '$adPass', '$adTelNo', '$adWorkPlace', '$adComp')";
    mysqli_query($db, $query);
    $_SESSION['adUsername'] = $adUsername;

    header('location: company_homepage.php');
  }

          mysqli_query($db, $query);
        $_SESSION['message'] = "Data inserted!"; 
}

    if (isset($_POST['update'])) 
    {
        $adID = mysqli_real_escape_string($db, $_POST['adID']);
        $adName = mysqli_real_escape_string($db, $_POST['adName']);
        $adUsername = mysqli_real_escape_string($db, $_POST['adUsername']);
        $adEmail = mysqli_real_escape_string($db, $_POST['adEmail']);
        $adPass = mysqli_real_escape_string($db, $_POST['adPass']);
        $adTelNo = mysqli_real_escape_string($db, $_POST['adTelNo']);
        $adWorkPlace = mysqli_real_escape_string($db, $_POST['adWorkPlace']);
        $adComp = mysqli_real_escape_string($db, $_POST['adComp']);

      mysqli_query($db, "UPDATE Admin SET adName='$adName', adUsername='$adUsername', adEmail='$adEmail', adPass='$adPass', adTelNo='$adTelNo', adWorkPlace='$adWorkPlace', adComp='$adComp' WHERE adID='$adID'");
      $_SESSION['message'] = "Admin updated!"; 
      header('location: company_homepage.php');
    }

    if (isset($_GET['del'])) 
    {
      $adID = $_GET['del'];
      mysqli_query($db, "DELETE FROM Admin WHERE adID=$adID");
      $_SESSION['message'] = "Admin deleted!"; 
      header('location: company_homepage.php');
    }

?>
