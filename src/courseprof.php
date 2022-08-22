
<?php

//Exit
if (isset($_POST['return']))
{
    header("Location: systemoperator.php");
    die();
}

$error = '';
$termmonthyear = '';
$coursenumber = '';
$coursename = '';
$instructorassigned = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 //Term Month Year
 if(empty($_POST["termmonthyear"]))
 {
  $error .= '<p><label class="text-danger">Please Enter the Term_Month_Year</label></p>';
 }
 else
 {
  $termmonthyear = clean_text($_POST["termmonthyear"]);
 }
 
 //Course Number
 if(empty($_POST["coursenumber"]))
 {
  $error .= '<p><label class="text-danger">Please Enter the Course Number</label></p>';
 }
 else
 {
  $coursenumber = clean_text($_POST["coursenumber"]);
 }
 
 //Course Name
 if(empty($_POST["coursename"]))
 {
  $error .= '<p><label class="text-danger">Please Enter the Course Name</label></p>';
 }
 else
 {
  $coursename = clean_text($_POST["coursename"]);
 }
 if(empty($_POST["instructorassigned"]))
 {
  $error .= '<p><label class="text-danger">Please enter the Instructor Assigned</label></p>';
 }
 else
 {
  $instructorassigned = clean_text($_POST["instructorassigned"]);
 }
 

 //No errors: Write to CSV and Redirect
 if($error == '')
 {
  $file_open = fopen("courseprof.csv", "a");

  $form_data = array(
   'termmonthyear'  => $termmonthyear,
   'coursenumber'  => $coursenumber,
   'coursename' => $coursename,
   'instructorassigned' => $instructorassigned,
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for submitting.</label>';
  $termmonthyear = '';
  $coursenumber = '';
  $coursename = '';
  $instructorassigned = '';

 }

 

}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Add Profs & Courses</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Add Profs & Courses</h2>
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" >
     <h5 align="center">Please enter the following information.</h5>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Term_Month_Year</label>
      <input type="text" name="termmonthyear" placeholder="Enter Term_Month_Year" class="form-control" value="<?php echo $termmonthyear; ?>" />
     </div>
     <div class="form-group">
      <label>Course Number</label>
      <input type="text" name="coursenumber" placeholder="Enter Course Number" class="form-control" value="<?php echo $coursenumber; ?>" />
     </div>
     <div class="form-group">
      <label>Course Name</label>
      <input type="text" name="coursename" class="form-control" placeholder="Enter Course Name" value="<?php echo $coursename; ?>" />
     </div>
     <div class="form-group">
      <label>Instructor Assigned</label>
      <input type="text" name="instructorassigned" class="form-control" placeholder="Enter Instructor Assigned" value="<?php echo $instructorassigned; ?>" />
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
     <br/>
     <br/>
     <div class="form-group" align="center">
          <label>Return to System Operator Tasks Menu</label>
          <input type="submit" name="return" class="btn btn-info" value="Return to System Operator Tasks Menu" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>