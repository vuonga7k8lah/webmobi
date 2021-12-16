<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class OrderModel
{
    public static function selectAll($id)
    {
        $db = DB::makeConnection()->query("SELECT DISTINCT sp.TenSP,sp.Anh,dhp.price,dhp.quantity,dh.total,dh.note FROM donhang dh JOIN donhangphu dhp ON dh.id=dhp.id_donhang JOIN sanpham sp ON sp.MaSP=dhp.MaSP WHERE dh.id=" . $id . "");
        return $db;
    }

    public static function selectIdDonHang($name)
    {
        $db = DB::makeConnection()->query("SELECT dh.id FROM khachhang kh join donhang dh on dh.MaKH=kh.MaKH WHERE kh.TenKH='" . $name . "'")->fetch_assoc();
        return $db;
    }

    public static function selectPrintId($id)
    {
        $db=DB::makeConnection()->query("SELECT kh.TenKH,kh.DiaChi,kh.Sdt,sp.TenSP,dhp.quantity,dh.total,dh.note  FROM donhang dh JOIN khachhang kh ON kh.MaKH=dh.MaKH JOIN donhangphu dhp ON dhp.id_donhang=dh.id JOIN sanpham sp on sp.MaSP=dhp.MaSP WHERE dh.id='".$id."'");
        return $db->fetch_all();
    }
}