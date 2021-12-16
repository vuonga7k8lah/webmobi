
<?php
if(isset($_POST['search'])){
    $search=$_POST['searchtext'];
	$sql_search="select * from chitietsp where tensp LIKE '%$search%'";
	$query_search=mysqli_query($connect,$sql_search);
}
?>
          
            	    <p style="text-align:center;color:#e10c00;padding:10px">sản phẩm tìm thấy <hr/></p>
                    <div class="sanphamall">
                       <?php 
					      if($count=mysqli_num_rows($query_search)==0){?>
                          <p style="text-align:center;color:#e10c00;padding:10px">không tìm thấy sản phẩm nào<hr/></p>
						<?php
						  }else{
						?>
                    	<ul>
                         <?php
						   while($dong_search=mysqli_fetch_array($query_search)){ 
						 ?>
                        	<li>
                            	<a href="index.php?xem=chitietsanpham&id=<?php echo $dong_search['id_sp']?>">
                            		<img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_search['hinhanh']?>" width                                     ="180" height="180"/>
                            	    <p><?php echo $dong_search['tensp']?></p>
                             		<p style="color:#f00;">Giá:<?php $dong_search['gia'] ?></p>
									<P style="color:#F00">Chi Tiết</P>   
                                 </a> 
                            </li>
                           <?php
						}
						}
						?>  
                        </ul>
                    </div>
            