<?php
include 'db_config.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();

        $_SESSION["username"] = $username;

        echo json_encode(array("status" => "success", "message" => "Login successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "User not found"));
    }

    $stmt->close();
}

$conn->close();
?>
