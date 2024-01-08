<?php
include('../connection.php');

if (isset($_GET['userid'])) {

    session_start();    
    $userId = $_GET["userid"];
    $getUserInfo = "SELECT user.*
    FROM user 
    WHERE id = $userId";
    $getUserInfoRes= mysqli_query($conn , $getUserInfo);
    
    $row = mysqli_fetch_array($getUserInfoRes);
    
    if (isset($row["image"])) {
        # code...
        if ( $row["role"] == "driver" ) {
        # code...
        $image = '../driverPages/withprofile/uploaded_img/'.$row['image'];
        }else {
        # code...
        $image = "../studentPages/withprofile/uploaded_img/".$row['image'];
    }
    }else {
        $image = "../studentPages/withprofile/images/default-avatar.png";
    }
    
}else {
    header('location:../index.html');
}


?>




<!DOCTYPE HTML>
<html>
    <head>
    
        <title><?php echo "".$row['username']." profile"; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/path/to/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href=" userProfile.css">

    </head>
    
    
    <body>
        <div class="center">
            <div class="bio_card">
                <div class="left">
                    <div class="btn">
                        <i class="fas fa-plus"></i>
                    </div>
                    
                        <img class="cover" src="Aixen.jpg ">
                            <div class="box">
                                <?php
            
            // echo $image;
            echo '<img src="'.$image.'" class=profile>';
            
                                ?>
                            
                            </div>
                        <h1><?php echo $row['username']?></h1>
                        <div class="info">
                            <div class="col">
                            <i class="fab fa-twitter"></i>
                            
                            </div>
                            <div class="col">
                            <i class="fab fa-facebook"></i>
                            </div>
                            <div class="col">
                            <i class="fas fa-heart"></i>
                            </div>
                            
                        </div>
                    </div>
                <div class="right">
                    <div class="text">
                    <div class=sec1>
                        <h1>Profile-page</h1>
                        <h2> <?php echo "".$row['role']." "; ?></h2>
                    </div>
                    <div class=sec1>
                    <h3>BIO:</h3>
                    <?php
                        if (!isset($row['Description'])) {
                            echo "description";
                        }else {
                            echo $row['Description'];
                        }
                    ?>
                    </div>
                        <div class=sec1>
                            <h3 id = loc>Location : </h3>
                            <p><?php if (!isset($row['locationID'])) {
                                            echo "location";
                                    }else {
                                        echo $row['locationID'];
                                    }?> </p>
                                <?php
                                if ($row['role'] === "driver") {
                                    echo '<a href="../driverPages/rating/rating.php?driverID='.$row['id'].'"><button class = rateButton >Rate Driver</button></a>';
                                }
                            ?>  
                        </div>
                    </div>
                
                </div> 
            </div>
            
        </div>
        
    <script>
        
        $(document).ready(function(){
            
            $(".btn").on("click",function(){
               //$(".right").toggle("slide"); 
                
                if($(".right").css("width") == "0px"){
                    $(".right").animate({  width: "500px" },400);
                $(".btn i").removeClass();
                $(".btn i").addClass("fas fa-minus");
                }else{
                    $(".right").animate({  width: "0px" },400);
                $(".btn i").removeClass();
                $(".btn i").addClass("fas fa-plus");
                }
                
               // $(".right").hide("slide", { direction: "left" }, 1000);
                //$(".right").show("slide", { direction: "left" }, 400);
              // $(".btn").css({ 'transform' : 'rotate(180deg)' });
            });
        });
        
        
    </script>
    </body>
</html>