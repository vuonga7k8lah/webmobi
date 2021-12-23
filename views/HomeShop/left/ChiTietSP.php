<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\ProductModel;

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';
require_once 'views/HomeShop/Slide.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-2 mt-5">
                <?php
                require_once 'views/HomeShop/left/danhsachsp.php';
                ?>
            </div>
            <div class="col-10">
                <?php
                $id = Request::uri()[1];
                $ctsp = ProductModel::getProduct($id);
                $url=json_decode($ctsp['Anh'],true)[0];
                ?>
                <div class="chitiet">
                    <div align="center" style="color:#C00;"><?php echo $ctsp['TenSP']; ?></div>
                    <div class="tren">
                        <div class="trai">
                            <img src="<?=$url?>" width="400" height="400"/>
                        </div>
                        <div class="phai">
                            <div class="chitietsp">
                                <div align="center" style="color:#C00;">CHI TIẾT SẢN PHẨM</div>
                                <?=html_entity_decode($ctsp['ChiTiet'])?></div>
                            <div class="giasp">Giá Bán:<?= Money($ctsp['Gia']); ?> vnđ
                            </div>
                            <div class="giohang1">
                                <form action="<?php echo URL::uri('cart') . '/' . $ctsp['MaSP'] ?>"
                                      method="post">
                                    <input type="number" value="1" name="quantity[<?= $ctsp['MaSP'] ?>]" size="2"/><br/>
                                    <input type="submit" value="Mua sản phẩm"/>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <div class="col">
            <?php
            $spcungloai = ProductModel::getProductWithType($ctsp['MaLoai']);
            ?>
            <div class="sanphamall" style="height: 758px">
                <p style="color: #e16fdd;padding: 10px;margin-top: 50px;text-align: center;">Sản Phẩm Cùng Nhà Sản Xuất
                <hr/>
                </p>
                <ul>
                    <?php
                    foreach ($spcungloai as $item => $row) :
                        $url=json_decode($row[6],true)[0];
                        ?>
                        <li>
                            <a href="<?php echo URL::uri('ctsp') . "/" . $row[0]; ?>">
                                <img src="<?=$url?>" width="180" height="180"/>
                                <p style="color:#292929"><?= $row[3] ?></p>
                                <p style="color:#e10c00">Giá:<?=Money($row[5])?> vnđ</p>
                                <P style="color:#e10c00;">CHI TIẾT</P>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php
require_once 'views/HomeShop/Footer.php';

?>
