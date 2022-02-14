<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\HomeShopModel;

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
            <?php
            $like = $_POST['search'];
            $search = HomeShopModel::searchProduct($like);

            ?>

            <p style="text-align:center;color:#e10c00;padding:10px">Sản phẩm tìm thấy
            <hr/>
            </p>
            <div class="sanphamall" style="height: 800px">
                <?php
                if ($search[1] == 0){
                    ?>
                    <p style="text-align:center;color:#56e1b2;padding:10px">không tìm thấy sản phẩm nào
                    </p>
                    <?php
                }else{
                ?>
                <ul>
                    <?php
                    foreach ($search[0] as $item => $row):
                        $url=json_decode($row[6],true)[0];
                        ?>
                        <li>
                            <a href="<?php echo URL::uri('ctsp') . "/" . $row[0]; ?>">
                                <img src="<?php echo $url ?>" width="180" height="180"/>
                                <p style="color:#292929"><?php echo $row[3] ?></p>
                                <p style="color:#e10c00">Giá:<?php echo $row[5] ?> vnđ</p>
                                <P style="color:#e10c00;">Chi Tiết</P>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php
require_once 'views/HomeShop/Footer.php';

?>
