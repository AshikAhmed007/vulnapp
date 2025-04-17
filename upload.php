<?php
include("config.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $newName = uniqid("img_") . "." . $ext;
    $target = "uploads/" . $newName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    $username = $_SESSION["username"];
    $user_id = $conn->query("SELECT id FROM users WHERE username='$username'")->fetch_assoc()["id"];
    $conn->query("INSERT INTO images (user_id, filename) VALUES ($user_id, '$newName')");
    echo "<div class='alert alert-success'>Upload successful!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Upload Image</h3>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" class="form-control mb-3" required>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    <a href="gallery.php" class="btn btn-secondary mt-3">Gallery</a>
</body>
</html>
