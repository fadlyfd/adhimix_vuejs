<?php
$host = "localhost";
$dbname = "adhimix_vuejs";
$user = "postgres";
$password = ""; // Ganti sesuai setup Anda

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

