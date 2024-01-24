<?php
include 'db_config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("INSERT INTO users (username) VALUES (?)");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Registration successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error"));
    }

    $stmt->close();
}

$conn->close();
?>
