<?php
session_start();
include("../include/db_connect.php");
include("header.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: comments.php");
    exit;
}

$id = (int)$_GET['id'];

$sql = "
SELECT 
    c.comment,
    c.rating,
    c.created_at,
    u.username,
    u.profile_image,
    p.product_name
FROM comments c
JOIN users u ON c.user_id = u.id
JOIN products p ON c.product_id = p.id
WHERE c.id = ?
LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$comment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$comment) {
    header("Location: comments.php");
    exit;
}
?>

<div class="container py-4">
<div class="card shadow-sm">
<div class="card-body">

<div class="d-flex align-items-center mb-3">
<img src="../uploads/users/<?= htmlspecialchars($comment['profile_image'] ?: 'user.png') ?>"
     width="50" height="50"
     class="rounded-circle me-3"
     style="object-fit:cover;">
<div>
<h6 class="mb-0"><?= htmlspecialchars($comment['username']) ?></h6>
<small class="text-muted"><?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?></small>
</div>
</div>

<p><strong>Product:</strong> <?= htmlspecialchars($comment['product_name']) ?></p>

<?php if ($comment['rating'] !== null): ?>
<p><strong>Rating:</strong> <?= (int)$comment['rating'] ?> ★</p>
<?php endif; ?>

<hr>

<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<a href="comments.php" class="btn btn-secondary mt-3">Back</a>

</div>
</div>
</div>

<?php include("footer.php"); ?>
