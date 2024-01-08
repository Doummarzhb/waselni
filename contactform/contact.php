
<?php
include('../connection.php');
session_start();
if (isset($_SESSION['id'])) {
    # code...
    if (isset($_POST['sb'])) {
        # code...
    $userId = $_SESSION['id'];
    $message = $_POST['msg'];

    $sendMessage = "INSERT INTO `contact`( `userID`, `message`) 
                    VALUES ($userId,'$message')";
    $sendMessageRes = mysqli_query($conn , $sendMessage);
    }
}else {
    header('location:../index.html');
}

?>
 
 <!DOCTYPE html>
<htMl>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Contact Form </title>
        <link rel="stylesheet" href="contactStyle.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon>family=Material+Icons">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all/min/css"/>

    </head>
    <body>
        <div class="wrapper">
            <header> Send us a Message</header>
            <form action="#" method=POST> 
                 <div class="dbl-field">
                    <div class="field">
                        <input type="text"  name= "name"placeholder="Enter your name">
                        <i class="fas fa-user"></i>
                    </div> 
                    <!-- <div class="field">
                        <input type="text"  name ="email"placeholder="Enter your email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    </div>
                    <div class="dbl-field">
                    <div class="field">
                        <input type="text"  name="phone"placeholder="Enter your phone">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                 
                    <div class="field">
                        <input type="text" name ="location" placeholder="Enter location">
                        <i class="fas fa-globe"></i>
                    </div>
                </div> -->
</div>
                <div class="message">
                    <textarea placeholder="write your message" name = msg></textarea>
                    <i class="material-icons"></i>
                </div> 
                <div class="button-area">
                    <button type="submit" name = sb>Send Message</button>
                     <span> </span> <span></span>
                    
                    <?php
                        if ($_SESSION['role']=="driver") {
                            # code...
                            echo "<a href='../driverPages/profileDriver.php' class=ret>Return</a>";
                        }else {
                            # code...
                            echo "<a href='../studentPages/profileStudent.php' class=ret>Return</a>";
                        }
                    ?>
                    
                 </div>
            </form>
            </div>
            <script src="script.js"></script> 
    </body>
</htMl>