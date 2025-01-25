<!-- <?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "your_secret_key";

$headers = getallheaders();
$token = $headers['Authorization'] ?? '';

try {
    $decoded = JWT::decode($token, $key, ['HS256']);
    echo json_encode(["status" => "success", "data" => $decoded]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?> -->
