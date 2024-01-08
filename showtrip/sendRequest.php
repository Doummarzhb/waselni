
    <?php 
    require('../connection.php');
    if (isset($_GET['tripID'])) {
        # code...
        session_start();
        $tripId = $_GET['tripID'];
        $userId = $_SESSION['id'];
        

        
        $getAllRequest = "SELECT * FROM `request` WHERE 1";
        $result = mysqli_query($conn , $getAllRequest);
        
        $error = true;
        while ($row = mysqli_fetch_array($result)) {
            if ($row['tripID'] == "$tripId" && $row['studentID'] == "$userId") {
                $error = false;
            }
        }
        if ($error) {
            
            $newReq = "INSERT INTO `request`( `tripID`, `studentID`)
            VALUES ('$tripId','$userId')";
            $res = mysqli_query($conn, $newReq);
            // header('location:./showtrip.php?req='.$tripId.'');
            echo "<td class = dynamic>request sent</td>";

        }else {
            # code...
            // header('location:./showtrip.php?err='.$tripId.'');
                    echo "<td class = dynamic>request already sended</td>";
        }
    }else {
        header("location:./showtrip.php");
    }


    ?>
