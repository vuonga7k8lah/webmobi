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
        $sql = "INSERT INTO `support`(`id`, `MaKH`,`MaNV`, `content`, `status`, `createDate`) VALUES (null," .
            $aData['MaKH'] .
            ",'" . $aData['MaNV'] . "','" . $aData['content'] . "','" . $aData['status'] . "',null)";
        return DB::makeConnection()->query($sql);
    }


    public static function getAllChatAdmin()
    {
        $query = DB::makeConnection()->query("SELECT DISTINCT sp.MaKh,u.email,u.username,u.DiaChi,u.sdt FROM `support` sp join users u on u.ID = sp.MaKH");
        return !empty($query) ? $query->fetch_all() : [];
    }
    public static function getAllChatAdminWithMaKH($MaKH)
    {
        $query = DB::makeConnection()->query("SELECT sp.MaKh,sp.MaNV,u.username,sp.content,u.info,sp.createDate,sp.status FROM `support` sp join users u on u.ID = sp.MaKH WHERE sp.MaKH=".$MaKH);
        return !empty($query) ? $query->fetch_all() : [];
    }
}
