<?php
session_start();

// initializing variables
$fName = "";
$lName = "";
$username = "";
$custTelNo = "";
$custEmail = "";
$custPass = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fypdb');

// REGISTER USER
if (isset($_POST['cust_reg'])) {
  // receive all input values from the form
  $fName = mysqli_real_escape_string($db, $_POST['fName']);
  $lName = mysqli_real_escape_string($db, $_POST['lName']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $custTelNo = mysqli_real_escape_string($db, $_POST['custTelNo']);
  $custEmail = mysqli_real_escape_string($db, $_POST['custEmail']);
  $custPass = mysqli_real_escape_string($db, $_POST['custPass']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($custPass)) { array_push($errors, "Password is required"); }
  if ($custPass != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $customer_check_query = "SELECT * FROM customer WHERE username='$username' OR custEmail='$custEmail' LIMIT 1";
  $result = mysqli_query($db, $customer_check_query);
  $customer = mysqli_fetch_assoc($result);
  
  if ($customer) { // if user exists
    if ($customer['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($customer['custEmail'] === $custEmail) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    $custPass = md5($_POST ['custPass']);
  	$query = "INSERT INTO customer (fName, lname, username, custTelNo, custEmail, custPass) 
  			  VALUES('$fName', '$lName', '$username', '$custTelNo', '$custEmail', '$custPass')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	header('location: custLog.php');
  }
}

// LOGIN USER
if (isset($_POST['cust_log'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $custPass = mysqli_real_escape_string($db, $_POST['custPass']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($custPass)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
    $custPass = md5($_POST ['custPass']);
  	$query = "SELECT * FROM customer WHERE username='$username' AND custPass='$custPass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  header('location: cust_homepage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>