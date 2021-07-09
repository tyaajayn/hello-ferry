<?php
  //intialize variables
  $tranID = "";
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

  $db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'bdf41ebfb5bd3b', '7d2da349', 'heroku_21795df27a7e941');
      // Check connection
    if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
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

    if (isset($_GET['del'])) 
    {
      $tranID = $_GET['del'];
      mysqli_query($db, "DELETE FROM Transport WHERE tranID=$tranID");
      $_SESSION['message'] = "Data deleted!"; 
      header('location: admin_homepage.php');
    }

?>
