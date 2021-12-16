<?php
use MyProject\Core\URL;
use MyProject\Model\AdminModel;
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $row = AdminModel::selectAllUser()->fetch_all();

    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <?php if (isset($_SESSION['success_updateUser'])): ?>
                <div class="alert-success">
                    <?php echo $_SESSION['success_updateUser']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success_addUser'])): ?>
                <div class="alert-success">
                    <?php echo $_SESSION['success_addUser']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['delete_User'])): ?>
                <div class="alert-success">
                    <?php echo $_SESSION['delete_User']; ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách Hàng
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                       style="text-align: center">
                    <thead>
                    <tr align="center">
                        <th>Mã KH</th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($row as $item): ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo $item[0]; ?></td>
                            <td><?php echo $item[1]; ?></td>
                            <td><?php echo $item[2]; ?></td>
                            <td><?php echo $item[3]; ?></td>
                            <td><?php echo $item[4]; ?></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                    href="<?php echo URL::uri('deleteUser'); ?>/<?= $item[0]; ?>">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="<?php echo URL::uri('updateUser'); ?>/<?= $item[0]; ?>">Edit</a></td>
                        </tr>
                    <?php endforeach;
                    ?>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php
    require_once 'views/Admin/footer.php';
}
?>