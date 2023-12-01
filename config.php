<?php
$servername = "localhost:4306"; //harus merubah pot di config xampp mysql nya
$username = "root";
$dbname = "expo_db";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Gagal". mysqli_connect_error());
}
?>