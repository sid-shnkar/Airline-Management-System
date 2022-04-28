<?php

// ** NOTE: This is the Database file for our project. It will be executed automatically
// once we run index.php 

$connect = new mysqli("localhost","root","");

if (!$connect) 
{ 
  //if connection fails to establish

  die("Connection failed: " . mysqli_connect_error());
}



$sql = "CREATE DATABASE IF NOT EXISTS airline_system";

if (!mysqli_query($connect, $sql)) 
{
  echo "Error creating database: " . mysqli_error($connect);
}

//taking contact number be varchar because later it will be helpful when checking input
// Assuming no 0 is added before a contact number

$sql = "CREATE TABLE IF NOT EXISTS airline_system.admin_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    admin_id VARCHAR(50) NOT NULL UNIQUE ,
    password VARCHAR(255) NOT NULL,
    admin_name VARCHAR(50)  NULL ,
    email_id VARCHAR(50)  NULL,
    contact_no VARCHAR(12)  NULL

    )";

if (!mysqli_query($connect, $sql)) 
{
  echo "Error creating table: " . mysqli_error($connect);
}  

//Username and Password for admin is 'admin' and 'admin' respectively

$password="admin";
$hashed_paswd= password_hash($password, PASSWORD_DEFAULT);


$sql="INSERT INTO airline_system.admin_info (admin_id,password,admin_name,email_id,contact_no) 
    SELECT * FROM (SELECT 'admin', '$hashed_paswd','testadmin','admin@test.com','1234567891') AS tmp
    WHERE NOT EXISTS (SELECT admin_id FROM airline_system.admin_info WHERE admin_id ='admin') LIMIT 1 ";

if (!mysqli_query($connect, $sql)) 
{
    echo "Error inserting data: " . mysqli_error($connect);
}

// passport no. is generally alpha-numeric , keeping it to be max 8 characters

$sql="CREATE TABLE IF NOT EXISTS airline_system.passenger_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    passenger_id VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    pass_name VARCHAR(50) NOT NULL,
    email_id VARCHAR(50) NOT NULL,
    passport_no VARCHAR(8) NOT NULL
    )";

if (!mysqli_query($connect, $sql)) 
{
  echo "Error creating table: " . mysqli_error($connect);
}


// You need to signup as new passenger because no passenger record is inserted by 
// the database automatically.


//MODIFIED to add passeger_id field

$sql="CREATE TABLE IF NOT EXISTS airline_system.booked_flights (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    flight_no INT(12) NOT NULL,
    airline VARCHAR(50) NOT NULL,
    passenger_id VARCHAR(50) NOT NULL ,
    pass_name VARCHAR(50) NOT NULL,
    passport_no VARCHAR(8) NOT NULL,
    fare_paid INT(12) NOT NULL,
    passenger_count INT(12) NOT NULL,
    reservation_status VARCHAR(50) NOT NULL
    )";


if (!mysqli_query($connect, $sql)) 
{
  echo "Error creating table: " . mysqli_error($connect);
}

 
 
  $sql="CREATE TABLE IF NOT EXISTS airline_system.flights (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type_of_flight VARCHAR(50) NOT NULL,
    flight_no INT(12) NOT NULL UNIQUE,
    airline VARCHAR(50) NOT NULL,
    source VARCHAR(50) NOT NULL,
    destination VARCHAR(50) NOT NULL,
    intermediate_stops VARCHAR(50) NOT NULL,
    date_of_journey DATE NOT NULL,
    departure_time TIME NOT NULL,
    arrival_time TIME NOT NULL,
    type_of_class VARCHAR(50) NOT NULL,
    meal VARCHAR(50) NOT NULL,
    amount INT(12) NOT NULL,
    discount INT(12) NOT NULL,
    flight_status VARCHAR(50) NOT NULL
    )";

 
if (!mysqli_query($connect, $sql)) 
{
  echo "Error creating table: " . mysqli_error($connect);
}

// Flight needs to be added by admin as no flight is already inserted by the database.

    //mysqli_close($connect);
?>