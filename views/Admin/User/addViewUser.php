<?php
if (!isset($_SESSION['login_true'])) {
    header('location:' . \MyProject\Core\URL::uri('admin'));
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

                <form action="<?php echo \MyProject\Core\URL::uri('addUser'); ?>" method="POST">
                    <input name="MaKH" type="hidden" value=""/>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="form-control" name="TenKH" required/>
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
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" required/>
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
    require_once 'views/Admin/footer.php';
}