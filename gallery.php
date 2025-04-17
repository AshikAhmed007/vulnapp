<?php
include("config.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION["username"];
$user_id = $conn->query("SELECT id FROM users WHERE username='$username'")->fetch_assoc()["id"];
$images = $conn->query("SELECT * FROM images WHERE user_id=$user_id");

if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    echo "<div class='alert alert-success'>Image deleted successfully!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>My Image Gallery</h3>
    <div class="row">
        <?php while ($img = $images->fetch_assoc()): ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="uploads/<?php echo $img['filename']; ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                    
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</body>
</html>
