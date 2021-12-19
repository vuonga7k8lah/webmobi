<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Model\ProducerModel;
use MyProject\Model\ProductModel;
use MyProject\Model\TypeModel;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    $row_type = TypeModel::getAllType();
    $row_producer = ProducerModel::getAllProducer();
    $id = Request::uri()[1];
    $aProduct = ProductModel::getProduct($id);

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
                    <form action="<?php echo URL::uri('updateProduct'); ?>" method="POST"
                          enctype="multipart/form-data">
                        <input name="id" value="<?=$aProduct['MaSP']?>" type="hidden">
                        <div class="form-group">
                            <label>Tên Sản Phảm</label>
                            <input class="form-control" name="TenSP" value="<?=$aProduct['TenSP']?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input class="form-control" name="Gia" value="<?=$aProduct['Gia']?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Chi Tiết</label>
                            <textarea class="form-control" rows="10" name="ChiTiet" id="editor1" required>
                                <?=html_entity_decode($aProduct['ChiTiet'])?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Nhà Sản Xuất</label>
                            <select class="form-control" name="MaNSX" id="MaNSX">
                                <?php foreach ($row_producer as $key => $value): ?>
                                    <option <?=($value[0]==$aProduct['MaNSX'])?"selected":''?> value="<?= $value[0]
                                    ?>"><?= $value[1]
                                        ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <select class="form-control" name="MaLoai" id="Loai">
                                <?php foreach ($row_type as $key => $value): ?>
                                    <option <?=($value[0]==$aProduct['MaLoai'])?"selected":''?> value="<?= $value[0]
                                    ?>"><?= $value[1] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" id="images_update_Product" name="images[]" multiple
                                   data-allow-reorder="true"
                                   data-max-file-size="3MB" data-max-files="5">
                            <?php $aImage = json_decode($aProduct['Anh'], true);
                            $preview = '';
                            $inputIMG = '';
                            foreach ($aImage as $src) {
                                $preview .= '<img src="' . $src . '" width="200px;" height="200px">';
                                $inputIMG .= '<input name="images[]" type="hidden" value="' . $src . '">';
                            }
                            ?>
                            <div id="preview_product_update" style="margin-top: 10px"><?= $preview ?></div>
                            <div id="inputIMG_product_update"><?= $inputIMG ?></div>
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
