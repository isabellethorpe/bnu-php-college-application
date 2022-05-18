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

      // Obtain the file sent to the server within the response.
      $image = $_FILES['studentimage']['tmp_name'];

      // Get the file binary data
      $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));


      // build an sql statment to update the student details
      // add student sql

      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      // Added sqli protection statements
      $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
      $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
      $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
      $dob = mysqli_real_escape_string($conn, $_POST['dob']);
      $house = mysqli_real_escape_string($conn, $_POST['house']);
      $town = mysqli_real_escape_string($conn, $_POST['town']);
      $county = mysqli_real_escape_string($conn, $_POST['county']);
      $country = mysqli_real_escape_string($conn, $_POST['country']);
      $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

      $sql = "INSERT into student (studentid, password, firstname, lastname, dob, house, town, county, country, postcode, image) values ('$studentid', '$password', '$firstname', '$lastname', '$dob', '$house', '$town', '$county', '$country', '$postcode', '$imagedata');";

      $result = mysqli_query($conn, $sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Student added successfully</div>";
   }


   $data['content'] .= <<<EOD

   <h2>Add Student</h2>
   <form name="formaddstudent" enctype="multipart/form-data" action="" method="post">
   <div class="form-group">
   Student ID :
   <input name="studentid" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Password :
   <input name="password" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   First Name :
   <input name="firstname" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Last Name :
   <input name="lastname" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Date of birth :
   <input name="dob" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   House :
   <input name="house" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Town :
   <input name="town" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   County :
   <input name="county" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Country :
   <input name="country" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Postcode :
   <input name="postcode" type="text" value="" class="form-control"/><br/>
   </div>
   <div class="form-group">
   Student image :
   <input  type="file" name="studentimage" accept="image/jpeg" class="form-control" />
   </div>
   </br></br>
   <br>
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
