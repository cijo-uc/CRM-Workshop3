<?php

$mysqli = new \mysqli("localhost", "root", "Root@root1", "car_deal");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Perform query
// $name = $_POST['name'];
// $phoneNumber = $_POST['phone'];
// $emailAddress = $_POST['email'];
// $carModel = $_POST['car_model'];
// $demoDate = $_POST['demo_date'];
$name = "xys";
$phoneNumber = "123";
$emailAddress = "xys@gmail.com";
$carModel = "123";
$demoDate = "xys@gmail.com";
// Insert user details to user table
$sql = "INSERT IGNORE INTO user(name, phone_number, email_address) VALUES($name, $phoneNumber, $emailAddress)";
$mysqli->query($sql);
// Insert demo details of the user
$sql = "INSERT INTO demo(user_email, car_model, demo_date) VALUES($emailAddress, $carModel, $demoDate)";
$mysqli->query($sql);
$mysqli->close();
