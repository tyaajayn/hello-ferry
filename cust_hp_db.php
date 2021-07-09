<?php
session_start();

// initializing variables
$bookID = "";
$custUsn = "";
$tranID = "";
$adultNo = "";
$childNo = "";
  $update = false;
  $errors = array(); 

// connect to the database
$db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'bdf41ebfb5bd3b', '7d2da349', 'heroku_21795df27a7e941');
      // Check connection
    if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
      } 

      if (isset($_POST['updateBk'])) 
      {
          $bookID = mysqli_real_escape_string($db, $_POST['bookID']);
          $custUsn = mysqli_real_escape_string($db, $_POST['custUsn']);
          $tranID = mysqli_real_escape_string($db, $_POST['tranID']);
          $adultNo = mysqli_real_escape_string($db, $_POST['adultNo']);
          $childNo = mysqli_real_escape_string($db, $_POST['childNo']);
  
        mysqli_query($db, "UPDATE Booking SET adultNo='$adultNo', childNo='$childNo' WHERE bookID='$bookID'");
        $_SESSION['message'] = "Data updated!"; 
        header('location: cust_homepage.php');
      }

      if (isset($_GET['del'])) 
      {
        $bookID = $_GET['del'];
        mysqli_query($db, "DELETE FROM Booking WHERE bookID=$bookID");
        header('location: cust_homepage.php');
      }

?>
