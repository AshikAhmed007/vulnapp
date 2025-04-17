<?php
include("config.php");
session_start();

if (!isset($_SESSION["username.com"])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION["username"];
$user_id = $conn->query("SELECT id FROM users WHERE username='$username'")->fetch_assoc()["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Validate current password
    $result = $conn->query("SELECT password FROM users WHERE id=$user_id");
    $user = $result->fetch_assoc();
    if (password_verify($current_password, $user['password'])) {
        // Update password in DB
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET password='$hashed_new_password' WHERE id=$user_id");

        echo "<div class='alert alert-success'>Password updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Incorrect current password.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Change Password</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</body>
</html>
