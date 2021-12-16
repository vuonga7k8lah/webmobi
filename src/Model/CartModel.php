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
        $sql = "INSERT INTO donhang values (null,'" . $data['MaKH'] . "','" . $data['note'] . "','" . $data['total'] . "',null)";
        $hoadon = DB::makeConnection()->query($sql);
        return $hoadon;
    }

    public static function selectIdKhachHang($name)
    {
        $id = DB::makeConnection()->query("SELECT MaKH FROM khachhang where TenKH='" . $name . "'")->fetch_assoc();
        return $id;
    }

    public static function selectIdDonHang($MaKH)
    {
        $id = DB::makeConnection()->
        query("SELECT id FROM donhang dh join khachhang kh on dh.MaKH=kh.MaKH WHERE kh.MaKH='" . $MaKH . "'")->fetch_assoc();
        return $id;
    }

    public static function selectGiaSanPham($id)
    {
        $id = DB::makeConnection()->query("SELECT GiaBan FROM sanpham where MaSP='" . $id . "'")->fetch_assoc();
        return $id;
    }

    public static function insertHoaDonphu($data)
    {
        $aValue="";
        foreach ($data as $key => $value) {
            $aValues = array_values($value);
            $aValue .= '("' . implode('","', $aValues) . '")';
            if($key != (count($data)-1)){
                $aValue .= ",";
            }
        }
        $sql = sprintf('INSERT INTO donhangphu(quantity,id_donhang,price,MaSP) VALUES %s', $aValue);
        $insert=DB::makeConnection()->query($sql);
        return $insert;
    }

}