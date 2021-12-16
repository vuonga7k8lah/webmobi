<?php

use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Model\AdminModel;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $row = AdminModel::selectAllProduct()->fetch_all();
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <?php if (isset($_SESSION['success_addProduct'])): ?>
                    <div class="alert-success">
                        <?php echo $_SESSION['success_addProduct']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['delete_addProduct'])): ?>
                    <div class="alert-success">
                        <?php echo $_SESSION['delete_addProduct']; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success_updateProduct'])): ?>
                    <div class="alert-success">
                        <?php echo $_SESSION['success_updateProduct']; ?>
                    </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Danh Sách</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                       style="text-align: center">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá Bán</th>
                        <th>Chi tiết</th>
                        <th>Ảnh</th>
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
                            <td><img src="<?php echo $item[4]; ?>" style="width: 50px; height: 50px"></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="<?php echo URL::uri('deleteProduct'); ?>/<?= $item[0]; ?>">
                                    Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="<?php echo URL::uri('updateProduct'); ?>/<?= $item[0]; ?>">Edit</a>
                            </td>
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

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php
    Session::checkReloadPage([
        'success_addProduct',
        'delete_addProduct',
        'success_updateProduct',
    ]);
    require_once 'views/Admin/footer.php';
}
?>
