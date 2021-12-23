<?php

use MyProject\Core\Session;
use MyProject\Core\URL;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thành Viên
                        <small>Thêm</small>
                    </h1>
                    <?php if (isset($_SESSION['error_addUser'])): ?>
                        <div class="alert-danger">
                            <?php echo $_SESSION['error_addUser']; ?>
                        </div>
                    <?php endif; ?>

                    <!-- /.col-lg-12 -->
                    <!--                <div class="col-lg-7" style="padding-bottom:120px">-->

                    <form action="<?php echo URL::uri('addUser'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Khách Hàng</label>
                            <input class="form-control" name="username" required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="Email" type="email" required/>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" name="DiaChi" required/>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" name="SDT" required/>
                        </div>
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <select class="form-control" name="sex">
                                <option value="">Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vai Trò</label>
                            <select class="form-control" name="role">
                                <option value="1">Khách Hàng</option>
                                <?= (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 2)) ? '
                                    <option value="2">Quản Lý</option>' : '' ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" required/>
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input type="file" id="imagesAvatar" name="images" data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <div id="previewAvatar"></div>
                            <div id="inputIMGAvatar"></div>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Thành Viên</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php
    Session::checkReloadPage([
        'error_addUser'
    ]);
    require_once 'views/Admin/footer.php';
}
