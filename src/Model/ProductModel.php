<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class ProductModel
{
    public static function getProductsLimit($limit = 6, $page = 1)
    {
        $sql = "SELECT * FROM Product ORDER BY MaSP ASC  LIMIT " . $page . ',' . $limit;
        $query = DB::makeConnection()->query($sql);
        return !empty($query) ? $query->fetch_all() : [];
    }

    public static function getAllCountProducts()
    {
        $query = DB::makeConnection()->query("SELECT count(MaSP) as total FROM Product");
        return !empty($query) ? $query->fetch_assoc()['total'] : 0;
    }
}
