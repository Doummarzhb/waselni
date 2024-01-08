<?php
// if (isset($_GET['trip'])) {
//     include("../connection.php");
//     $trip = $_GET['trip'];

//     $getStudent = "SELECT
//     u.username
// FROM
//     reservetrip rt
// JOIN
//     trip t ON rt.tripID = t.tripId
// JOIN
//     user u ON rt.studentID = u.id
// WHERE
//     t.tripId = $trip
//     ";

//     $getStudentTrip = mysqli_query($conn , $getStudent );

//     while ($row = mysqli_fetch_array($getStudentTrip)) {
//         echo "student : ".$row['username']." <br>";
//     }
// }

?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>thank you || DMZ</title>

    <!-- CSS -->

    <link rel="stylesheet" href="thankyous.css" />
    <link rel="stylesheet" href="tripStds.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
  </head>
  <body>
    <h1>Show Students:</h1>
    <section>
      <button class="show-modal"><i class='fa fa-users' aria-hidden='true'></i></button>
      <span class="overlay"></span>
    
      <div class="modal-box">
        <!-- <i class="fa-regular fa-circle-check"></i> -->
        <h2>Students</h2>
        <?php
    if (isset($_GET['trip'])) {
        include("../connection.php");
        $trip = $_GET['trip'];

        $getStudent = "SELECT
        u.username
    FROM
        reservetrip rt
    JOIN
        trip t ON rt.tripID = t.tripId
    JOIN
        user u ON rt.studentID = u.id
    WHERE
        t.tripId = $trip
        ";

        $getStudentTrip = mysqli_query($conn, $getStudent);

        while ($row = mysqli_fetch_array($getStudentTrip)) {
            echo "student : " . $row['username'] . " <br>";
        }
    }
    ?>

        <div class="buttons">
          <button class="close-btn"><a href="profileDriver.php">Return</a></button>
        </div>
      </div>
    </section>
    <script>
      const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".show-modal"),
        closeBtn = document.querySelector(".close-btn");

      showBtn.addEventListener("click", () => 
        section.classList.add("active"));

      overlay.addEventListener("click", () =>
        section.classList.remove("active")
      );

    //   closeBtn.addEventListener("click", () =>
    //     section.classList.remove("active")
    //   );
       
    </script>
  </body>
</html>
<style>
   
    a {
        text-decoration:none;
        color:white;
    }
    h1{
        text-align:center;
        color:white;
    }
    </style>