<?PHP

$message = '';


//Exit
if (isset($_POST['return']))
{
    header("Location: manageusers.php");
    die();
}

if (isset($_POST['submit']))
{

$username = $_POST['username'];

chmod("useraccounts.csv", 755);
$file = file_get_contents("useraccounts.csv");
if(!strstr($file, ",$username,") || empty($username))
{
    //$message = "<p><center>Invalid username. Please use a valid username and try again.</center></p>";
    $message = '<label class="text-warning">Invalid username. Please use a valid username and try again.</label>';
    
}
else
{

  $message = '<label class="text-success">The account has been successfully deleted.</label>';
  //Code
  $filename_with_path = 'useraccounts.csv';                                         
  $del_tag_array = $username; 
     

  $tag_data_from_csv = [];                                                        

  if ($handle = fopen($filename_with_path, "r")) {                                
      while ($data = fgetcsv($handle, 1000, ",")) {                               
          if (in_array($del_tag_array, $data)){                          
              continue;                                                           
          }                                                                       
          $tag_data_from_csv[] = $data;                                           
      }                                                                           
  }                                                                               
  fclose($handle);                                                                
  if ($handle = fopen("useraccounts.csv", "w")) {                                
      foreach ($tag_data_from_csv as $data_at_each_index)                         
      {                                                                           
          fputcsv($handle, $data_at_each_index) or die('cannot write file');         
      }                                                                           
  }                                                                               
  fclose($handle);
  }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Delete User Account</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <br />
  <div class="container">
   <h2 align="center">Delete User Account</h2>
   
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br />
   <h5 align="center">To delete a user's account, please enter their username. </h5>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" action="deleteaccount.php">
    
     <div class="form-group">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Enter Username"  />
     </div>
     
     <?php echo $message; ?>

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