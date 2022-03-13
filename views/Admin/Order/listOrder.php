<?php

use MyProject\Core\URL;
use MyProject\Model\OrderModel;
use MyProject\Model\UserModel;

$row = OrderModel::getAllOrder();
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';

    $row = $_SESSION['data-order'] ?? OrderModel::getAllOrder();
    $currentDate = date('Y-m-d');
    $from = $_SESSION['from-date'] ?? $currentDate;
    $to = $_SESSION['end-date'] ?? $currentDate;
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ĐƠN HÀNG
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="margin-bottom: 10px">
                    <form method="post" action="<?= URL::uri('custom-order') ?>" class="row g-3">
                        <label for="startDate">From Date</label>
                        <input type="date" id="startDate" name="startDate" value="<?= $from ?>">
                        <label for="endDate">To Date</label>
                        <input type="date" id="endDate" name="endDate" value="<?= $to ?>">

                        <button style="margin-left: 10px" type="submit" class="btn btn-primary mb-3">Search</button>
                    </form>
                </div>
                <?php
                if (empty($row)) {
                    echo "<h3>Chưa có đơn hàng nào</h3>";
                } else {
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                           style="text-align: center">
                        <thead>
                        <tr align="center" style="text-align: center">
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Tên khách hàng</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center">SDT</th>
                            <th style="text-align: center">Tổng Tiền</th>
                            <th style="text-align: center">Trạng Thái</th>
                            <th style="text-align: center">Ngày tạo đơn</th>
                            <th style="text-align: center">Delete</th>
                            <th style="text-align: center">In Đơn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($row as $item):
                            $coverDate = date('m-d-Y', strtotime($item[5]));
                            $aDataGiaoHang = [
                                'chuanBi'  => 'Đang Chuẩn Bị Hàng',
                                'dangGiao' => 'Đang Giao',
                                'daGiao'   => 'Đã Giao'
                            ];
                            ?>
                            <tr class="odd gradeX" align="center">
                                <td><?= $i; ?></td>
                                <td><?= $item[1]; ?></td>
                                <td><?= $item[2]; ?></td>
                                <td><?= $item[3]; ?></td>
                                <td><?= Money($item[4]); ?></td>
                                <td>
                                    <form action="">
                                        <select id="giaoHang<?= $item[0] ?>" name="selectGiaoHang<?= $item[0] ?>">
                                            <?php foreach ($aDataGiaoHang as $key => $value):?>
                                                <option value="<?= $key . '+1' . $item[0] ?>" <?= $item[6] == $key ?
                                                    'selected' : '' ?>
                                                ><?= $value ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </form>
                                </td>
                                <td><?= $coverDate ?></td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a
                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                            href="<?php echo URL::uri('deleteOrder'); ?>/<?= $item[0]; ?>">Delete</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa fa-print fa-fw"></i>
                                    <a href="<?php echo URL::uri('printOrder'); ?>/<?= $item[0]; ?>">In ĐƠN</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </table>
                <?php } ?>
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
