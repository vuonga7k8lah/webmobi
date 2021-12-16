<?php

use MyProject\Model\OrderModel;
use MyProject\Core\URL;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $orders = OrderModel::selectPrintId($id);
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div id="order-detail-wrapper" style="font-family: 'Montserrat', sans-serif;">
                    <div id="order-detail">
                        <h1>Chi tiết đơn hàng</h1>
                        <label>Người nhận: </label><span> <?= $orders[0][0] ?></span><br/>
                        <label>Điện thoại: </label><span> <?= $orders[0][2] ?></span><br/>
                        <label>Địa chỉ: </label><span> <?= $orders[0][1] ?></span><br/>
                        <hr/>
                        <h3>Danh sách sản phẩm</h3>
                        <ul>
                            <?php
                            $totalQuantity = 0;
                            foreach ($orders as $row) {
                                ?>
                                <li>
                                    <span class="item-name"><?= $row[3] ?></span>
                                    <span class="item-quantity"> - Số Lượng: <?= $row[4] ?> sản phẩm</span>
                                </li>
                                <?php
                                $totalQuantity += $row[4];
                            }
                            ?>
                        </ul>
                        <hr/>
                        <label>Tổng SL:</label> <?= $totalQuantity ?> - <label>Tổng tiền:</label> <?= $orders[0][5] ?> đ
                        <p><label>Ghi chú: </label><?= $orders[0][6] ?></p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php
    require_once 'views/Admin/footer.php';
}
?>