<?php
if(isset($_POST['dangky'])){
   $tenkhachhang=$_POST['tenkhachhang'];
   $matkhau=$_POST['matkhau'];
   $email=$_POST['email'];
   $diachi=$_POST['diachi'];
   $dienthoai=$_POST['dienthoai'];
   $sql_dangky="insert into dangky (tenkhachhang,matkhau,email,dienthoai,diachi)value('$tenkhachhang','$matkhau','$email','$dienthoai','$diachi')";
   $run_query=mysqli_query($connect,$sql_dangky);
   if($run_query){
     header('location:index.php?xem=dangnhap');
   }
   else{
	       header('location:index.php?xem=dangky.php');
   }
}
?>
<div class="dangky">
<form action="index.php?xem=dangky"method="post" enctype="multipart/form-data">

<table width="372" border="1">
  <tr>
    <td colspan="2"><div align="center">Đăng ký thành viên</div></td>
  </tr>
  <tr>
    <td width="40">Tên khách hàng</td>
    <td width="316"><input type="text"name="tenkhachhang"size="60"></td>
  </tr>
  <tr>
    <td>Mật khẩu</td>
    <td><input type="password"name="matkhau"size="60">  </td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text"name="email"size="60">  </td>
  </tr>
  <tr>
    <td>Địa chỉ</td>
    <td><input type="text"name="diachi"size="60">  </td>
  </tr>
  <tr>
    <td>Điện thoại</td>
    <td><input type="text"name="dienthoai"size="60">  </td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit"name="dangky"value="Đăng ký">
    </div></td>
  </tr>
</table>

</form>
</div>
