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
    $values_type = AdminModel::selectOneType($id)->fetch_assoc();
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại
                        <small>Sửa</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <!--                <div class="col-lg-7" style="padding-bottom:120px">-->

                <form action="<?php echo URL::uri('updateType'); ?>" method="POST">
                    <input name="id" type="hidden" value="<?php echo $values_type['MaLoai']; ?>"/>
                    <div class="form-group">
                        <label>Tên Loại</label>
                        <input class="form-control" name="TenLoai" value="<?php echo $values_type['TenLoai']; ?>"
                               required/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Loại</button>
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