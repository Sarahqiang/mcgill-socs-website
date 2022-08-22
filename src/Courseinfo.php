<!-- <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style type="text/css">
       .log_out
    {
        position: absolute;
        width: 100px;
        height: 50px;
        left: 90%;
        top: 90%;

        background: #4B72C2;
        border: 2px solid #25A9F3;
        box-sizing: border-box;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
    }

    </style>

</head>
<body>
    <h1 style="text-align:center;">Course TA History</h1>
    <h2 style="text-align:center;">Below is a report of all the information of TA and courses</h2>
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
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>TA name</th>
                                    <th>Student ID</th>
                                    <th>Course assigned this term</th>
                                    
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_GET['search'])){

                                        $search = $_GET['search'];
                                    
                                    }else{
                                    
                                        $search = "";
                                    
                                    }
                                    if (($fp = fopen("courseta.csv", "r")) !== false) {
                                        while (($row = fgetcsv($fp)) !== false) {
                                            if($row[2] === $search) {
                                                ?>
                                                <tr>
                                                    <td><?= $row[2] ?></td>
                                                    <td><?= $row[3] ?></td>
                                                    <td><?= $row[1] ?></td>
                                                   
                                                   
                                                </tr>
                                                <?php
                                               
                                            }else
                                            {
                                                
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Input the Course number </h4>
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
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>TA Name</th>
                                    <th>Student ID</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   $search = $_GET['search'];
                                    if (($fp = fopen("courseta.csv", "r")) !== false) {
                                        while (($row = fgetcsv($fp)) !== false) {
                                            if(strpos($row[1],$search) !== false){
                                                ?>
                                                <tr>
                                                    <td><?= $row[2] ?></td>
                                                    <td><?= $row[3] ?></td>
                                                   
                                                   
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function jump(){
            window.location.replace("TAadmin.html")
        }
    </script>
</body>
</html> 
