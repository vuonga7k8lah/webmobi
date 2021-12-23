<?php

use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Model\AdminModel;
use MyProject\Model\UserModel;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $row = UserModel::getUsers();

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
                        <th>Avatar</th>
                        <th>Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                        <th>Vai Trò</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($row as $item):

                        if ($item[4] == 4) {
                            continue;
                        }
                        $aInfo = json_decode($item[8], true);
                        $url = (isset($aInfo['avatar']) && !empty($aInfo['avatar'])) ? $aInfo['avatar'] :
                            URL::uri('assets/avt.jpg');
                        ?>
                        <tr class="odd gradeX" align="center">
                            <td><?= $i ?></td>
                            <td><?php echo $item[1]; ?></td>
                            <td>
                                <a href="<?= $url ?>">
                                    <img src="<?= $url ?>"
                                         alt=""
                                         style="width: 50px;height: 50px;float: left;display: block;margin: 0 auto">
                                </a>
                            </td>
                            <td><?php echo $item[2]; ?></td>
                            <td><?php echo $item[5]; ?></td>
                            <td><?php echo $item[6]; ?></td>
                            <td><?= ($item[4] == 1) ? "Quản Lý" : "Khách Hàng"; ?></td>
                            <td class="center">
                                <a      onclick="return confirm('Are you sure you want to delete this item?');"
                                        href="<?php echo URL::uri('deleteUser'); ?>/<?= $item[0]; ?>"> <i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                            <td class="center"><a
                                        onclick="return confirm('Are you sure you want to update this item?');"
                                        href="<?php echo URL::uri('updateUser'); ?>/<?= $item[0]; ?>"><i class="fa fa-pencil fa-fw"></i> Edit</a></td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
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
    Session::checkReloadPage([
        'success_updateUser',
        'success_addUser',
        'delete_User'
    ]);
    require_once 'views/Admin/footer.php';
}
?>
