<?php
include("config.php");
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION["username"];
$user_id = $conn->query("SELECT id FROM users WHERE username='$username'")->fetch_assoc()["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];

    if (!empty($content)) {
        $conn->query("INSERT INTO posts (user_id, content) VALUES ($user_id, '$content')");
        $success_msg = "Post created successfully!";
    } else {
        $error_msg = "Please enter some content for the post.";
    }
}

// Fetch all posts from the logged-in user
$posts = $conn->query("SELECT * FROM posts WHERE user_id=$user_id ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Create a Post</h3>
    
    <!-- Display success or error message -->
    <?php if (isset($success_msg)): ?>
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    <?php elseif (isset($error_msg)): ?>
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    <?php endif; ?>

    <!-- Post creation form -->
    <form method="POST">
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="4" placeholder="Write something..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

     <br>

    <!-- Display User's Posts -->
   
    <?php if ($posts->num_rows > 0): ?>

         <h4>Your Posts:</h4>
        <div class="list-group">
            <?php while ($post = $posts->fetch_assoc()): ?>
                <div class="list-group-item">
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <small>Posted on: <?php echo date('Y-m-d H:i:s', strtotime($post['created_at'])); ?></small>
                </div>
            <?php endwhile; ?>
        </div>
    
    <?php endif; ?>

    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</body>
</html>
