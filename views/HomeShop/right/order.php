<?php

use MyProject\Core\Request;
use MyProject\Database\DB;
use MyProject\Model\OrderModel;

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';
require_once 'views/HomeShop/Slide.php';
?>
<div class="content">
    <div class="left">
        <?php
        require_once 'views/HomeShop/left/danhsachsp.php';
        ?>
    </div>
    <div class="right">
        <div class="cart">
            <div align="center" style="color:#C00;">SẢN PHẨM ĐÃ ĐẶT MUA</div>
            <h3 style="float:right">
                <?php
                if (isset($_SESSION['isLogin'])) {
                echo 'Xin Chào:' . $_SESSION['isLogin'];
                ?>
            </h3>
            <?php
            if (OrderModel::selectIdDonHang($_SESSION['isLogin']) === null) {
                echo "<br>";
                echo '<div align="center" style="color:#C00;">Bạn Chưa Mua Sản Phẩm Nào</div>';
            } else {
                $_SESSION["order"] = OrderModel::selectIdDonHang($_SESSION['isLogin'])['id'];
            }
            if (isset($_SESSION["order"])) {
                ?>
                <form id="cart-form" action="" method="POST" style="width: 800px;">
                    <table>
                        <tr>
                            <th class="product-number">STT</th>
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-img">Ảnh sản phẩm</th>
                            <th class="product-price">Đơn giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="total-money">Thành tiền</th>
                        </tr>
                        <?php
                        $id = $_SESSION["order"];
                        $sp = OrderModel::selectAll($id)->fetch_all();
                        $num = 1;
                        $sum = 0;
                        foreach ($sp as $item => $row):?>
                            <tr>
                                <td class="product-number"><?= $num; ?></td>
                                <td class="product-name"><?= $row[0] ?></td>
                                <td class="product-img"><img src="<?= $row[1] ?>"/></td>
                                <td class="product-price"><?= $row[2] ?></td>
                                <td class="product-quantity"><?= $row[3] ?></td>
                                <td class="total-money"><?= $row[4] ?></td>
                            </tr>
                            <?php
                            $num++;
                            $sum += $row[4];
                        endforeach;
                        ?>
                        <tr id="row-total">
                            <td class="product-number">&nbsp;</td>
                            <td class="product-name">Tổng tiền</td>
                            <td class="product-img">&nbsp;</td>
                            <td class="product-price">&nbsp;</td>
                            <td class="product-quantity">&nbsp;</td>
                            <td class="total-money"><?= $sum ?></td>
                        </tr>
                    </table>
                    <div id="form-button">
                    </div>
                    <hr>
                    <input type="hidden" value="<?= $sum ?>" name="total"/>
                    <div><label>Ghi chú: </label><?= $row[5] ?></div>
                </form>
                <?php
            }
            } else {
                echo '<div align="center" style="color:#C00;">Chưa Đăng Nhập Tài Khoản</div>';
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once 'views/HomeShop/Footer.php';
?>
