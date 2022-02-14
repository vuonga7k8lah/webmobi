<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class DashboardModel
{
    public static function countProduct(): int
    {
        $query = DB::makeConnection()->query("SELECT count(MaSP) as total FROM Product");
        return !empty($query) ? ($query->fetch_assoc())['total'] : 0;
    }
    public static function countUser(): int
    {
        $query = DB::makeConnection()->query("SELECT count(ID) as total FROM users");
        return !empty($query) ? ($query->fetch_assoc())['total'] : 0;
    }

    public static function totalOrderMoney(): int
    {
        $query = DB::makeConnection()->query("SELECT SUM(Total) as total FROM orders");

        return !empty($query) ? ($query->fetch_assoc())['total'] : 0;
    }
    public static function countComment(): int
    {
        $query = DB::makeConnection()->query("SELECT DISTINCT COUNT(MaKH) as total FROM support");

        return !empty($query) ? ($query->fetch_assoc())['total'] : 0;
    }
    public static function countProducer(): int
    {
        $query = DB::makeConnection()->query("SELECT DISTINCT COUNT(MaNSX) as total FROM Producer");

        return !empty($query) ? ($query->fetch_assoc())['total'] : 0;
    }
}
