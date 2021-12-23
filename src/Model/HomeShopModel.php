<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class HomeShopModel
{
    public static function searchProduct($like): array
    {
        $sql = "SELECT * FROM Product where TenSP like '%$like%'";
        $db = DB::makeConnection()->query($sql)->fetch_all();
        $numbe_row = DB::makeConnection()->query($sql)->num_rows;
        return [$db, $numbe_row];
    }

    public static function searchType($id)
    {
        return DB::makeConnection()->query("SELECT l.TenLoai,sp.MaSP,sp.Anh,sp.TenSP,sp.GiaBan FROM loai l JOIN sanpham sp on sp.MaLoai=l.MaLoai WHERE l.MaLoai='".$id."'");
    }
    public static function searchProducer($id)
    {
        return DB::makeConnection()->query("SELECT nxx.TenNSX,sp.MaSP,sp.Anh,sp.TenSP,sp.GiaBan FROM nhasanxuat nxx JOIN sanpham sp on sp.MaNSX=nxx.MaNSX WHERE nxx.MaNSX='".$id."'");
    }
}
