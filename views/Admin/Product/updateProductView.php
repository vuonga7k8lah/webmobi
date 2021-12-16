<?php
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    $row_type = \MyProject\Model\AdminModel::selectAllType()->fetch_all();
    $row_producer = \MyProject\Model\AdminModel::selectAllProducer()->fetch_all();
    $id = \MyProject\Core\Request::uri()[1];
    $values_product = \MyProject\Model\AdminModel::selectOneProduct($id)->fetch_assoc();
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="<?php echo \MyProject\Core\URL::uri('updateProduct'); ?>" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="id" type="hidden" value="<?php echo $values_product['MaSP']; ?>"/>
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" name="TenSP" value="<?php echo $values_product['TenSP']; ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input class="form-control" name="GiaBan" value="<?php echo $values_product['GiaBan']; ?>"
                                   required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <input class="form-control" rows="3" name="ChiTiet" required
                                   value="<?php echo $values_product['ChiTiet']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="Images" value="" id="upload" onchange="hienthianh()">
                            <img src="<?php echo $values_product['Anh']; ?>" alt="" style="height: 80px;width: 80px;" id="anhcu">
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
                        <button type="submit" class="btn btn-default">Product Edit</button>
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