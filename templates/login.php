
<?php echo $message; ?>

<br>
<form name="frmLogin" action="authenticate.php" method="post">
<div class="form-group">
   Student ID:
   <input name="txtid" type="text" class="form-control" />
   </div>
   <br/>
   <div class="form-group">
   Password:
   <input name="txtpwd" type="password" class="form-control" />
   </div>
   <br/>

   <input type="submit" value="Login" name="btnlogin" />

</form>

