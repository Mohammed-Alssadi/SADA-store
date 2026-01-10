
 <?php include ("header.php"); ?>            <div class="dashboard-container p-4">
                <div class="container-fluid">
                    <h4 class="mb-4" data-key="manageOrders">إدارة الطلبات</h4>

                    <div class="table-card">
                        <div class="d-flex justify-content-between align-items-center mb-4 gap-3 flex-wrap">
                            <div class="search-box m-0 min-w-300">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="البحث برقم الطلب أو العميل..." data-key="searchOrder">
                            </div>
                            <div class="d-flex gap-2">
                                <select class="form-select" style="width: 150px;">
                                    <option value="" data-key="allStatus">كل الحالات</option>
                                    <option value="pending" data-key="statusPending">قيد الانتظار</option>
                                    <option value="shipped" data-key="statusShipped">تم الشحن</option>
                                    <option value="delivered" data-key="statusDelivered">تم التوصيل</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th data-key="colOrderId">رقم الطلب</th>
                                        <th data-key="colCustomer">العميل</th>
                                        <th data-key="colDate">التاريخ</th>
                                        <th data-key="colTotal">الإجمالي</th>
                                        <th data-key="colStatus">الحالة</th>
                                        <th data-key="colActions">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD-7742</td>
                                        <td>أحمد محمد</td>
                                        <td>2026-01-02</td>
                                        <td>$1,250.00</td>
                                        <td><span class="badge-status bg-light-primary" data-key="statusPending">قيد الانتظار</span></td>
                                        <td>
                                            <a href="view_order.php?id=7742" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye me-1"></i><span data-key="view">عرض</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
 <?php include_once("footer.php"); ?>