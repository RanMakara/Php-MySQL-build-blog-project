<?php
require 'config/database.php';
include 'includes/header.php';

$query = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1>Welcome to My Blog</h1>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><a href="post.php?id=<?= $post['id']; ?>"><?= htmlspecialchars($post['title']); ?></a></h2>
            <p><?= substr(htmlspecialchars($post['content']), 0, 150); ?>...</p>
            <small>Posted on <?= $post['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
