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

?>
<p style="text-align:center;color:#e10c00;padding:10px">TẤT CẢ SẢN PHẨM
<hr/></p>
<div class="sanphamall" style="height: 758px">
    <ul>
        <?php

        if (empty($aSP)) {
            echo "<li>Sorry we not found products</li>";
        } else {
            foreach ($aSP as $item => $row):
                ?>
                <li>
                    <a href="<?php echo URL::uri('ctsp') . "/" . $row[0]; ?>">
                        <img src="<?php echo $row[4] ?>" width="180" height="180"/>
                        <p style="color:#292929"><?php echo $row[1] ?></p>
                        <p style="color:#e10c00">Giá:<?php echo $row[2] ?> vnđ</p>
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
