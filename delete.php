<?php
	session_start();
	$uId = $_SESSION['uId'];
	$fId = $_GET['fId'];
	// $mChiName = $_GET['mChiName'];
	// $mDate = $_GET['mDate'];
	// $mDir = $_GET['mDir'];
	// $mInfo = $_GET['mInfo'];

	$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");

		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

	// $rsql = "SELECT * FROM favorite WHERE mId = '$mId' AND uID='$uId'";
	// $result = $con->query($rsql);
	// $nowpNum; $in = 0;
	// if($row = $result->fetch_assoc()){
	// 	$nowpNum = $row['pNum'];
	// 	$nowpNum = $nowpNum + 1;
	// 	$in = 1;
	// }
	// if($in)
	// 	$wsql = "UPDATE favorite SET pNum = '$nowpNum' WHERE pName = '$pName' AND cID=$cID ";
	// else
	
	$wsql = "DELETE FROM favorite WHERE fId='$fId'";

	$con->query($wsql);

	header("Location: favorite.php");
?>