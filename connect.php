<?php 
$host ="localhost";
$username ="root";
$password =""
; $namadatabase ="db_ptr"; #FF8000">// nama databasenya JarHost
$koneksi = mysql_connect($host,$username,$password) or die( "Koneksi Tidak Ada");
mysql_selectdb($namadatabase,$koneksi) or die( "Database Error ");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ptr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 


?>