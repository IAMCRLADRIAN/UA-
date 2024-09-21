<?php
$host = 'localhost';
$user = 'admin';
$password = '123'; 
$db_name = 'clinic_db';

//connection for database
$conn = new mysqli($host, $user, $password, $db_name);

//connection error 
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}