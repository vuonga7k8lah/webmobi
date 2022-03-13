<?php

use MyProject\Core\Request;
use MyProject\Database\DB;
use MyProject\Model\OrderModel;
use MyProject\Model\UserModel;

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
        <div class="col-10 mb-5">
            <div class="cart">
                <div align="center" style="color:#C00;">SẢN PHẨM ĐÃ ĐẶT MUA</div>
                <h3 style="float:right">
                    <?php
                    if (isset($_SESSION['isLogin'])) {
                    echo 'Xin Chào:' . $_SESSION['isLogin'];
                    ?>
                </h3>
                <?php

                if (empty($aMaDH = OrderModel::selectIdDonHang($_SESSION['currentUserID']))) {
                    echo "<br>";
                    echo '<div align="center" style="color:#C00;">Bạn Chưa Mua Sản Phẩm Nào</div>';
                } else {
                    $_SESSION["order"] = $aMaDH;
                }
                if (isset($_SESSION["order"])) {
                    $info
                        = json_decode((UserModel::getUserWithUserID($_SESSION['currentUserID']))['info'],
                        true);

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
                            $aID = $_SESSION["order"];
                            $aProducts = [];
                            foreach ($aID as $id) {
                                $maDH=$id;
                                $aProducts = array_merge($aProducts, OrderModel::selectAll($id));
                            }

                            $num = 1;
                            $sum = 0;
                            foreach ($aProducts as $item => $row):
                                $date = $row[6];
                                ?>
                                <tr>
                                    <td class="product-number"><?= $num; ?></td>
                                    <td class="product-name"><?= $row[0] ?></td>
                                    <td class="product-img"><?php LoadAnh($row[1]); ?></td>
                                    <td class="product-price"><?= Money($row[2]) ?></td>
                                    <td class="product-quantity"><?= $row[3] ?></td>
                                    <td class="total-money"><?= Money($row[4]) ?></td>
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
                                <td class="total-money"><?= Money($sum) ?></td>
                            </tr>
                        </table>
                        <div id="form-button">
                        </div>
                        <hr>
                        <input type="hidden" value="<?= $sum ?>" name="total"/>
                        <div><label>Thời Gian Nhận: </label><input type="date" name="DiaChi" value="<?= date('Y-m-d',
                                strtotime($date . ' + 4 days')) ?>" disabled/></div>
                        <input type="hidden" id="order-MaDH" name="MaDH"
                               value="<?= $maDH ?>">
                        <input type="hidden" id="order-userID" name="userID"
                               value="<?= $_SESSION['currentUserID'] ?>">
                        <?php

                        switch ($row[7]) {
                            case 'dangGiao':
                            case 'daGiao':
                                ?>
                                <div><label>Đã Nhận Hàng: </label>
                                    <input type="checkbox" name="status"
                                           id="da-nhan-hang" <?= $info['statusOrder'] == 'daGiao' ? 'checked' : ''
                                    ?> />
                                </div>
                                <?php
                                break;
                            default:
                                ?>
                                <div><label> Xác Nhận Nhận Hàng: </label>
                                    <input type="checkbox" name="status-order" id="da-xac-nhan-hang" <?= $info['statusOrder'] ==
                                    'dangGiao' ? 'checked' : '' ?> /></div>
                                <?php
                                break;
                        }
                        ?>
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
</div>
<?php
require_once 'views/HomeShop/Footer.php';
?>
