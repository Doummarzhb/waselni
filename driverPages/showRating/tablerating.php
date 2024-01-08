<?php
include('../../connection.php');

session_start();
$driverID = $_SESSION['id'];


$getRates = "SELECT
            r.ratingID,
            r.rate,
            r.opinion,
            u.id AS user_id,
            u.username ,
            u.image
        FROM
            rating r
        JOIN
            user u ON r.userID = u.id
        WHERE
            r.driverID = $driverID";

          $getRatesRes = mysqli_query($conn,$getRates);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table </title>
    <link rel="stylesheet" href="./tablerating.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="table_responsive">
        <table>
          <thead>
            <tr>
              
              <th></th>
              <th>Student</th>
              <th>Comment</th>
              <th>Rate</th>
              
            </tr>
          </thead>
          <tbody>
            
          <?php
          
          while ($row = mysqli_fetch_array($getRatesRes)) {
            $rate = $row["rate"];
            echo "<tr>";           
            echo "<td><div class=doubleInfo><img src='../../studentPages/withprofile/uploaded_img/".$row['image']."' > 
                </td><td><span>".$row['username']."</span></div></td>";
            echo "<td>".$row['opinion']."</td>";

          
            echo "<td><div class='rating'>
				<input type='number' name='rating' hidden>";
        $rest = 5 - $rate; 
          for ($i=0; $i <$rate ; $i++) { 
            # code...
            echo "<i class='bx bxs-star star' style='--i: 0;'></i>";
          }
          for ($i=0; $i < $rest; $i++) { 
            # code...
            echo " <i class='bx bx-star star' style='--i: 0;'></i>";
          }
        
				// <i class='bx bx-star star' style='--i: 0;'></i>
				// <i class='bx bx-star star' style='--i: 1;'></i>
				// <i class='bx bx-star star' style='--i: 2;'></i>
				// <i class='bx bx-star star' style='--i: 3;'></i>
				// <i class='bx bx-star star' style='--i: 4;'></i>
			echo "</div></td>";
            // echo "<td >".$row['rate']."</td>";
            echo "</tr>";           
          }

          ?>
          



                <!-- < class="action_btn">
                  <a href="#">Edit</a>
                  <a href="#">Remove</a> -->

          </tbody>
        </table>
        <a href="../profileDriver.php" class="ret">Return</a>
      </div>
    </div>



</body>
 
</html>