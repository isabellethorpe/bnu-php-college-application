<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

    // redirect if student is empty
    if (empty($_POST['students'])) {
        // pop up error message?
        header("Location: students.php");
    }

    // Loop over students and SQL query to delete item
    foreach($_POST['students'] as $student) {
        $sql = "DELETE FROM student WHERE studentid = $student";
        // run the query
        $result = mysqli_query($conn,$sql);
    }
    

    // redirect
    header("Location: students.php");

   } else {
      header("Location: index.php");
   }


?>
