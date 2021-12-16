<?php

use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Model\ProducerModel;
use MyProject\Model\TypeModel;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    $row_type = TypeModel::getAllType();
    $row_producer = ProducerModel::getAllProducer();
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Thêm</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if (isset($_SESSION['error_AddProduct'])): ?>
                        <div class="alert-danger">
                            <?php echo $_SESSION['error_AddProduct']; ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo URL::uri('addProduct'); ?>" method="POST"
                          enctype="multipart/form-data">
                        <input name="id" type="hidden" value=""/>
                        <div class="form-group">
                            <label>Tên Sản Phảm</label>
                            <input class="form-control" name="TenSP" required/>
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input class="form-control" name="GiaBan" required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="3" name="ChiTiet" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="Images" multiple required id="upload" onchange="hienthianh()"/>
                            <div id="displayImg" class="anh"></div>
                        </div>
                        <div class="form-group">
                            <label>Nhà Sản Xuất</label>
                            <?php foreach ($row_producer as $row): ?>
                                <label class="radio-inline">
                                    <input name="NSX" value="<?php echo $row[0]; ?>" checked=""
                                           type="radio"><?php echo $row[1]; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <?php foreach ($row_type as $row): ?>
                                <label class="radio-inline">
                                    <input name="Loai" value="<?php echo $row[0]; ?>" checked=""
                                           type="radio"><?php echo $row[1]; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
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
        'error_AddProduct'
    ]);
    require_once 'views/Admin/footer.php';
}
