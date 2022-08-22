<?PHP

$error = '';

if (isset($_POST['signup']))
{
  header("Location: signup.php");
  die();
}

if (isset($_POST['submit']))
{

$username = $_POST['username'];
$password = $_POST['password'];

chmod("useraccounts.csv", 755);
$file = file_get_contents("useraccounts.csv");
if(!strstr($file, "$username,$password") || empty($username) || empty($password))
{
  $error = '<label class="text-warning">Invalid username & password. Please enter a valid username & password and try again.</label>';
}
else
{

  //Check Prof/TA
  $file2 = file_get_contents("accounts_prof_ta.csv");
  if(strstr($file2, "$username,$password"))
  {
    header("Location: dashborad_prof.html");
    die();
  }

  //Check Admin
  $file3 = file_get_contents("accounts_admin.csv");
  if(strstr($file3, "$username,$password"))
  {
    header("Location: dashboard_admin.html");
    die();
  }

  //Check System Operator
  $file4 = file_get_contents("accounts_sysoperator.csv");
  if(strstr($file4, "$username,$password"))
  {
    header("Location: dashborad_system.html");
    die();
  }

  //Normal Student
  header("Location: dashboard_rate_Ta.html");
  die();
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <br />
  <div class="container">
   <h2 align="center">TA Management System</h2>
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br />
   
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" action="index.php">
     <?php echo $error; ?>
     <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter Username"  />
     </div>
     <div class="form-group">
      <label>Password</label>
      <input type="text" name="password" class="form-control" placeholder="Enter Password"  />
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Login" />
     </div>
     <br />
     <br />
     <div class="form-group" align="center">
      <label>Don't have an account?</label>
      <input type="submit" name="signup" class="btn btn-info" value="Signup Here" />
     </div>
    </form>
   </div>
  </div>
 </body>


<body>
</html>


