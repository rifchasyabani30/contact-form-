<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "tugas2"; 

// koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>