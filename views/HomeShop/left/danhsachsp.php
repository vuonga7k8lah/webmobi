<?php

use MyProject\Core\URL;
use MyProject\Model\ProducerModel;
use MyProject\Model\TypeModel;

$aType = TypeModel::getAllType();
$aNSX = ProducerModel::getAllProducer();
?>
<h4 style="text-align:center;color:#f7922a;background:#202020;;padding:10px"><i class="fas fa-bars"></i>Loại Sản Phẩm
</h4>
<div class="danhsachsanpham">
    <ul>
        <?php
        if (empty($aType)){
            echo "<li>Sorry We not found it</li>";
        }else{
        foreach ($aType as $item => $row) {
            ?>
            <li><a href="<?php echo URL::uri('searchType') . '/' .
                    $row[0] ?>"</a><?php echo $row[1]; ?></a></li>
            <?php
        }
        }
        ?>
    </ul>
</div>
<!--================HIEUSANPHAM=============-->
<h4 style="text-align:center;color:#f7922a;background:#202020;;padding:10px"><i class="fas fa-bars"></i>Nhà Sản Phẩm
</h4>
<div class="danhsachsanpham">
    <ul>
        <?php
        if (empty($aType)){
            echo "<li>Sorry We not found it</li>";
        }else{
        foreach ($aNSX as $item => $row):
            ?>
            <li><a href="<?php echo URL::uri('searchProducer') . '/' .
                    $row[0] ?>"><?php echo $row[1]; ?></a></li>
        <?php
        endforeach;
        }
        ?>
    </ul>
</div>
