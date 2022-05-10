<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects all from STUDENT
      $sql = "SELECT * FROM student";

      $result = mysqli_query($conn, $sql);

      
      $data['content'] .= <<<EOD
      <h2>Students</h2>
      <a href="addstudents.php" class="btn btn-primary mb-2">Add Student</a>
EOD;


      // form will POST to deletestudents.php
        $data['content'] .="<form action='deletestudents.php'>";



      // prepare page content
      $data['content'] .= "<table border='1'>";
     
    $data['content'] .="<tr>
    <th>Student ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of birth</th>
    <th>House</th>
    <th>Town</th>
    <th>County</th>
    <th>Country</th>
    <th>Postcode</th>
    <th>Edit</th>
    </tr>";
      
      // Display the student details within the html table
      while($row = mysqli_fetch_array($result)) {
        $data['content'] .="<tr>";
        $data['content'] .= "<td> {$row["studentid"]} </td>";
         $data['content'] .= "<td> {$row["firstname"]} </td>";
         $data['content'] .= "<td> {$row["lastname"]} </td>";
         $data['content'] .= "<td> {$row["dob"]} </td>";
         $data['content'] .= "<td> {$row["house"]} </td>";
         $data['content'] .= "<td> {$row["town"]} </td>";
         $data['content'] .= "<td> {$row["county"]} </td>";
         $data['content'] .= "<td> {$row["country"]} </td>";
         $data['content'] .= "<td> {$row["postcode"]} </td>";
         // add values to each checkbox
         $data['content'] .= "<td> <input type='checkbox' name='students[]'
          value='$row[studentid]'</td>";
      }
      $data['content'] .= "</table>";

        // delete button

      $data['content'] .="<input type='submit' name='deletebtn' value='Delete'/>";

      $data['content'] .="</form>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
