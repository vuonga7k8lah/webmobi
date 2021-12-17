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
                            <textarea class="form-control" rows="10" name="ChiTiet" id="editor1" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nhà Sản Xuất</label>
                            <select class="form-control" name="MaNSX" id="MaNSX">
                                <?php foreach ($row_producer as $key => $value): ?>
                                    <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name="Loai" id="Loai">
                                <?php foreach ($row_type as $key => $value): ?>
                                    <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="imagesHotel" name="images[]" multiple data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <div id="preview"></div>
                            <div id="inputIMG"></div>
                        </div>
                        <br>
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
