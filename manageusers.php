<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    .title
    {
        position: absolute;
        width: 500px;
        height: 81px;
        left: 36%;
        top: 27%;
        /* text-align:center;
        margin-left:auto;
        margin-right:auto; */

        font-family: 'Poppins';
        font-style: normal;
        font-weight: 700;
        font-size: 64px;
        line-height: 24px;

        color: #1D242E;
    }
    .sub_title
    {
        position: absolute;
        left: 39%;
        right: 37.12%;
        top: 35%;
        bottom: 68.55%;

        font-family: 'Poppins';
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 48px;

        color: #1D242E;
    }
    .edit
    {
        position: absolute;
        width: 311.25px;
        height: 183.52px;
        left: 66%;
        top: 50%;

        background: #FFFFFF;
        border: 5px solid #FED600;
        box-sizing: border-box;
        border-radius: 4px 4px 0px 0px;
    }
    .add
{
    position: absolute;
    width: 311.25px;
    height: 183.52px;
    left: 10%;
    top: 50%;

    background: #FFFFFF;
    border: 5px solid #FED600;
    box-sizing: border-box;
    border-radius: 4px 4px 0px 0px;
}
.delete
{
    position: absolute;
    width: 311.25px;
    height: 183.52px;
    left: 38%;
    top: 50%;

    background: #FFFFFF;
    border: 5px solid #FED600;
    box-sizing: border-box;
    border-radius: 4px 4px 0px 0px;
}

.log_out
    {
        position: absolute;
        width: 100px;
        height: 24px;
        left: 90%;
        top: 95%;

        background: #4B72C2;
        border: 2px solid #25A9F3;
        box-sizing: border-box;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
    }
</style>

<body>
    <div>
        <span class="title">Manage Users</span>
        
        <span class="sub_title">Select one of the following functions</span>

        <form method="post" action="manageusers.php">
          
          <button type="button" class="add">
              <h2>Add User Account</h2>
              <input type="submit" name="add" class="btn btn-info" value="Select" />
          </button>
          <button type="button" class="delete">
              <h2>Delete User Account</h2>
              <input type="submit" name="delete" class="btn btn-info" value="Select" />
          </button>
          <button type="button" class="edit">
              <h2>Edit User Account</h2>
              <input type="submit" name="edit" class="btn btn-info" value="Select" />
          </button>
          <br/>
          <br/>
          <div class="form-group" align="center">
          <label>Return to System Operator Tasks Menu</label>
          <input type="submit" name="return" class="btn btn-info" value="Return to System Operator Tasks Menu" />
          </div>
        </form>
    </div>
    
    
</body>
</html>


<?PHP

//Exit
if (isset($_POST['return']))
{
    header("Location: systemoperator.php");
    die();
}

if (isset($_POST['edit']))
{
    header("Location: editaccount.php");
    die();
}

if (isset($_POST['add']))
{
    header("Location: addaccount.php");
    die();
}

if (isset($_POST['delete']))
{
    header("Location: deleteaccount.php");
    die();
}

?>