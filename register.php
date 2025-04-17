<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $password = $_POST["password"]; // No hashing for now – intentionally vulnerable

    $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    echo "<b class='text-success'>Registration successful! <a href='index.php' class='text-success' >Login</a></b>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</body>
</html>
