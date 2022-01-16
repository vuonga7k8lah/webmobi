<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class OrderModel
{
    public static function selectAll($id)
    {
        $query = DB::makeConnection()->query("SELECT DISTINCT sp.TenSP,sp.Anh,dhp.price,dhp.quantity,dh.total,dh.note FROM orders dh JOIN subOrders dhp ON dh.MaDH=dhp.MaDH JOIN Product sp ON sp.MaSP=dhp.MaSP WHERE dh.MaDH=" . $id );
        return !empty($query)?$query->fetch_all():[];
    }

    public static function selectIdDonHang($userID)
    {
        $query= DB::makeConnection()->query("SELECT dh.MaDH FROM users kh join orders dh on kh.ID=dh.MaKH WHERE kh.ID='"
            . $userID . "'");
        if (!empty($query)){
            foreach ($query->fetch_all() as $id){
                $aID[]=$id[0];
            }
        }
        return !empty($query)?$aID:[];
    }

    public static function selectPrintId($id)
    {
        $db=DB::makeConnection()->query("SELECT kh.TenKH,kh.DiaChi,kh.Sdt,sp.TenSP,dhp.quantity,dh.total,dh.note  FROM donhang dh JOIN khachhang kh ON kh.MaKH=dh.MaKH JOIN donhangphu dhp ON dhp.id_donhang=dh.id JOIN sanpham sp on sp.MaSP=dhp.MaSP WHERE dh.id='".$id."'");
        return $db->fetch_all();
    }
}
