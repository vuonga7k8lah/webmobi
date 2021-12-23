<?php

namespace MyProject\Model;

use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Database\QueryBuilder;

class LoginModel
{
    public static function isLoggedIn($data)
    {

        $query = DB::makeConnection()->query("SELECT * FROM users WHERE username='" .$data['TenKH']. "'
        and password='" .$data['password']. "'
        or email='" .$data['TenKH']. "'");
        $odata=$query->fetch_assoc();
        return [($query->num_rows > 0),$odata];

    }
}
