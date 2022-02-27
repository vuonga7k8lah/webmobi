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
            $aUrl = json_decode($ctsp['Anh'], true);
            ?>
            <div class="chitiet">
                <div class="mb-3" align="center" style="color:#C00;"><?php echo $ctsp['TenSP']; ?></div>
                <div class="tren">
                    <div class="trai mr-2">
                        <div class="row">
                            <div id="myCarousel" class="carousel slide border" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $i = 1;
                                    foreach ($aUrl as $url): ?>
                                        <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>">
                                            <img class="d-block w-100" src="<?= $url ?>" width="400" height="400"/>
                                        </div>
                                        <?php
                                        $i++;
                                    endforeach; ?>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="phai">
                        <div class="chitietsp"  style="overflow: scroll;height: 400px">
                            <div align="center" style="color:#C00;">CHI TIẾT SẢN PHẨM</div>
                            <?= html_entity_decode($ctsp['ChiTiet']) ?></div>
                    </div>
                </div>
                <div class="col">
                    <div class="giasp">Giá Bán:<?= Money($ctsp['Gia']); ?> vnđ
                    </div>
                    <div class="giohang1">
                        <form action="<?php echo URL::uri('cart') . '/' . $ctsp['MaSP'] ?>"
                              method="post">
                            <input type="number" min="1" value="1" name="quantity[<?= $ctsp['MaSP'] ?>]"
                                   size="2"/><br/>
                            <input type="submit" value="Mua sản phẩm"/>
                        </form>
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
                    $url = json_decode($row[6], true)[0];
                    ?>
                    <li>
                        <a href="<?php echo URL::uri('ctsp') . "/" . $row[0]; ?>">
                            <img src="<?= $url ?>" width="180" height="180"/>
                            <p style="color:#292929"><?= $row[3] ?></p>
                            <p style="color:#e10c00">Giá:<?= Money($row[5]) ?> vnđ</p>
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
</div>
<?php
require_once 'views/HomeShop/Footer.php';

?>
