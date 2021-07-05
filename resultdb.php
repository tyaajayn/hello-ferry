<?php
  session_start();

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
      $noOfChild = "";
      $noOfAdult = "";

      $db = mysqli_connect('localhost', 'root', '', 'fypdb');
      // Check connection
      if ($db->connect_error) 
      {
        die("Connection failed: " . $db->connect_error);
      }  
      
    if (isset($_POST['find'])) 
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

      if (isset($_POST['continue'])) 
      {
        // receive all input values from the form


          $sql = "SELECT transport.*, terminal.terName FROM transport, terminal WHERE tranFrom = terID AND tranID='$tranID'";

          $result = $db->query($sql);
          while ($row = $result->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>"; echo $row["tranID"]; echo "</td>";
            echo "<td>"; echo $row["tranName"]; echo "</td>";
            echo "<td>"; echo $row["tranType"]; echo "</td>";
            echo "<td>"; echo $row["tranCabin"]; echo "</td>";
            echo "<td>"; echo $row["tranDate"]; echo "</td>";
            echo "<td>"; echo $row["tranTime"]; echo "</td>"; 
            echo"</tr>";

          } 
          mysqli_query($db, $sql);
      }
?>