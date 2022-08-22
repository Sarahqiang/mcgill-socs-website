
<?php

session_start();

//Get previously entered username
$myusername=$_SESSION['myusername'];

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
  //First Name
  $firstname = clean_text($_POST["firstname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$firstname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 
  //Last Name
  $lastname = clean_text($_POST["lastname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$lastname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 
  //Email
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($_POST["email"]))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 
  //ID
  $studentid = clean_text($_POST["studentid"]);
 
  //Username
  $username = clean_text($_POST["username"]);
 
  //Password
  $password = clean_text($_POST["password"]);
 
  $nochanges = false;

  //Everything is empty
  if (empty($firstname) && empty($lastname) && empty($email) && empty($studentid) && empty($username) && empty($password))
  {
    $nochanges = true;
    $error = '<label class="text-warning">Please enter your changes.</label>';
  }

   
  //No errors: Write to CSV and Redirect
  if($error == '' && !$nochanges){
    //Code
    $filename_with_path = 'useraccounts.csv';                                         
    $del_tag_array = $myusername; 
      

    $tag_data_from_csv = [];                                                        

    if ($handle = fopen($filename_with_path, "r")) {                                
        while ($data = fgetcsv($handle, 1000, ",")) {  
          
            //Found user account to edit
            if (in_array($del_tag_array, $data)){    
              
              //If empty use original
              //If not empty, use variable as is
              if (empty($firstname)){
                //Use existing
                $firstname = $data[0];
              }
              if (empty($lastname)){
                //Use existing
                $lastname = $data[1];
              }
              if (empty($email)){
                //Use existing
                $email = $data[2];
              }
              if (empty($studentid)){
                //Use existing
                $studentid = $data[3];
              }
              if (empty($username)){
                //Use existing
                $username = $data[4];
              }
              if (empty($password)){
                //Use existing
                $password = $data[5];
              }

                            
              //Add edited row
              $form_data = array(
                'firstname'  => $firstname,
                'lastname'  => $lastname,
                'email'  => $email,
                'studentid' => $studentid,
                'username' => $username,
                'password' => $password
              );

              //Add row                                               
              $tag_data_from_csv[] = $form_data;    

              continue;
            }            

            //Row is the same                                                    
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
    $error = '<label class="text-success">Successfully edited account.</label>';
  }

  $firstname = '';
  $lastname = '';
  $email = '';
  $studentid = '';
  $username = '';
  $password = '';

}

?>


<!DOCTYPE html>
<html>
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
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" >
     <center>
     <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
     <center>
     <br />  
     <h4 align="center">Please enter your changes to the account and click Submit.</h4>
     
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
    </form>
   </div>
  </div>
 </body>
</html>