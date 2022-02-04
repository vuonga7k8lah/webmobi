<?php


namespace MyProject\Model;


use MyProject\Database\DB;

class OrderModel
{
    public static function selectAll($id)
    {
        $query = DB::makeConnection()
            ->query("SELECT DISTINCT sp.TenSP,sp.Anh,dhp.price,dhp.quantity,dh.total,dh.note FROM orders dh JOIN subOrders dhp ON dh.MaDH=dhp.MaDH JOIN Product sp ON sp.MaSP=dhp.MaSP WHERE dh.MaDH=" .
                $id);
        return !empty($query) ? $query->fetch_all() : [];
    }

    public static function getAllOrder()
    {
        $query = DB::makeConnection()
            ->query("SELECT hd.MaDH,kh.username,hd.DiaChi,hd.SDT,hd.total,hd.createDate FROM orders hd join users kh on hd.MaKH=kh.ID");
        return !empty($query) ? $query->fetch_all() : [];
    }

    public static function selectIdDonHang($userID): array
    {
        $query = DB::makeConnection()
            ->query("SELECT dh.MaDH FROM users kh join orders dh on kh.ID=dh.MaKH WHERE kh.ID='"
                . $userID . "'");
        if (!empty($query)) {
            foreach ($query->fetch_all() as $id) {
                $aID[] = $id[0];
            }
        }
        return !empty($query) ? $aID : [];
    }

    public static function selectPrintId($id)
    {
        $query = DB::makeConnection()
            ->query("SELECT kh.username,kh.DiaChi,kh.SDT,sp.TenSP,dhp.quantity,dh.total,dh.note  FROM orders dh JOIN users kh ON kh.ID=dh.MaKH JOIN subOrders dhp ON dhp.MaDH=dh.MaDH JOIN Product sp on sp.MaSP=dhp.MaSP WHERE dh.MaDH=" .
                $id );
        return !empty($query)?$query->fetch_all():[];
    }

    public static function getOrdersWithCustomerDate($from, $to)
    {
        $query = DB::makeConnection()
            ->query("SELECT hd.MaDH,kh.username,hd.DiaChi,hd.SDT,hd.total,hd.createDate FROM orders hd join users kh on hd.MaKH=kh.ID where hd.createDate >='" .
                $from . "' AND hd.createDate<='" . $to . "'");
        return !empty($query) ? $query->fetch_all() : [];
    }
}
