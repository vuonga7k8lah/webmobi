<?php

use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\ProductModel;

$sosp = 6;
if (!isset(Request::uri()[1])) {
    $current_page = 1;
} else {
    $current_page = Request::uri()[1]; //Trang hiện tại
}
$offset = ($current_page - 1) * $sosp;
$totalRecords = ProductModel::getAllCountProducts();
$sotrang = ceil($totalRecords / $sosp);
$aSP = ProductModel::getProductsLimit($sosp, $offset);
$aNewProduct=ProductModel::getProductsLimitNews($sosp, $offset);

?>
<p style="text-align:center;color:#e10c00;padding:10px">Danh Sách Sản Phẩm Mới Nhất
<hr/></p>
<div class="sanphamall" style="height: 379px">
    <ul>
        <?php

        if (empty($aNewProduct)) {
            echo "<li>Sorry we not found products</li>";
        } else {
            foreach ($aNewProduct as $item => $row):
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
        }
        ?>
    </ul>

</div>
<p style="text-align:center;color:#e10c00;padding:10px; margin-top: 10px">Danh Sách Sản Phẩm
<hr/></p>
<div class="sanphamall" style="height: 758px">
    <ul>
        <?php

        if (empty($aSP)) {
            echo "<li>Sorry we not found products</li>";
        } else {
            foreach ($aSP as $item => $row):
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
        }
        ?>
    </ul>

</div>
<div class="phantrang">
    <?php for ($b = 1; $b <= $sotrang; $b++) {
        echo '<a href="' . URL::uri('home') . '/' . $b . '">' . $b . '</a>';
    }
    ?>
</div>

</div>
