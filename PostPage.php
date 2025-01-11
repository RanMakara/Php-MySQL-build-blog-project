<?php
require 'config/database.php';
include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $query->execute([$id]);
    $post = $query->fetch(PDO::FETCH_ASSOC);
}

if (!$post) {
    echo "<p>Post not found.</p>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="container">
    <h1><?= htmlspecialchars($post['title']); ?></h1>
    <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
    <small>Posted on <?= $post['created_at']; ?></small>
</div>

<?php include 'includes/footer.php'; ?>
