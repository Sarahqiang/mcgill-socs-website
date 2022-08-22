<?php

//Exit
if (isset($_POST['return']))
{
  header("Location: TAadmin.html");
  die();
}

$error = '';
$termmonthyear = '';
$course = '';
$name = '';
$studentid = '';
$hours = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["termmonthyear"]))
 {
  $error .= '<p><label class="text-danger">Please Enter the Term_Month_Year</label></p>';
 }
 else
 {
  $termmonthyear = clean_text($_POST["termmonthyear"]);
 }
 if(empty($_POST["course"]))
 {
  $error .= '<p><label class="text-danger">Please Enter the Course Number</label></p>';
 }
 else
 {
  $course = clean_text($_POST["course"]);
 }
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please the TA Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
 }
 if(empty($_POST["studentid"]))
 {
  $error .= '<p><label class="text-danger">Student ID is required</label></p>';
 }
 else
 {
  $studentid = clean_text($_POST["studentid"]);
 }
 if(empty($_POST["hours"]))
 {
  $error .= '<p><label class="text-danger">Assigned Hours is required</label></p>';
 }
 else
 {
  $hours = clean_text($_POST["hours"]);
 }

 //No changes
 $nochanges = false;

  //Everything is empty
  if (empty($termmonthyear) && empty($course) && empty($name) && empty($studentid) && empty($hours))
  {
    $nochanges = true;
    $error = '<label class="text-warning">Please enter your changes.</label>';
  }
 
    $edited = false;

    //No errors: Write to CSV and Redirect
    if($error == '' && !$nochanges){
        
        //$error = '<p><label class="text-danger">Hello</label></p>';

        //Code
        $filename_with_path = 'courseta.csv';                                         
        $del_tag_array = $studentid; 
        

        $tag_data_from_csv = [];                                                        

        if ($handle = fopen($filename_with_path, "r")) {                                
            while ($data = fgetcsv($handle, 1000, ",")) {   
            
                //Found user account to edit
                if (in_array($del_tag_array, $data)){    
                
                $edited = true;

                //If empty use original
                //If not empty, use variable as is

                

                $spacecourse = " " . $course;

                $course = $data[1] .=  $spacecourse;


                if (empty($termmonthyear)){
                    //Use existing
                    $termmonthyear = $data[0];
                }
                // if (empty($course)){
                //     //Use existing
                //     $course = $data[1];
                // }
                if (empty($name)){
                    //Use existing
                    $name = $data[2];
                }
                if (empty($studentid)){
                    //Use existing
                    $studentid = $data[3];
                }
                if (empty($hours)){
                    //Use existing
                    $hours = $data[4];
                }
                                
                //Add edited row
                $form_data = array(
                    'termmonthyear'  => $termmonthyear,
                    'course'  => $course,
                    'name'  => $name,
                    'studentid' => $studentid,
                    'hours' => $hours
                );

                //Add row                                               
                $tag_data_from_csv[] = $form_data;    

                continue;
                }   
                
                //Else: Keep original
                //Row is the same                                                    
                $tag_data_from_csv[] = $data;  
                
            }                                                                           
        }    

        //Close
        fclose($handle);                                                                
        if ($handle = fopen("courseta.csv", "w")) {                                
            foreach ($tag_data_from_csv as $data_at_each_index)                         
            {                                                                           
                fputcsv($handle, $data_at_each_index) or die('cannot write file');         
            }                                                                           
        }                  

        fclose($handle);

        //if didn't edit

        if (!$edited){
            //Append
            $file_open = fopen("courseta.csv", "a");

            //Append: Add new row
            $form_data = array(
                'termmonthyear'  => $termmonthyear,
                'course'  => $course,
                'name'  => $name,
                'studentid' => $studentid,
                'hours' => $hours
            );    

            //Append                                                
            fputcsv($file_open, $form_data); 
        }

        

        $error = '<label class="text-success">Successfully added TA & Courses.</label>';
   
        $termmonthyear = '';
        $course = '';
        $name = '';
        $studentid = '';
        $hours = '';
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
   <h2 align="center">Add TA to a Course</h2>
   <center>
   <img src="bird.png"  width="120" height="90" title="McGill Bird" alt="McGill Bird" />
   </center>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post" action="addta.php">
     <h5 align="center">Please enter the following.</h5> 
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Term_Month_Year</label>
      <input type="text" name="termmonthyear" placeholder="Enter Term_Month_Year" class="form-control" value="<?php echo $termmonthyear; ?>" />
     </div>
     <div class="form-group">
      <label>Course</label>
      <input type="text" name="course" placeholder="Enter Course" class="form-control" value="<?php echo $course; ?>" />
     </div>
     <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Student ID Number</label>
      <input type="text" name="studentid" class="form-control" placeholder="Enter Student ID Number" value="<?php echo $studentid; ?>" />
     </div>
     <div class="form-group">
      <label>Hours</label>
      <input type="text" name="hours" class="form-control" placeholder="Enter Hours" value="<?php echo $hours; ?>" />
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
     <br/>
     <br/>
     <div class="form-group" align="center">
      <label>Return to TA Administration Menu</label>
      <input type="submit" name="return" class="btn btn-info" value="Return to TA Administration" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>