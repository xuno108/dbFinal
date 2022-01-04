<?php
session_start();
$name=$_POST["name"];
$email=$_POST["email"];
$content=$_POST["content"];

$con = new mysqli("localhost", "root", "Tl51189@", "moviedb");

if ($con->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


$wsql = "INSERT INTO feedback (fbName, fbEmail, fbContent) VALUES ('$name', '$email', '$content')";

$con->query($wsql);

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>