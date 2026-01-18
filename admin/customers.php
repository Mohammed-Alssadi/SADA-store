<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['roll_id'] != 1) {
    header("Location: ../404.php");
    exit;
}
include "header.php";
include "../include/db_connect.php";

try {
    $stmt = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    die("خطأ في جلب البيانات: " . $e->getMessage());
}
?>

<div class="wrapper">
    <div class="dashboard-container p-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 data-key="customers">إدارة العملاء</h4>
                <a href="add_user.php" class="btn btn-primary text-light" data-key="addNewCustomer">إضافة مستخدم جديد</a>
            </div>

            <div class="customer-card">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th data-key="colCustomer">العميل</th>
                                <th data-key="colEmail">البريد الإلكتروني</th>
                                <th data-key="colCountry">الدولة</th>
                                <th data-key="colStatus">الحالة</th>
                                <th data-key="colActions">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($users) > 0): ?>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="../uploads/users/<?php echo !empty($user['profile_image']) ? ($user['profile_image']) : 'user.png'; ?>"
                                            class="customer-avatar" alt="User"
                                            style="width: 40px; height: 40px; border-radius: 50%;">
                                        <span class="fw-bold"><?php echo ($user['fullname']); ?></span>
                                    </div>
                                </td>
                                <td><?php echo ($user['email']); ?></td>
                                <td><?php echo ($user['country']); ?></td>
                                <td>
                                    <?php if ($user['status'] == 1): ?>
                                    <span class="status-badge status-active" data-key="statusActive">نشط</span>
                                    <?php else: ?>
                                    <span class="status-badge status-blocked" data-key="statusBlocked">محظور</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="view_customer.php?id=<?php echo $user['id']; ?>"
                                        class="action-btn btn-view" title="عرض"><i class="fas fa-eye"></i></a>
                                    <a href="add_user.php?id=<?php echo $user['id']; ?>" class="action-btn btn-edit"
                                        title="تعديل"><i class="fas fa-edit"></i></a>

                                    <?php if ($user['status'] == 1): ?>
                                    <a href="change_status.php?id=<?php echo $user['id']; ?>&status=0"
                                        class="action-btn btn-block" title="حظر"><i class="fas fa-ban"></i></a>
                                    <?php else: ?>
                                    <a href="change_status.php?id=<?php echo $user['id']; ?>&status=1"
                                        class="action-btn btn-unblock" title="تفعيل"><i
                                            class="fas fa-check-circle"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">لا يوجد مستخدمين حالياً</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
<script>
const customerTranslations = {
    ar: {
        customers: 'إدارة العملاء',
        searchCustomer: 'البحث عن عميل...',
        colCustomer: 'العميل',
        colEmail: 'البريد الإلكتروني',
        colCountry: 'الدولة',
        colStatus: 'الحالة',
        colActions: 'الإجراءات',
        statusActive: 'نشط',
        statusBlocked: 'محظور'
    },
    en: {
        customers: 'Customer Management',
        searchCustomer: 'Search customer...',
        colCustomer: 'Customer',
        colEmail: 'Email',
        colCountry: 'Country',
        colStatus: 'Status',
        colActions: 'Actions',
        statusActive: 'Active',
        statusBlocked: 'Blocked'
    }
};

const originalUpdate = window.updatePageContent;
window.updatePageContent = function() {
    if (typeof originalUpdate === 'function') originalUpdate();
    const lang = localStorage.getItem('language') || 'ar';
    const t = customerTranslations[lang];
    if (t) {
        document.querySelectorAll('[data-key]').forEach(el => {
            const key = el.getAttribute('data-key');
            if (t[key]) {
                if (el.tagName === 'INPUT') el.placeholder = t[key];
                else el.textContent = t[key];
            }
        });
    }
};
document.addEventListener('DOMContentLoaded', () => window.updatePageContent());
</script>
</body>

</html>