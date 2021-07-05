<?php
  //intialize variables
  $tranID = "0";
  $tranName = "";
  $tranType = "";
  $tranCabin = "";
  $tranComp = "";
  $tranFrom = "";
  $tranTo = "";
  $tranDate = "";
  $tranTime = "";
  $update = false;
  $errors = array(); 

  $db = mysqli_connect('localhost', 'root', '', 'fypdb');
      // Check connection
    if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
      } 
  
    // If the session variable is empty, this
    // means the user is yet to login
    // User will be sent to 'adLog.php' page
    // to allow the user to login
    if (!isset($_SESSION['adUsername'])) 
    {
        $_SESSION['msg'] = "You have to log in first";
        header('location: adLog.php');
    }

    if (isset($_POST['addTran'])) 
      {
        // receive all input values from the form
        $tranName = mysqli_real_escape_string($db, $_POST['tranName']);
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);
        $tranCabin = mysqli_real_escape_string($db, $_POST['tranCabin']);
        $tranComp = mysqli_real_escape_string($db, $_POST['tranComp']);
        $tranFrom = mysqli_real_escape_string($db, $_POST['tranFrom']);
        $tranTo = mysqli_real_escape_string($db, $_POST['tranTo']);
        $tranDate = mysqli_real_escape_string($db, $_POST['tranDate']);
        $tranTime = mysqli_real_escape_string($db, $_POST['tranTime']);

        $query = "INSERT INTO transport (tranName, tranType, tranCabin, tranComp, tranFrom, tranTo, tranDate, tranTime) 
                  VALUES('$tranName', '$tranType', '$tranCabin', '$tranComp', '$tranFrom', '$tranTo', '$tranDate', '$tranTime')";

        mysqli_query($db, $query);
        $_SESSION['message'] = "Data inserted!"; 

        header('location: admin_homepage.php');
      }


    if (isset($_POST['update'])) 
    {
        $tranID = mysqli_real_escape_string($db, $_POST['tranID']);
        $tranName = mysqli_real_escape_string($db, $_POST['tranName']);
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);
        $tranCabin = mysqli_real_escape_string($db, $_POST['tranCabin']);
        $tranComp = mysqli_real_escape_string($db, $_POST['tranComp']);
        $tranFrom = mysqli_real_escape_string($db, $_POST['tranFrom']);
        $tranTo = mysqli_real_escape_string($db, $_POST['tranTo']);
        $tranDate = mysqli_real_escape_string($db, $_POST['tranDate']);
        $tranTime = mysqli_real_escape_string($db, $_POST['tranTime']);

      mysqli_query($db, "UPDATE Transport SET tranName='$tranName', tranType='$tranType', tranCabin='$tranCabin', tranTo='$tranTo', tranFrom='$tranFrom', tranDate='$tranDate', tranTime='$tranTime' WHERE tranID='$tranID'");
      $_SESSION['message'] = "Data updated!"; 
      header('location: admin_homepage.php');
    }

    if (isset($_POST['updateBk'])) 
    {
        $bookID = mysqli_real_escape_string($db, $_POST['bookID']);
        $custUsn = mysqli_real_escape_string($db, $_POST['custUsn']);
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);
        $tranID = mysqli_real_escape_string($db, $_POST['tranID']);
        $tranCabin = mysqli_real_escape_string($db, $_POST['tranCabin']);
        $noOfAdult = mysqli_real_escape_string($db, $_POST['noOfAdult']);
        $noOfChild = mysqli_real_escape_string($db, $_POST['noOfChild']);
        $tranFrom = mysqli_real_escape_string($db, $_POST['tranFrom']);
        $tranTo = mysqli_real_escape_string($db, $_POST['tranTo']);
        $tranDate = mysqli_real_escape_string($db, $_POST['tranDate']);
        $tranTime = mysqli_real_escape_string($db, $_POST['tranTime']);

      mysqli_query($db, "UPDATE Booking SET tranType='$tranType',
       tranCabin='$tranCabin', tranTo='$tranTo', tranFrom='$tranFrom', tranDate='$tranDate', tranTime='$tranTime' WHERE tranID='$tranID'");
      $_SESSION['message'] = "Data updated!"; 
      header('location: cust_bk_edit.php');
    }

    if (isset($_GET['del'])) 
    {
      $tranID = $_GET['del'];
      mysqli_query($db, "DELETE FROM Transport WHERE tranID=$tranID");
      $_SESSION['message'] = "Data deleted!"; 
      header('location: admin_homepage.php');
    }

?>
