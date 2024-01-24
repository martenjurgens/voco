<?php
session_start();


if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
     <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    <div class="dashboard"> 
        <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
        <p>This is your dashboard.</p>
        
        <form action="logout.php" method="post">
            <button type="submit" class="btn">Logout</button>
        </form>
    </div>
</div>
</body>

</html>
