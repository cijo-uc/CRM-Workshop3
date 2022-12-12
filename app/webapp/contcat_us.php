<?php

$mysqli = new \mysqli("localhost", "root", "Root@root1", "car_deal");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Perform query
// $name = $_POST['name'];
// $emailAddress = $_POST['email'];
// $message = $_POST['message'];
$name = "xys";
$emailAddress = "xys@gmail.com";
$message = "mesagedfj";

// Insert user details to user table
$sql = "INSERT IGNORE INTO user(name, email_address) VALUES($name, $emailAddress)";
$mysqli->query($sql);

// Insert issue details of the user
$sql = "INSERT INTO issue(user_email, message) VALUES($name, $message)";
$mysqli->query($sql);

$mysqli->close();
