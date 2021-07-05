<?php
session_start();

// initializing variables
$coName = "";
$coEmail = "";
$coUsername = "";
$coPass = "";
$password2 = "";
$coTelNo = "";
$coHq = "";
$errors = array();
$_SESSION['success'] = ""; 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fypdb');

// REGISTER USER
if (isset($_POST['co_reg'])) {
  // receive all input values from the form
  $coName = mysqli_real_escape_string($db, $_POST['coName']);
  $coUsername = mysqli_real_escape_string($db, $_POST['coUsername']);
  $coEmail = mysqli_real_escape_string($db, $_POST['coEmail']);
  $coPass = mysqli_real_escape_string($db, $_POST['coPass']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);
  $coTelNo = mysqli_real_escape_string($db, $_POST['coTelNo']);
  $coHq = mysqli_real_escape_string($db, $_POST['coHq']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($coPass)) { array_push($errors, "Password is required"); }
  if ($coPass != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $company_check_query = "SELECT * FROM company WHERE coUsername='$coUsername' OR coEmail='$coEmail' LIMIT 1";
  $result = mysqli_query($db, $company_check_query);
  $company = mysqli_fetch_assoc($result);
  
  if ($company) { // if user exists
    if ($company['coUsername'] === $coUsername) {
      array_push($errors, "Username already exists");
    }

    if ($company['coEmail'] === $coEmail) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $coPass = md5($_POST ['coPass']);
  	$query = "INSERT INTO company (coName, coUsername, coEmail, coPass, coTelNo, coHq) 
  			  VALUES('$coName', '$coUsername', '$coEmail', '$coPass', '$coTelNo', '$coHq')";
  	mysqli_query($db, $query);
  	$_SESSION['coUsername'] = $coUsername;
  	header('location: coLog.php');
  }
}

// LOGIN
if (isset($_POST['co_log'])) {
  $coUsername = mysqli_real_escape_string($db, $_POST['coUsername']);
  $coPass = mysqli_real_escape_string($db, $_POST['coPass']);

  if (empty($coUsername)) {
    array_push($errors, "Username is required");
  }
  if (empty($coPass)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
    $coPass = md5($_POST ['coPass']);
    $query = "SELECT * FROM company WHERE coUsername='$coUsername' AND coPass='$coPass'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['coUsername'] = $coUsername;
      header('location: company_homepage.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


?>