<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class TypeModel
{
    public static function getAllType()
    {
        $query = DB::makeConnection()->query("select * from typeProducts");
        return !empty($query) ? $query->fetch_all() : [];
    }
}
