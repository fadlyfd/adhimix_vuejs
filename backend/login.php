<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

include 'db.php';

$data = json_decode(file_get_contents("php://input"));

// $email = $data->email;
// $password = $data->password;


$data = json_decode(file_get_contents("php://input"));
if (!$data) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON data"]);
    exit;
}

$email = $data->email;
$password = $data->password;


// JWT Secret Key
$key = "3cr3t_k3y_f0r_jwt";

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Generate JWT
        $payload = [
            "iss" => "http://localhost",
            "aud" => "http://localhost",
            "iat" => time(),
            "exp" => time() + 3600,
            "name" => $user['name'],
            "email" => $user['email']
        ];
         $jwt = JWT::encode($payload, $key);


        echo json_encode(["status" => "success", "token" => $jwt]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
