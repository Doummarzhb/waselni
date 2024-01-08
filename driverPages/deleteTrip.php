<?php
include('../connection.php');

// Check if tripID is provided in the query parameters
if (isset($_GET['tripID'])) {
    $tripID = $_GET['tripID'];
    

     $sql = "SELECT * FROM `request` WHERE `tripID` =$tripID";
    $getReq = mysqli_query($conn, $sql);    

    $checkReservation = "SELECT * FROM `reservetrip` WHERE `tripID` =' $tripID'";
    $res = mysqli_query($conn, $checkReservation);
    if ( mysqli_num_rows($getReq) > 0) {
        # code...
        header("location:./profileDriver.php?msg=Can 't delete this trip ,You have a trip request");
    }else if (mysqli_num_rows($res) > 0) {
        # code...
        header("location:./profileDriver.php?msg=Can't delete this trip because their a students already reseverd");    
    }else{

    // Perform the deletion
    $deleteReservation = "DELETE FROM `reservetrip` WHERE `tripID` = $tripID";
    $res = mysqli_query($conn, $deleteReservation);
    

    $deleteTrip = "DELETE FROM trip WHERE tripID = $tripID";
    $result = mysqli_query($conn, $deleteTrip);


    if ($result) {
        // Deletion successful, you can redirect to another page or display a success message
        header('location:./profileDriver.php');
        exit();
    } else {
        // Handle deletion failure
        echo "Error deleting trip: " . mysqli_error($conn);
    }



    }

} else {
    // Handle missing tripID
    header('location:./profileDriver.php');
}
?>
