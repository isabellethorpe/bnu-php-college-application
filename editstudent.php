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
      // update student sql
      $sql = "UPDATE student set studentid = '$_POST[studentid]', password = '$_POST[password]', firstname = '$_POST[firstname]', lastname = '$_POST[lastname]', dob = '$_POST[dob]', house = '$_POST[house]', town = '$_POST[town]', county = '$_POST[county]', country = '$_POST[country]', postcode = '$_POST[postcode]', where id = '$_POST[studentid]'";

      $result = mysqli_query($conn,$sql);

      // boostrap confirmation message
      $data['content'] .= "<div class='alert alert-success' role='alert'>Student updated successfully</div>";

   }
   else {

      $sql = "SELECT * from student where studentid='". $_GET["studentid"] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

      <h2>Edit Student</h2>
      <form name="formeditstudent" action="" method="post">
      <input type="hidden" name="id" value="{$row['studentid']}">
      <div class="form-group">
      Student ID :
      <input name="studentid" type="text" value="{$row['studentid']}" class="form-control" /><br/>
      </div>
      <div class="form-group">
      Password :
      <input name="password" type="text" value="{$row['password']}" class="form-control"/><br/>
      </div>
      <div class="form-group">
      First Name :
      <input name="firstname" type="text" value="{$row['firstname']}"class="form-control"/><br/>
      </div>
      <div class="form-group">
      Last Name :
      <input name="lastname" type="text" value="{$row['lastname']}"class="form-control" /><br/>
      </div>
      <div class="form-group">
      Date of birth :
      <input name="dob" type="text" value="{$row['dob']}"class="form-control" /><br/>
      </div>
      <div class="form-group">
      House :
      <input name="house" type="text" value="{$row['house']}" class="form-control"/><br/>
      </div>
      <div class="form-group">
      Town :
      <input name="town" type="text" value="{$row['town']}"class="form-control" /><br/>
      </div>
      <div class="form-group">
      County :
      <input name="county" type="text" value="{$row['county']}"class="form-control" /><br/>
      </div>
      <div class="form-group">
      Country :
      <input name="country" type="text" value="{$row['country']}"class="form-control" /><br/>
      </div>
      <div class="form-group">
      Postcode :
      <input name="postcode" type="text" value="{$row['postcode']}"class="form-control" /><br/>
      </div>


      <input type="submit" value="Save" name="submit"/>
      </form>
EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: student.php");
}

echo template("templates/partials/footer.php");

?>
