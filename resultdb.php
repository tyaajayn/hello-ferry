<?php
  session_start();

      $custUsn = "";
      $fName = "";
      $lName = "";
      $custTelNo = "";
      $custEmail = "";
      $tranID = "";
      $tranName = "";
      $tranType = "";
      $tranCabin = "";
      $tranComp = "";
      $tranFrom = "";
      $tranTo = "";
      $tranDate = "";
      $tranTime = "";
      $terName = "";
      $adultNo = "";
      $childNo= "";

      $db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'bdf41ebfb5bd3b', '7d2da349', 'heroku_21795df27a7e941');
      // Check connection
      if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
      }  
      
    if (isset($_POST['find'])) 
      {
        // receive all input values from the form
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);
        $tranDate = mysqli_real_escape_string($db, $_POST['tranDate']);

          $sql = "SELECT transport.*, terminal.terName FROM transport INNER JOIN terminal ON transport.tranFrom = terminal.terID WHERE tranDate = '$tranDate' AND tranType = '$tranType'";        
          $result = $db->query($sql);
          while ($row = $result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>"; echo $row["tranID"]; echo "</td>";
            echo "<td>"; echo $row["tranName"]; echo "</td>";
            echo "<td>"; echo $row["tranType"]; echo "</td>";
            echo "<td>"; echo $row["tranCabin"]; echo "</td>";
            echo "<td>"; echo $row["terName"]; echo "</td>";
            echo "<td>"; echo $row["tranDate"]; echo "</td>";
            echo "<td>"; echo $row["tranTime"]; echo "</td>"; 
            echo"</tr>";

          }
      }

      if (isset($_POST['book'])) 
      {
        // receive all input values from the form
        $tranID = mysqli_real_escape_string($db, $_POST['tranID']);
        $custUsn = mysqli_real_escape_string($db, $_POST['custUsn']);
        $adultNo = mysqli_real_escape_string($db, $_POST['adultNo']);
        $childNo = mysqli_real_escape_string($db, $_POST['childNo']);

        $query = "INSERT INTO booking (custUsn, tranID, adultNo, childNo) 
  			VALUES('$custUsn', '$tranID', '$adultNo', '$childNo')";
        mysqli_query($db, $query);

        header('location: cust_homepage.php');
      }

?>