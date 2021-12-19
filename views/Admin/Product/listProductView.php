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
    $aRow = \MyProject\Model\ProductModel::getAllProduct();

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
                    <?php $i=1;
                    foreach ($aRow as $item): ?>
                        <tr class="odd gradeX" align="center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $item[3]; ?></td>
                            <td><?php echo $item[5]; ?></td>
                            <td><?= html_entity_decode(the_excerpt($item[4])) . '...' ?></td>
                            <td style="float: left;width: 120px;text-align: center"><?php LoadAnh($item[6]); ?></td>
                            <td class="center">
                                <a      onclick="return confirm('Are you sure you want to delete this item?');"
                                        href="<?php echo URL::uri('deleteProduct'); ?>/<?= $item[0]; ?>">
                                    <i class="fa fa-trash-o  fa-fw"></i>Delete
                                </a>
                            </td>
                            <td class="center"><a
                                        href="<?php echo URL::uri('updateProduct'); ?>/<?= $item[0]; ?>"
                                        onclick="return confirm('Are you sure you want to edit this item?');"><i class="fa fa-pencil fa-fw"></i>Edit</a>
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
