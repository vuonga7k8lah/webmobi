<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
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
                    $orderID = Request::uri()[1]??0;
                    $aID = $_SESSION["order"];
                    $currentOrderID=!empty($orderID) ? $orderID : $aID[0];
                    $idOrderStatus=\MyProject\Model\StatusOrderModel::getIDStatusOrderWithMaKHAndMaDH($_SESSION['currentUserID'],$currentOrderID);
                    $info = \MyProject\Model\StatusOrderModel::getWithId($idOrderStatus);
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
                            $aProducts = OrderModel::selectAll($currentOrderID);
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
                               value="<?= $currentOrderID ?>">
                        <input type="hidden" id="order-userID" name="userID"
                               value="<?= $_SESSION['currentUserID'] ?>">
                        <?php

                        switch ($row[7]) {
                            case 'dangGiao':
                            case 'daGiao':
                                ?>
                                <div><label>Đã Nhận Hàng: </label>
                                    <input type="checkbox" name="status"
                                           id="da-nhan-hang" <?= $info['status'] == 'daGiao' ? 'checked' : ''
                                    ?> />
                                </div>
                                <?php
                                break;
                            default:
                                ?>
                                <div><label> Xác Nhận Nhận Hàng: </label>
                                    <input type="checkbox" name="status-order"
                                           id="da-xac-nhan-hang" <?= isset($info['status']) &&
                                    $info['status'] ==
                                    'dangGiao' ? 'checked' : '' ?> /></div>
                                <?php
                                break;
                        }
                        ?>
                        <div><label>Ghi chú: </label><?= $row[5] ?></div>
                    </form>
                    <div class="col-12 mt-2">
                        <div class="text-right d-flex justify-content-center">
                            <ul class="pagination pagination-split mt-0">
                                <!--                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span> <span class="sr-only">Previous</span></a></li>-->
                                <?php
                                $aOrders = OrderModel::getAllOrderMe($_SESSION['currentUserID']);
                                $numberProduct = count($aOrders);

                                if (!isset(Request::uri()[1])) {
                                    $currentID = 1;
                                } else {
                                    $currentID = Request::uri()[1] ?: 1;
                                }
                                $idOrder=1;
                                foreach ($aID as $key=>$id): ?>
                                    <li class="page-item <?= $id == $currentOrderID ? 'active' : '' ?>">
                                        <a class="page-link"
                                           href="<?= URL::uri('order') . '/' . $id ?>">
                                            <?= $idOrder ?>
                                        </a>
                                    </li>
                                <?php
                                    $idOrder++;
                                endforeach; ?>
                                <!--                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span> <span class="sr-only">Next</span></a></li>-->
                            </ul>
                        </div>
                    </div>
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
