<?php 
include('../connection.php');
session_start();
$id = $_SESSION['id'];
 
?>
<?php
    //get nb of request 
    
    $query = "SELECT
            r.requestID,
            r.tripID,
            t.fromlocationID,
            l1.locationName AS fromLocation,
            t.toLocationID,
            l2.locationName AS toLocation,
            tid.time,
            d.day,
            t.availableNB,
            u.username AS driverName,
            r.studentID,
            u2.username AS studentName,
            r.answer
        FROM
            request r
        JOIN trip t ON r.tripID = t.tripID
        JOIN location l1 ON t.fromlocationID = l1.locationID
        JOIN location l2 ON t.toLocationID = l2.locationID
        JOIN days d ON t.dayID = d.dayID
        JOIN user u ON t.DriverID = u.id
        JOIN user u2 ON r.studentID = u2.id
        JOIN time tid ON t.time = tid.timeID
        WHERE u.id = $id";

        $res = mysqli_query($conn, $query);
        $nb = mysqli_num_rows($res);
        $filePath = __FILE__;
        
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel= " stylesheet "href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
 
  <body>
        <div class="page">
        <nav class="navbar">
            <a href="../index.php"><h1 class="logo">W'aselni</h1></a>
            <ul class="nav-links">
                 <a href="../index.php" class="tripR">Home</a></li>
                <a href="./triprequest/triprequest.php " class="tripR" >Trip Request <?php echo "($nb)"; ?></a>
                <a href="./showRating/tablerating.php" class=tripR>Your Rates</a>
                 <a href="../contactform/contact.php?" class="tripR">Contact-US</a></li>
            </ul>
        </nav>
        <!-- <P class="img"><img src="dada.jpg"></p> -->
        <div class="container">
            <?php
                include("./home.php");
            ?>
            
            <div class="table">
                <!-- <div class="links">
                <a href="./triprequest/triprequest.php " class="tripR" >Trip Request <?php echo "($nb)"; ?></a>
                <a href="./showRating/tablerating.php" class=tripR>Your Rates</a>
                </div> -->
    <main class="table">
        <section class="table__header">
            <h1>Your Trips</h1>
            <h4><?php
                if (isset($_GET["msg"])) {
                    # code...
                    echo $_GET["msg"];
                }else {
                    echo "";
                }
            ?></h4>
            <a href="./createtrip/formtrip.php" class='newtrip'>create a trip</a>
            <!-- <a href="#"  class="trip">Your Trips</a> -->

        </section>
    
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> From </th>
                        <th> To </th>
                        <th> Schedule </th>
                        <th> available space </th>
                        <th> Show Students</th>
                        <th> Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Available // Full -->
                    <tr>
                        <?php
                        include('../connection.php');
                        $query = "SELECT 
                            user.id AS userID,
                            user.username,
                            trip.tripID,
                            trip.fromlocationID,
                            from_location.locationName AS fromLocationName,
                            trip.toLocationID,
                            to_location.locationName AS toLocationName,
                            time.time AS tripTime,
                            days.day AS tripDay,
                            trip.availableNB
                        FROM trip
                        INNER JOIN user ON user.id = trip.DriverID
                        INNER JOIN location AS from_location ON from_location.locationID = trip.fromlocationID
                        INNER JOIN location AS to_location ON to_location.locationID = trip.toLocationID
                        INNER JOIN time ON time.timeId = trip.time
                        INNER JOIN days ON days.dayID = trip.dayID
                        WHERE trip.DriverID = $id";
                        
                        $res = mysqli_query($conn , $query);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>".$row['fromLocationName']."</td>";
                            echo "<td>".$row['toLocationName']."</td>";  
                            echo "<td>".$row['tripDay']." ".$row['tripTime']."</td>";  
                            echo "<td>".$row['availableNB'] ."</td>";
                            echo "<td><a href='tripStudents.php?trip=".$row['tripID']."'><i class='fa fa-users' aria-hidden='true'></a></td>";
                            echo "<td><a href='deleteTrip.php?tripID=".$row['tripID']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                        
                        
                </tbody>
        </table>
    </section>
</main>
</div>
    </body>
    
                   
</html>



