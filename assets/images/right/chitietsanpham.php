<?php 
  $sql_chitietsp="select*from chitietsp where id_sp=$_GET[id]";
  $query_chitietsp=mysqli_query($connect,$sql_chitietsp);
  $dong_chitietsp=mysqli_fetch_array($query_chitietsp);
?>
<div class="tablechitiet">
   <table width="400" border="1"style="boder-collapse:collapse">
      <tr>
        <td colspan="2"><div align="center" style="color:#C00;">chi tiết sp</div></td>
      </tr>
      <tr>
    <td width="146" rowspan="2"><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_chitietsp['hinhanh']?>" width="200" height="200"/></td>
    <td width="38"><div class="tensp">tên sp:<?php echo $dong_chitietsp['tensp']?></div></td>
  </tr>
  <tr>
    <td><div class="giasp">giá sp:<?php echo $dong_chitietsp['gia']?> đ</div></td>
  </tr>
  <tr>
    <td colspan="2"><div class="thongso">thông số kỹ thuật</div></td>
  </tr>
  <tr>
    <td colspan="2"><div class="chitiet>"<?php echo $dong_chitietsp['mota']?></div></td>
  </tr>
 <div class="giohang">
    <a href="index.php?xem=giohang&add=<?php  echo $dong_chitietsp['id_sp']?>">
         <img src="images/580b57fcd9996e24bc43c462.png" height="150"
         width="150" />
     </a>
 </div>
 </table>
 <!-- hiện sản phẩm-->
 <?php
  $sql_spcungloai=mysqli_query($connect,"select * from chitietsp where id_loaisp='$_GET[idloaisp]' and chitietsp.id_sp<>$_GET[id]");
  ?>
            	    <p style="text-align:center;color:#e10c00;padding:10px">Sản Phẩm cùng loại<hr /></p>
                    <div class="sanphamall">
                    	<ul>
                    <?php 
						while ($dong_spcungloai=mysqli_fetch_array($sql_spcungloai)){
					?>
                        	<li>
                            	<a href="index.php?xem=chitietsanpham&id=<?php echo $dong_spcungloai['id_sp']?>">
                            		<img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_spcungloai['hinhanh']?>" width=                                     "180" height="180"/>
                            	    <p style="color:#292929"><?php echo $dong_spcungloai['tensp']?></p>
                             		<p style="color:#e10c00">Giá:<?php echo $dong_spcungloai['gia']?></p>
									<P style="color:#e10c00">Chi Tiết</P>   
                                 </a> 
                            </li>
                     <?php
						}
				      ?>       
                        </ul>
                    </div>
                    </div>
 <!-- hiện sản phẩm liên quan-->