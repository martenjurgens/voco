<?php
include 'db_config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);

    $sql = "INSERT INTO users (username) VALUES ('$username')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Registration successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error"));
    }
}

$conn->close();
?>