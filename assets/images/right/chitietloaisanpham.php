<?php
   $sql_chitet=("select * from chitietsp where id_loaisp='$_GET[id]'");
   $query=mysqli_query($connect,$sql_chitet); 
?>
<?php
   $sql_loaisp=("select * from loaisp where id_loaisp='$_GET[id]'");
   $query_loaisp=mysqli_query($connect,$sql_loaisp);;
   $dong_loaisp=mysqli_fetch_array($query_loaisp);
?>
          
            	    <p style="text-align:center;color:#e10c00;padding:10px"><?php echo $dong_loaisp['tenloaisp']?><hr/></p>
                    <div class="sanphamall">
                    	<ul>
                        <?php 
						while ($dong_chitiet=mysqli_fetch_array($query)){
						?>
                        	<li>
                            	<a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $dong_chitiet['id_loaisp']?>&id=<?php echo $dong_chitiet['id_sp']?>">
                            		<img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_chitiet['hinhanh']?>" width                                     ="180" height="180"/>
                            	    <p><?php echo $dong_chitiet['tensp']?></p>
                             		<p style="color:#e10c00">Giá:<?php echo $dong_chitiet['gia'] ?> VNĐ</p>
									<P style="color:#e10c00">Chi Tiết</P>   
                                 </a> 
                            </li>
                           <?php
						}
						?>
                            
                        </ul>
                    </div>
            