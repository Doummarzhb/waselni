<?php
if (isset($_SESSION['id'])) {
	header('location:../../index.html');
}
include('../../connection.php');

if (isset($_POST['sb'])) {
	# code...
	session_start();
	$rating = $_POST['rating'];
	$driver = $_GET['driverID'];
	$userID = $_SESSION['id'];
	$opinion = $_POST['opinion'];
	$rate = "INSERT INTO `rating`(`driverID`, `rate` , `userID` , `opinion`) 
	VALUES ('$driver','$rating' , '$userID' , '$opinion')";
	$rateRes = mysqli_query($conn, $rate);
	header('location:../../profile2/profile2.php?userid='.$driver.'');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<title>Rate Driver</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

	<div class="wrapper">
		<h3>Rate for Driver </h3>
		<form action="#" method = post>
			<div class="rating">
				<input type="number" name="rating" hidden>
				<i class='bx bx-star star' style="--i: 0;"></i>
				<i class='bx bx-star star' style="--i: 1;"></i>
				<i class='bx bx-star star' style="--i: 2;"></i>
				<i class='bx bx-star star' style="--i: 3;"></i>
				<i class='bx bx-star star' style="--i: 4;"></i>
			</div>
			<textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
			<div class="btn-group">
				<button type="submit" class="btn submit "name=sb>Submit</button>
				<!-- need php code for return -->
				<a href='../../studentPages/profileStudent.php'><button class="btn cancel">Cancel</button></a>
			</div>
		</form>
	</div>
</body>
<script src="script.js"></script>
</html>