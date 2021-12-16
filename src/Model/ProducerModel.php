<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class ProducerModel
{
    public static function getAllProducer()
    {
        $query = DB::makeConnection()->query("select * from Producer");
        return !empty($query) ? $query->fetch_all() : [];
    }
}
