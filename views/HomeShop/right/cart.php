<?php

use MyProject\Core\Request;
use MyProject\Database\DB;

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
                <div align="center" style="color:#C00;font-size: 25px">Giỏ Hàng</div>
                <h3 style="float:right">
                    <?php
                    if (isset($_SESSION['isLogin'])) {
                        echo 'Xin Chào:' . $_SESSION['isLogin'];
                    }
                    ?>
                </h3>
                <?php
                if (isset(Request::uri()[1])) {
                    if (empty($_SESSION["cart"])) {
                        $_SESSION["cart"] = array();
                    }
                    foreach ($_POST['quantity'] as $id => $quantity) {
                        $_SESSION["cart"][$id] = $quantity;
                    }
                }
                if (isset($_SESSION["cart"])) {
                    ?>
                    <form id="cart-form" action="<?php echo \MyProject\Core\URL::uri('cartaction')?>" method="POST" style="width: 800px;">
                        <table>
                            <tr>
                                <th class="product-number">STT</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-img">Ảnh sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="total-money">Thành tiền</th>
                                <th class="product-delete">Xóa</th>
                            </tr>
                            <?php
                            $id=implode(",", array_keys($_SESSION["cart"]));
                            $sp = DB::makeConnection()->query("SELECT * FROM sanpham WHERE MaSP IN (" . implode(",", array_keys($_SESSION["cart"])) . ")")->fetch_all();
                            $num = 1;
                            $sum = 0;
                            foreach ($sp as $item => $row):?>
                                <tr>
                                    <td class="product-number"><?= $num; ?></td>
                                    <td class="product-name"><?= $row[1] ?></td>
                                    <td class="product-img"><img src="<?= $row[4] ?>"/></td>
                                    <td class="product-price"><?= $row[2] ?></td>
                                    <td class="product-quantity"><input type="text"
                                                                        value="<?=$_SESSION["cart"][$row[0]]?>"
                                                                        name="quantity[<?= $row[0] ?>]"/></td>
                                    <td class="total-money"><?= $sum1=$_SESSION["cart"][$row[0]]*$row[2]; ?></td>
                                    <td class="product-delete"><a href="<?php echo \MyProject\Core\URL::uri('logout2').'/'.$row[0];?>">Xóa</a></td>
                                </tr>
                                <?php
                                $sum += $sum1;
                                $num++;
                            endforeach;
                            ?>
                            <tr id="row-total">
                                <td class="product-number">&nbsp;</td>
                                <td class="product-name">Tổng tiền</td>
                                <td class="product-img">&nbsp;</td>
                                <td class="product-price">&nbsp;</td>
                                <td class="product-quantity">&nbsp;</td>
                                <td class="total-money"><?= $sum ?></td>
                                <td class="product-delete"></td>
                            </tr>
                        </table>
                        <div id="form-button">
                            <input type="submit" name="update_click" value="Cập nhật"/>
                        </div>
                        <hr>
                        <input type="hidden" value="<?= $sum ?>" name="total"/>
                        <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7"></textarea></div>
                        <input type="submit" name="order_click" value="Đặt hàng"/>
                    </form>
                    <?php
                } else {
                    echo "giỏ hàng chưa có sản phẩm";
                }
                ?>
            </div>
        </div>
    </div>
<?php
require_once 'views/HomeShop/Footer.php';

?>