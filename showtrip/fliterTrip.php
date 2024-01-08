<?php
include('../connection.php');
$drivername=$_GET['dname'];
session_start();
$id = $_SESSION['id'];
$getAlltrips = "SELECT
    t.tripID,
    t.DriverID,     
    l1.locationName AS fromLocation,
    l2.locationName AS toLocation,
    u.username AS driverName,
    d.day,
    ti.time,
    t.availableNB
FROM
    trip t
JOIN location l1 ON t.fromlocationID = l1.locationID
JOIN location l2 ON t.toLocationID = l2.locationID
JOIN user u ON t.DriverID = u.id
JOIN days d ON t.dayID = d.dayID
JOIN time ti ON t.time = ti.timeId
WHERE
    t.availableNB > 0
    AND u.username LIKE '$drivername%'
    AND NOT EXISTS (
        SELECT 1
        FROM reservetrip rt
        WHERE rt.tripID = t.tripID AND rt.studentID = $id
    )

";

$getTripResult = mysqli_query($conn , $getAlltrips);
        if (mysqli_affected_rows($conn) == 0) {
            echo "No trip Found";
        }
        while ($row = mysqli_fetch_array($getTripResult)) {
        echo "<tr>";
        echo "<td><a href=../profile2/profile2.php?userid=".$row['DriverID']." class=profileLink>".$row['driverName']."</a></td>";
        echo "<td>".$row['fromLocation']."</td>";
        echo "<td>".$row['toLocation']."</td>";
        echo "<td>".$row['day']."</td>";
        echo "<td>".$row['time']."</td>";
        echo "<td>".$row['availableNB']."</td>";
        echo "<td class = link><button class=but onclick=sendRequest(".$row['tripID'].")>send request</button></td>";

        
        if (isset($_GET['err'])) {
            if ($_GET['err'] == $row['tripID'] ) {
                # code...
                echo "<td class = dynamic>request already sended</td>";
            }else {
                # code...
                echo "<td class = dynamic></td>";
            }
        }
        if (isset($_GET['req'])) {
            if ($_GET['req'] == $row['tripID'] ) {
                # code...
                echo "<td class = dynamic>request sent</td>";
            }else {
                # code...
                
            }
        }
        if (isset($_GET['full'])) {
            if ($_GET['full'] == $row['full'] ) {
                # code...
                echo "<td class = dynamic>this trip are full</td>";
            }else {
                # code...
                
            }
        }
        echo "</tr>";
        
    }
?>