<?php
include 'db_config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);

    $checkSql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkSql);
    
     if ($result->num_rows > 0) {
        session_start();

        $_SESSION["username"] = $username;

        echo json_encode(array("status" => "success", "message" => "Login successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "User not found"));
    }
}

$conn->close();
?>
