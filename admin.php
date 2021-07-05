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
$errors = array(); 
$_SESSION['success']="";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fypdb');

// LOGIN ADMIN
if (isset($_POST['ad_log'])) 
{
  $adUsername = mysqli_real_escape_string($db, $_POST['adUsername']);
  $adPass = mysqli_real_escape_string($db, $_POST['adPass']);

  if (empty($adUsername)) 
  {
  	array_push($errors, "Username is required");
  }

  if (empty($adPass)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
    $adPass = md5($_POST ['adPass']);
  	$query = "SELECT * FROM admin WHERE adUsername='$adUsername' AND adPass='$adPass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) 
    {
  	  $_SESSION['adUsername'] = $adUsername;
  	  header('location: admin_homepage.php');
  	}
    else 
    {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>