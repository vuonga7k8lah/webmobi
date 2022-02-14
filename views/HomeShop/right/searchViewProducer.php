<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\HomeShopModel;

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';
require_once 'views/HomeShop/Slide.php';
$id = Request::uri()[1];
?>
    <div class="content">
        <div class="left">
            <?php
            require_once 'views/HomeShop/left/danhsachsp.php';
            ?>
        </div>
        <div class="right">
            <?php
            $search = HomeShopModel::searchProducer($id);
            if (!empty($search)) {
                ?>
                <p style="text-align:center;color:#e10c00;padding:10px">Nhà Sản Xuất:<?= $search[0][0] ?>
                <hr/>
                </p>
                <div class="sanphamall"style="height: 800px">
                    <ul>
                        <?php
                        foreach ($search as $item => $row):
                            $url=json_decode($row[2],true)[0];
                            ?>
                            <li>
                                <a href="<?php echo URL::uri('ctsp') . "/" . $row[1]; ?>">
                                    <img src="<?=$url?>" width="180" height="180"/>
                                    <p style="color:#292929"><?php echo $row[3] ?></p>
                                    <p style="color:#e10c00">Giá:<?php echo $row[4] ?> vnđ</p>
                                    <P style="color:#e10c00;">Chi Tiết</P>
                                </a>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <?php
            } else {
                ?>
                <p style="text-align:center;color:#e10c00;padding:10px">Chưa Có Sản Phẩm
                <hr/>
                </p>
            <?php } ?>
        </div>
    </div>
<?php
require_once 'views/HomeShop/Footer.php';

?>
