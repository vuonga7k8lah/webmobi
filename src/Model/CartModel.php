<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class CartModel
{
    public static function selectOrder($data)
    {
        $sql = "SELECT * FROM donhang WHERE id IN (" . implode(",", array_keys($_POST['quantity'])) . ")";
        $hoadon = DB::makeConnection()->query($sql);
        return $$hoadon;
    }

    public static function insertOrder($data)
    {

        $connect = DB::makeConnection();
        $sql = "INSERT INTO `orders`(`MaDH`, `MaKH`, `Note`, `DiaChi`, `Total`, `SDT`, `createDate`) values (null,'" . $data['MaKH'] . "','" . $data['note'] . "','" . $data['DiaChi'] .
            "','" . $data['total'] . "','" . $data['SDT'] . "',null)";
        return $connect->query($sql) ? $connect->insert_id : 0;
    }

    public static function selectIdKhachHang($name)
    {
        $id = DB::makeConnection()->query("SELECT MaKH FROM khachhang where TenKH='" . $name . "'")->fetch_assoc();
        return $id;
    }

    public static function selectIdDonHang($MaKH)
    {
        $id = DB::makeConnection()
            ->query("SELECT id FROM donhang dh join khachhang kh on dh.MaKH=kh.MaKH WHERE kh.MaKH='" . $MaKH . "'")
            ->fetch_assoc();
        return $id;
    }

    public static function selectGiaSanPham($id): int
    {
        $query=DB::makeConnection()->query("SELECT Gia FROM Product where MaSP='" . $id . "'");
        return !empty($query)?$query->fetch_assoc()['Gia']:0;
    }

    public static function insertHoaDonphu($aData)
    {
        $sql = "INSERT INTO `subOrders`(`MaDHP`, `MaDH`, `MaSP`, `quantity`, `price`, `status`, `createDate`) VALUES (null,'".$aData['MaDH']."','".$aData['MaSP']."','".$aData['quantity']."','".$aData['gia']."','',null)";
        return DB::makeConnection()->query($sql);
    }

}
