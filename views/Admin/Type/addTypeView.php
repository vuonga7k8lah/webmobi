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
                    <h1 class="page-header">Type Product
                        <small>Add</small>
                    </h1>
                    <?php if (isset($_SESSION['error_addType'])): ?>
                        <div class="alert-danger">
                            <?php echo $_SESSION['error_addType']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- /.col-lg-12 -->
                <!--                <div class="col-lg-7" style="padding-bottom:120px">-->

                <form action="<?php echo URL::uri('addType'); ?>" method="POST">
                    <input name="id" type="hidden" value=""/>
                    <div class="form-group">
                        <label>Tên Loại</label>
                        <input class="form-control" name="TenLoai" required/>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Loại</button>
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
        'error_addType'
    ]);
    require_once 'views/Admin/footer.php';
}
