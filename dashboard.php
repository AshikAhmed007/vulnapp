<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card p-4">
        <h3>Welcome, <span class="text-info"><?php echo $_SESSION["username"]; ?></span>!</h3>
        <div class="mt-3">
            <a href="profile.php" class="btn btn-dark">View Profile</a>
            <a href="upload.php" class="btn btn-primary">Upload Image</a>
            <a href="gallery.php" class="btn btn-success">My Gallery</a>
            <a href="create_post.php" class="btn btn-info">Create Post</a>
            <a href="change_password.php" class="btn btn-warning">Change Password</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>
