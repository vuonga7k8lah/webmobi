<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class ChatModel
{
    public static function isChatWithUserID($id): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM support WHERE MaKH=" . $id);
        return !empty($query);
    }

    public static function insert($aData)
    {
        $sql = "INSERT INTO `support`(`id`, `MaKH`, `content`, `status`, `createDate`) VALUES (null," . $aData['MaKH'] .
            ",'" . $aData['content'] . "','" . $aData['status'] . "',null)";
        return DB::makeConnection()->query($sql);
    }

}
