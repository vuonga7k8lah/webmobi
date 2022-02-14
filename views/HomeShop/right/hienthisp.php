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
$aNewProduct=ProductModel::getProductsLimitNews(6, 0);

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

<div class="row">
    <div class="col-12">
        <div class="sanphamall" style="height: 80%">
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
    </div>
    <div class="col-12 mt-2">
        <div class="text-right d-flex justify-content-center">
            <ul class="pagination pagination-split mt-0">
<!--                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span> <span class="sr-only">Previous</span></a></li>-->
                <?php
                if (!isset(Request::uri()[1])){
                    $currentID=1;
                }else{
                    $currentID = Request::uri()[1]?:1;
                }
                for ($b = 1; $b <= $sotrang; $b++): ?>
                    <li class="page-item <?=$b==$currentID?'active':''?>"><a class="page-link" href="<?=URL::uri('home') . '/' . $b
                        ?>"><?=$b?></a></li>
                <?php endfor;?>
<!--                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span> <span class="sr-only">Next</span></a></li>-->
            </ul>
        </div>
    </div>
</div>

</div>
