<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class HomeShopModel
{
    public static function searchProduct($like): array
    {
        $sql = "SELECT * FROM Product where TenSP like '%$like%'";
        $db = DB::makeConnection()->query($sql);
        $numbe_row = DB::makeConnection()->query($sql)->num_rows;
        return [!empty($db) ? $db->fetch_all() : [], $numbe_row];
    }

    public static function searchType($id)
    {
        $query = DB::makeConnection()
            ->query("SELECT l.TenLoai,sp.MaSP,sp.Anh,sp.TenSP,sp.Gia FROM typeProducts l JOIN Product sp on sp.MaLoai=l.MaLoai WHERE l.MaLoai='" .
                $id . "'");
        return !empty($query) ? $query->fetch_all() : [];
    }

    public static function searchProducer($id)
    {
        $query = DB::makeConnection()
            ->query("SELECT nxx.TenNSX,sp.MaSP,sp.Anh,sp.TenSP,sp.Gia FROM Producer nxx JOIN Product sp on sp.MaNSX=nxx.MaNSX WHERE nxx.MaNSX='" .
                $id . "'");
        return !empty($query) ? $query->fetch_all() : [];
    }
}
