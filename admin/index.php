
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}

require_once "../include/db_connect.php";
include "header.php";


$products     = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
$categories   = $conn->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$users        = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
$admins       = $conn->query("SELECT COUNT(*) FROM users WHERE roll_id = 1")->fetchColumn();
$comments     = $conn->query("SELECT COUNT(*) FROM comments")->fetchColumn();

$available    = $conn->query("SELECT COUNT(*) FROM products WHERE product_status='available'")->fetchColumn();
$unavailable  = $conn->query("SELECT COUNT(*) FROM products WHERE product_status='unavailable'")->fetchColumn();
?>


<div class="container-fluid py-5">
<style>
    /* Page-specific typography improvements */
    .container-fluid h2 { font-family: 'Cairo', Roboto, sans-serif; font-size: 33px ;}
    .container-fluid p { font-size: 15px; color: #6d7d8b; font-weight: 600;}
    .card .fw-bold { font-size: 20px; }
    .card p.text-muted { font-size: 18px; color: #4c7599; }
    .card .fa-2x { font-size: 1.6rem; }
    canvas { max-height: 300px; }
</style>

<h2 class="fw-bold" data-key="systemOverview">System Overview</h2>

<div class="row g-4">

<?php
$cards = [
    ['products', $products, 'fa-box', 'primary'],
    ['categories', $categories, 'fa-tags', 'warning'],
    ['users', $users, 'fa-users', 'success'],
    ['admins', $admins, 'fa-user-shield', 'info'],
];
foreach ($cards as $c):
?>
<div class="col-md-6 col-lg-3">
<div class="card shadow-sm border-0 h-100">
<div class="card-body d-flex align-items-center">
<i class="fas <?= $c[2] ?> fa-2x text-<?= $c[3] ?> me-3"></i>
<div>
<p class="text-muted mb-0" data-key="<?= $c[0] ?>"><?php echo ucfirst($c[0]); ?></p>
<h4 class="fw-bold"><?= $c[1] ?></h4>
</div>
</div>
</div>
</div>
<?php endforeach; ?>

</div>


<div class="row mt-5">
<div class="col-lg-6">
<div class="card shadow-sm border-0">
<div class="card-body">
<h5 class="fw-bold" data-key="productStatus">Product Status</h5>
<canvas id="productChart"></canvas>
</div>
</div>
</div>

 
<div class="col-lg-6">
<div class="card shadow-sm border-0">
<div class="card-body">
<h5 class="fw-bold" data-key="usersVsComments">Users vs Comments</h5>
<canvas id="userCommentChart"></canvas>
</div>
</div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('productChart'), {
    type: 'doughnut',
    data: {
        labels: ['Available', 'Unavailable'],
        datasets: [{
            data: [<?= $available ?>, <?= $unavailable ?>],
            backgroundColor: ['#0d6efd', '#dc3545']
        }]
    }
});
</script>


<script>
new Chart(document.getElementById('userCommentChart'), {
    type: 'bar',
    data: {
        labels: ['Users', 'Comments'],
        datasets: [{
            data: [<?= $users ?>, <?= $comments ?>],
            backgroundColor: ['#198754', '#ffc107']
        }]
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<?php include_once "footer.php"; ?>
