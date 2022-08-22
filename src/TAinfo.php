<!doctype html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <style type="text/css">
       .log_out
    {
        position: absolute;
        width: 100px;
        height: 50px;
        left: 90%;
        top: 85%;

        background: #4B72C2;
        border: 2px solid #25A9F3;
        box-sizing: border-box;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
    }

    </style>

</head>
<body>
    <h1 style="text-align:center;">TA info &History</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Input the TA's name </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Term_Month_Year</th>
                                    <th>Name</th>
                                    <th>student ID</th>
                                    <th>Email</th>
                                    <th>Grad or Ugrad</th>
                                    <th>Supervisor</th>
                                    <th>Priority</th>
                                    <th>Hours</th>
                                    <th>Date applied</th>
                                    <th>Location</th>
                                    <th>phone</th>
                                    <th>Degree</th>
                                    <th>Course Applied for </th>
                                    <th>Open to other course</th>
                                    <th>Note</th>
                                    <th>students rating avergae</th>
                                    <th>students rating commnets</th>
                                    <th>Professor Performance Log</th>
                                    <th>Prof Wish List  Membership</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($_GET['search'])){

                                    $search = $_GET['search'];
                                
                                }else{
                                
                                    $search = "";
                                
                                }
                                    
                                    if (($fp = fopen("TACohort.csv", "r")) !== false) {
                                        while (($row = fgetcsv($fp)) !== false) {
                                            if($row[1] === $search) {
                                                ?>
                                                <tr>
                                                    <td><?= $row[0] ?></td>
                                                    <td><?= $row[1] ?></td>
                                                    <td><?= $row[2] ?></td>
                                                    <td><?= $row[3] ?></td>
                                                    <td><?= $row[4]?></td>
                                                    <td><?= $row[5] ?></td>
                                                    <td><?= $row[6] ?></td>
                                                    <td><?= $row[7] ?></td>
                                                    <td><?= $row[8]?></td>
                                                    <td><?= $row[9] ?></td>
                                                    <td><?= $row[10] ?></td>
                                                    <td><?= $row[11] ?></td>
                                                    <td><?= $row[12] ?></td>
                                                    <td><?= $row[13] ?></td>
                                                    <td><?= $row[14] ?></td>
                                                    <td><?= $row[15] ?></td>
                                                    <td><?= $row[16] ?></td>
                                                    <td><?= $row[17] ?></td>
                                                    <td><?= $row[18] ?></td>
                                                </tr>
                                                <?php
                                               
                                            }
                                        }
                                        fclose($fp);
                                    }
                                    
                                   
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button type = "button" class="log_out" onclick="jump()">
            Return to Dashboard
        </button>
    </div>
    <script>
        function jump(){
            window.location.replace("TAadmin.html")
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
