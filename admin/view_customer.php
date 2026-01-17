<?php
session_start();
require_once("../include/db_connect.php");
include("header.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: customers.php");
    exit();
}

$id = (int)$_GET['id'];

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "<div class='alert alert-danger m-4'>العميل غير موجود!</div>";
        include("footer.php");
        exit();
    }
} catch (PDOException $e) {
    die("خطأ في جلب البيانات: " . $e->getMessage());
}
?>

<div class="dashboard-container p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 data-key="customerDetails">تفاصيل العميل</h4>
            <a href="customers.php" class="btn btn-outline-secondary"><span data-key="back">العودة</span></a>
        </div>

        <div class="row">
            <!-- Customer Profile Info -->
            <div class="col-md-4 mb-4">
                <div class="profile-card shadow-sm p-4 bg-white rounded">
                    <div class="profile-header text-center mb-4">
                        <?php 
                            $img = !empty($user['profile_image']) ? $user['profile_image'] : 'https://via.placeholder.com/120';
                        ?>
                        <img src="../uploads/users/<?php echo htmlspecialchars($img); ?>" class="profile-avatar rounded-circle mb-3" alt="User" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #f8f9fa;">
                        <h5 class="mb-1"><?php echo htmlspecialchars($user['fullname']); ?></h5>
                        <?php if ($user['status'] == 1): ?>
                            <span class="badge bg-success-subtle text-success px-3" data-key="statusActive">نشط</span>
                        <?php else: ?>
                            <span class="badge bg-danger-subtle text-danger px-3" data-key="statusBlocked">محظور</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="info-group mb-3">
                        <div class="info-label text-muted small" data-key="userName">اسم المستخدم</div>
                        <div class="info-value fw-bold"><?php echo htmlspecialchars($user['username']); ?></div>
                    </div>

                    <div class="info-group mb-3">
                        <div class="info-label text-muted small" data-key="colEmail">البريد الإلكتروني</div>
                        <div class="info-value fw-bold"><?php echo htmlspecialchars($user['email']); ?></div>
                    </div>

                    <div class="info-group mb-3">
                        <div class="info-label text-muted small" data-key="country">الدولة</div>
                        <div class="info-value fw-bold"><?php echo htmlspecialchars($user['country'] ?: 'غير محدد'); ?></div>
                    </div>

                    <div class="info-group mb-3">
                        <div class="info-label text-muted small" data-key="joinDate">تاريخ الانضمام</div>
                        <div class="info-value fw-bold"><?php echo date('Y-m-d', strtotime($user['created_at'])); ?></div>
                    </div>

                    <div class="mt-4">
                        <a href="manage_customer.php?id=<?php echo $user['id']; ?>" class="btn btn-primary w-100 mb-2" data-key="edit">تعديل البيانات</a>
                        <a href="change_status.php?id=<?php echo $user['id']; ?>&status=<?php echo $user['status'] == 1 ? 0 : 1; ?>" 
                           class="btn <?php echo $user['status'] == 1 ? 'btn-outline-danger' : 'btn-outline-success'; ?> w-100">
                            <span data-key="<?php echo $user['status'] == 1 ? 'block' : 'unblock'; ?>">
                                <?php echo $user['status'] == 1 ? 'حظر العميل' : 'تفعيل العميل'; ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order History (Placeholder for now) -->
            <div class="col-md-8">
                <div class="order-history-card shadow-sm p-4 bg-white rounded">
                    <h5 class="mb-4" data-key="orderHistory">سجل الطلبات</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th data-key="orderId">رقم الطلب</th>
                                    <th data-key="date">التاريخ</th>
                                    <th data-key="amount">المبلغ</th>
                                    <th data-key="status">الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-5521</td>
                                    <td>2026-01-02</td>
                                    <td>$250.00</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                </tr>
                                <tr>
                                    <td>#ORD-4410</td>
                                    <td>2025-12-20</td>
                                    <td>$120.00</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script>
    const viewCustomerTranslations = {
        ar: { 
            customerDetails: 'تفاصيل العميل', 
            back: 'العودة', 
            userName: 'اسم المستخدم',
            colEmail: 'البريد الإلكتروني', 
            country: 'الدولة', 
            joinDate: 'تاريخ الانضمام',
            edit: 'تعديل البيانات', 
            block: 'حظر العميل', 
            unblock: 'تفعيل العميل',
            orderHistory: 'سجل الطلبات', 
            orderId: 'رقم الطلب', 
            date: 'التاريخ', 
            amount: 'المبلغ', 
            status: 'الحالة', 
            statusActive: 'نشط',
            statusBlocked: 'محظور'
        },
        en: { 
            customerDetails: 'Customer Details', 
            back: 'Back', 
            userName: 'Username',
            colEmail: 'Email', 
            country: 'Country', 
            joinDate: 'Join Date',
            edit: 'Edit Profile', 
            block: 'Block Customer', 
            unblock: 'Activate Customer',
            orderHistory: 'Order History', 
            orderId: 'Order ID', 
            date: 'Date', 
            amount: 'Amount', 
            status: 'Status', 
            statusActive: 'Active',
            statusBlocked: 'Blocked'
        }
    };

    const originalUpdate = window.updatePageContent;
    window.updatePageContent = function() {
        if (typeof originalUpdate === 'function') originalUpdate();
        const lang = localStorage.getItem('language') || 'ar';
        const t = viewCustomerTranslations[lang];
        if (t) {
            document.querySelectorAll('[data-key]').forEach(el => {
                const key = el.getAttribute('data-key');
                if (t[key]) el.textContent = t[key];
            });
        }
    };
    document.addEventListener('DOMContentLoaded', () => window.updatePageContent());
</script>

<?php include("footer.php"); ?>