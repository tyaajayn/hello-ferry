<?php
  echo"<table class='table table-bordered;' style='text-align:center;'>"
  echo"<thead><tr><th>#</th>
       <th>Transport Name</th>
       <th>Type</th>
       <th>Cabin Class</th>
       <th>From</th>
       <th>Date</th>
       <th>Time</th>
     </tr></thead>"

    $custUsn = "";
    $tranID = "";
    $tranName = "";
    $tranCabin = "";
    $tranComp = "";
    $tranFrom = "";
    $tranTo = "";
    $tranDate = "";
    $tranTime = "";
    $terName = "";
    $bookDate = "";
    $bookType= "";
    $noOfChild = "";
    $noOfAdult = "";

    $db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'bdf41ebfb5bd3b', '7d2da349', 'heroku_21795df27a7e941');
      // Check connection
      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
      } 
      
    if (isset($_POST['confirm'])) 
      {
        // receive all input values from the form
        $tranType = mysqli_real_escape_string($db, $_POST['tranType']);

          $sql = "SELECT transport.*, terminal.terName FROM transport INNER JOIN terminal ON transport.tranFrom = terminal.terID WHERE tranType = '$tranType'";        
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
?>