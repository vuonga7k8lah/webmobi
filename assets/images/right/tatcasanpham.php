<?php 
   if(isset($_GET['trang'])){
    $get_trang=$_GET['trang'];
   }
   else{
  		$get_trang=''; 
   }
   if($get_trang == '' || $get_trang ==1){
 		$trang1=0;  
   }
   else{
   		$trang1=($get_trang*10)-10;	
   }
   $sql_all="select * from chitietsp limit $trang1,10";
   $query_all=mysqli_query($connect,$sql_all); 
?>          
            	    <p style="text-align:center;color:#e10c00;padding:10px">Tất Cả Sản Phẩm<hr /></p>
                    <div class="sanphamall">
                    	<ul>
                    <?php 
						while ($dong_all=mysqli_fetch_array($query_all)){
					?>
                        	<li>
                            	<a href="index.php?xem=chitietsanpham&idloaisp=<?php echo $dong_all['id_loaisp']?>&id=<?php echo $dong_all['id_sp']?>">
                            		<img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_all['hinhanh']?>" width=                                     "180" height="180"/>
                            	    <p style="color:#292929"><?php echo $dong_all['tensp']?></p>
                             		<p style="color:#e10c00">Giá:<?php echo $dong_all['gia']?> vnđ</p>
									<P style="color:#e10c00;">Chi Tiết</P>   
                                 </a> 
                            </li>
                     <?php
						}
				      ?>       
                        </ul>
                    </div>
                    <p style="clear:both;">
                    </p>
                    Trang:
            <?php
				$sql_trang=mysqli_query($connect,"select * from chitietsp");
				$count=mysqli_num_rows($sql_trang);
				$a=ceil($count/5);
				for($b=1;$b<=$a;$b++){
				echo '<a href="?trang='.$b.'">'.' '.$b.' '.'</a>';
				}
			?>