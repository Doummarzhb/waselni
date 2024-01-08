
<?php
require("../connection.php");
$query = "SELECT * FROM reservetrip WHERE 1";
$res= mysqli_query($conn , $query);
while ($row = mysqli_fetch_array($res)) {
    if (isset($_POST[$row['reservationID']])) {
        unset($_POST);
        header('../index.html');

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- small css file -->
    <link rel="stylesheet" href="./showTripStylee.css">
    <title>Show trip for students :</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4> </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" name="dname"  class="form-control" placeholder="Search Driver Name"  onkeyup="showtrip(this.value)">
                                        <!-- <button type="submit" class="btn btn-primary" name=search >Search</button> -->
                                    </div>
                                    <div class=select >
                                        <label for="loc">Select Location</label>
                                        <select name="loc" id="loc" onchange="filterLocation(this.value)" > 
                                        <?php
                                        $query = 'SELECT * FROM `location` WHERE 1';   
                                        $res= mysqli_query($conn , $query);
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<option value=".$row['locationID'].">".$row['locationName']."</option>";
                                        }
                                        ?>
                                        </select>

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
                        <div id = requestStatus>Available requests</div>
                            <thead> 
                                <tr>
                                    <th>Driver Name</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>available Place</th>
                                </tr>
                            </thead>
                            <tbody id=result>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="../studentPages/profileStudent.php"><button class="btn btn-primary">Return</button></a> 
    </div>

    <script src = "./main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
a.profileLink{
    color:black;
    text-decoration:none;
    
}
    </style>
