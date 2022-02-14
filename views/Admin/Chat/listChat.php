<?php

use MyProject\Core\Session;
use MyProject\Core\URL;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $row = [];
    $aData = \MyProject\Model\ChatModel::getAllChatAdmin();
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
                    <h1 class="page-header">Tin Nhắn
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                       style="text-align: center">
                    <thead>
                    <tr align="center">
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Tên Khách Hàng</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Địa Chỉ</th>
                        <th style="text-align: center">Số Điện Thoại</th>
                        <th style="text-align: center">Delete</th>
                        <th style="text-align: center">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($aData as $item):

//                        if ($item[4] == 2) {
//                            continue;
//                        }
//                        $aInfo = json_decode($item[8], true);
//                        $url = (isset($aInfo['avatar']) && !empty($aInfo['avatar'])) ? $aInfo['avatar'] :
//                            URL::uri('assets/avt.jpg');
//                        ?>
                        <tr class="odd gradeX" align="center">
                            <td><?= $i ?></td>
                            <td><?php echo $item[2]; ?></td>
                            <td><?php echo $item[1]; ?></td>
                            <td><?php echo $item[3]; ?></td>
                            <td><?php echo $item[4]; ?></td>
                            <td class="center">
                                <a      onclick="return confirm('Are you sure you want to delete this item?');"
                                        href="<?php echo URL::uri('admin-delete-chat'); ?>/<?= $item[0]; ?>"> <i
                                            class="fa
                                        fa-trash-o  fa-fw"></i>Delete</a></td>
                            <td class="center"><a
                                    onclick="return confirm('Are you sure you want to update this item?');"
                                    href="<?php echo URL::uri('admin-detail-chat'); ?>/<?= $item[0]; ?>"><i class="fa
                                    fa-pencil fa-fw"></i> Detail</a></td>
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
