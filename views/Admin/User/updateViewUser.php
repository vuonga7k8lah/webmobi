<?php
use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Model\AdminModel;
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    $id = Request::uri()[1];
    $values_user = AdminModel::selectOneUser($id);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thành Viên
                        <small>Sửa</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <!--                <div class="col-lg-7" style="padding-bottom:120px">-->

                <form action="<?php echo \MyProject\Core\URL::uri('updateUser'); ?>" method="POST">
                    <input name="MaKH" type="hidden" value="<?=$values_user["MaKH"]?>"/>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="form-control" name="TenKH" value="<?=$values_user['TenKH']?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" value="<?=$values_user['Email']?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" name="DiaChi" value="<?=$values_user['DiaChi']?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input class="form-control" name="SDT" value="<?=$values_user['Sdt']?>" required/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Thành Viên</button>
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