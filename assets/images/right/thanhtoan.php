<?php
     session_start();
	 if(isset($_POST['dangnhap'])){
	 	$tentaikhoan=$_POST['tentaikhoan'];
		$matkhau=$_POST['matkhau'];
		$sql_dangnhap="select * from dangky where tenkhachhang='$tentaikhoan' and matkhau='$matkhau' limit 1";
		$run_dangnhap=mysqli_query($connect,$sql_dangnhap);
		$count_dangnhap=mysqli_num_rows($run_dangnhap);
		if($count_dangnhap==0){
		     echo '<script>alert("sai tài khoản hoặc mật khẩu")</script>';
		}
		else{
			$_SESSION['dangnhap']=$tentaikhoan;
			header('location:index.php?xem=giohang');
		}
	 }
?>
<div class="formdangnhap">
<form action="" method="post" enctype="multipart/form-data">
<table width="297" border="1">
  <tr>
    <td colspan="2"><div align="center">Đăng nhập thành viên</div></td>
  </tr>
  <tr>
    <td width="92"><div align="right">Tên tài khoản</div></td>
    <td width="189"> <input type="text"name="tentaikhoan" size="30"></td>
  </tr>
  <tr>
    <td height="58"><div align="center">Mật khẩu</div></td>
    <td><input type="password"name="matkhau" size="30"></td>
  </tr>
  <tr>
    <td height="72" colspan="2"><div align="center">
      <input type="submit" value="Đăng nhập" name="dangnhap">
    </div></td>
  </tr>
</table>
</form>
</div>