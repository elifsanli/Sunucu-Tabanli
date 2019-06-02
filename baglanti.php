<?php
// bu sayfa baglanti.php sayfasıdır.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalOdev";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı Bağlantısında Problem Oluştu: " . $conn->connect_error); //baglanti problemi veya veritabanı seçimi problemi
} 
?>