
<?php

//Exit
if (isset($_POST['return']))
{
  header("Location: manageusers.php");
  die();
}

$error = '';
$firstname = '';
$lastname = '';
$email = '';
$studentid = '';
$username = '';
$password = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["firstname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your First Name</label></p>';
 }
 else
 {
  $firstname = clean_text($_POST["firstname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$firstname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["lastname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Last Name</label></p>';
 }
 else
 {
  $lastname = clean_text($_POST["lastname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$lastname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["studentid"]))
 {
  $error .= '<p><label class="text-danger">Student ID is required</label></p>';
 }
 else
 {
  $studentid = clean_text($_POST["studentid"]);
 }
 if(empty($_POST["username"]))
 {
  $error .= '<p><label class="text-danger">Username is required</label></p>';
 }
 else
 {
  $username = clean_text($_POST["username"]);
 }
 if(empty($_POST["password"]))
 {
  $error .= '<p><label class="text-danger">Password is required</label></p>';
 }
 else
 {
  $password = clean_text($_POST["password"]);
 }

 //No errors: Write to CSV and Redirect
 if($error == '')
 {
  $file_open = fopen("useraccounts.csv", "a");

  $form_data = array(
   //'sr_no'  => $no_rows,
   'firstname'  => $firstname,
   'lastname'  => $lastname,
   'email'  => $email,
   'studentid' => $studentid,
   'username' => $username,
   'password' => $password
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">The account has been successfully added.</label>';
  $firstname = '';
  $lastname = '';
  $email = '';
  $studentid = '';
  $username = '';
  $password = '';

 }

 

}

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Add User Account</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Add User Account</h2>
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" >
     <h5 align="center">Please enter the following information to register as a new user.</h5>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>First Name</label>
      <input type="text" name="firstname" placeholder="Enter First Name" class="form-control" value="<?php echo $firstname; ?>" />
     </div>
     <div class="form-group">
      <label>Last Name</label>
      <input type="text" name="lastname" placeholder="Enter Last Name" class="form-control" value="<?php echo $lastname; ?>" />
     </div>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Student ID Number</label>
      <input type="text" name="studentid" class="form-control" placeholder="Enter Student ID Number" value="<?php echo $studentid; ?>" />
     </div>
     <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $username; ?>" />
     </div>
     <div class="form-group">
      <label>Password</label>
      <input type="text" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password; ?>" />
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
     <br/>
     <br/>
     <div class="form-group" align="center">
      <label>Return to Manage Users Page</label>
      <input type="submit" name="return" class="btn btn-info" value="Return to Manage Users Page" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>