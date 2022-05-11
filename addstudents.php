<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {


      // build an sql statment to update the student details
      // add student sql
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $sql = "INSERT into student (studentid, password, firstname, lastname, dob, house, town, county, country, postcode) values ('$_POST[studentid]', '$password',
      '$_POST[firstname]', '$_POST[lastname]', '$_POST[dob]', '$_POST[house]', '$_POST[town]', '$_POST[county]', '$_POST[country]', '$_POST[postcode]');";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Student added successfully</div>";

   }

   $data['content'] .= <<<EOD

   <h2>Add Student</h2>
   <form name="formaddstudent" action="" method="post">
   Student ID :
   <input name="studentid" type="text" value="" /><br/>
   Password :
   <input name="password" type="text" value="" /><br/>
   First Name :
   <input name="firstname" type="text" value="" /><br/>
   Last Name :
   <input name="lastname" type="text" value="" /><br/>
   Date of birth :
   <input name="dob" type="text" value="" /><br/>
   House :
   <input name="house" type="text" value="" /><br/>
   Town :
   <input name="town" type="text" value="" /><br/>
   County :
   <input name="county" type="text" value="" /><br/>
   Country :
   <input name="country" type="text" value="" /><br/>
   Postcode :
   <input name="postcode" type="text" value="" /><br/>
   Image : 
   <input name "image" type "file" value="" /><br/>
   <input type="submit" value="Save" name="submit"/>
   </form>
EOD;


// 5. Add a file upload field to the addstudent.php script and implement the PHP code to allow for an
// image to be uploaded with each new student. If you decide to add a new database column as part
// of this functionality, ensure you document this in your report. The uploaded image should be
// displayed on the students.php page against the relevant student record. Higher marks will be
// awarded for robust implementations will some level of file type validation. 

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: student.php");
}

echo template("templates/partials/footer.php");

?>
