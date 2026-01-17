<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include("../include/db_connect.php");
include("header.php");

/* جلب التعليقات مع المستخدم والمنتج */
$sql = "
SELECT 
    c.id,
    c.comment,
    c.rating,
    c.created_at,
    u.username,
    u.profile_image,
    p.product_name
FROM comments c
JOIN users u ON c.user_id = u.id
JOIN products p ON c.product_id = p.id
ORDER BY c.created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container py-4">

<div class="card shadow-sm">
<div class="card-body p-0">

<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
    <th>User</th>
    <th>Comment</th>
    <th>Product</th>
    <th>Rating</th>
    <th>Date</th>
    <th class="text-end">Actions</th>
</tr>
</thead>

<tbody>

<?php if (count($comments) > 0): ?>
<?php foreach ($comments as $row): ?>

<tr>
<td>
    <img src="../uploads/users/<?= htmlspecialchars($row['profile_image'] ?: 'user.png') ?>"
         width="40" height="40"
         class="rounded-circle me-2"
         style="object-fit:cover;">
    <?= htmlspecialchars($row['username']) ?>
</td>

<td>
    <?= htmlspecialchars(mb_strimwidth($row['comment'], 0, 40, '...')) ?>
</td>

<td>
    <?= htmlspecialchars($row['product_name']) ?>
</td>

<td>
<?php if ($row['rating'] !== null): ?>
    <span class="badge bg-primary"><?= (int)$row['rating'] ?> ★</span>
<?php else: ?>
    <span class="badge bg-secondary">No Rating</span>
<?php endif; ?>
</td>

<td>
    <?= date('Y-m-d', strtotime($row['created_at'])) ?>
</td>

<td class="text-end">
    <a href="viewComment.php?id=<?= (int)$row['id'] ?>"
       class="btn btn-sm btn-outline-primary">
       View
    </a>

    <a href="deleteComment.php?id=<?= (int)$row['id'] ?>"
       class="btn btn-sm btn-outline-danger"
       onclick="return confirm('هل أنت متأكد من حذف التعليق؟');">
       Delete
    </a>
</td>
</tr>

<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="6" class="text-center py-4 text-muted">
        لا توجد تعليقات
    </td>
</tr>
<?php endif; ?>

</tbody>
</table>

</div>
</div>

</div>

<?php include_once("footer.php"); ?>
