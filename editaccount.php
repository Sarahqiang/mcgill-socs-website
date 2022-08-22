<?PHP

session_start();

$error = '';

//Exit
if (isset($_POST['return']))
{
    header("Location: manageusers.php");
    die();
}

if (isset($_POST['submit']))
{

$username = $_POST['username'];
//Save variable
$_SESSION['myusername'] = $username;

chmod("useraccounts.csv", 755);
$file = file_get_contents("useraccounts.csv");
if(!strstr($file, ",$username,") || empty($username))
{
  $error = '<label class="text-warning">Invalid username. Please enter another username and try again.</label>';
}
else
{
  
  //Redirect
  header("Location: editaccount2.php");
  die();


}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Edit User Account</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <br />
  <div class="container">
   <h2 align="center">Edit User Account</h2>
   
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br/>
   <h5 align="center">To edit a user's account, please enter their username. </h5>
   <br />
   
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" action="editaccount.php">
    
     <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter Username"  />
     </div>
     
     <?php echo $error; ?>

     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Continue" />
     </div>
     <br />
     <br />
     <div class="form-group" align="center">
      <label>Return to Manage Users Page</label>
      <input type="submit" name="return" class="btn btn-info" value="Return to Manage Users Page" />
     </div>
    </form>
   </div>
  </div>
 </body>


<body>
</html>