<?php

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
            $id=\MyProject\Core\Request::uri()[1];
            $ctsp=\MyProject\Database\DB::makeConnection()->query("SELECT * FROM sanpham where MaSP='".$id."'")->fetch_assoc();
            ?>
            <div class="chitiet">
                <div align="center" style="color:#C00;"><?php echo $ctsp['TenSP']; ?></div>
                <div class="tren">
                <div class="trai">
                    <img src="<?php echo $ctsp['Anh']; ?>"width="400" height="400"/>
                </div>
                 <div class="phai">
                     <div class="chitietsp">
                         <div align="center" style="color:#C00;">CHI TIẾT SẢN PHẨM</div>
                         <?php echo $ctsp['ChiTiet']; ?></div>
                     <div class="giasp">Giá Bán:<?php echo $ctsp['GiaBan']; ?> vnđ
                     </div>
                     <div class="giohang1">
                         <form action="<?php echo \MyProject\Core\URL::uri('cart').'/'.$ctsp['MaSP'] ?>" method="post">
                             <input type="text" value="1" name="quantity[<?=$ctsp['MaSP']?>]" size="2" /><br/>
                             <input type="submit" value="Mua sản phẩm" />
                         </form>
<!--                         <a href="--><?php //echo \MyProject\Core\URL::uri('cart').'/'.$ctsp['MaSP'] ?><!--">-->
<!--                             <i class="fas fa-cart-arrow-down">Mua</i>-->
<!--                         </a>-->
                     </div>
                 </div>
                </div>

            <!-- hiện sản phẩm-->
            <?php
            $spcungloai = \MyProject\Database\DB::makeConnection()->
            query("SELECT * FROM sanpham sp JOIN loai l on sp.MaLoai=l.MaLoai WHERE MaNSX='".$ctsp['MaNSX']."'")->fetch_all();
            ?>
            <p style="color: #e16fdd;padding: 10px;margin-top: 28px;text-align: center;">Sản Phẩm Cùng Nhà Sản Xuất<hr/></p>
            <div class="sanphamall" style="height: 758px">
                <ul>
                    <?php
                   foreach ($spcungloai as $item=>$row) :
                        ?>
                        <li>
                            <a href="<?php echo \MyProject\Core\URL::uri('ctsp')."/".$row[0];?>">
                                <img src="<?php echo $row[4] ?>"
                                     width="180" height="180"/>
                                <p style="color:#292929"><?php echo $row[1] ?></p>
                                <p style="color:#e10c00">Giá:<?php echo $row[2] ?></p>
                                <P style="color:#e10c00">Chi Tiết</P>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
            </div>
                <br>
        </div>
    </div>
    </div>
<?php
require_once 'views/HomeShop/Footer.php';

?>