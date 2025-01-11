<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $query->execute([$title, $content]);

    header("Location: index.php");
    exit;
}
?>

<form action="create_post.php" method="POST">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea>
    <button type="submit">Create Post</button>
</form>
