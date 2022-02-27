<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class ChatModel
{

    public static function isNoChatFeedbackByAdmin($MaKH): bool
    {
        return !empty(self::getListChatFeedback($MaKH));
    }

    public static function getListChatFeedback($MaKH)
    {
        $query = DB::makeConnection()->query("SELECT * FROM support WHERE MaNV=0 AND status='no' AND MaKH=" . $MaKH);
        return !empty($query->num_rows) ? $query->fetch_all() : [];
    }

    public static function getMaNV($MaKH)
    {
        $query = DB::makeConnection()->query("SELECT DISTINCT MaNV FROM support WHERE MaKH=" . $MaKH);
        return !empty($query->num_rows) ? $query->fetch_all() : [];
    }


    public static function isChatWithUserID($id): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM support WHERE MaKH=" . $id);
        return !empty($query->num_rows);
    }

    public static function updateUserNV($id, $MaNV)
    {
        return DB::makeConnection()->query("UPDATE support SET MaNV=" . $MaNV . " WHERE id=" . $id);
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
        $query = DB::makeConnection()
            ->query("SELECT DISTINCT sp.MaKh,u.email,u.username,u.DiaChi,u.sdt FROM `support` sp join users u on u.ID = sp.MaKH");
        return !empty($query->num_rows) ? $query->fetch_all() : [];
    }

    public static function getAllChatAdminWithMaKH($MaKH)
    {
        $query = DB::makeConnection()
            ->query("SELECT sp.MaKh,sp.MaNV,u.username,sp.content,u.info,sp.createDate,sp.status FROM `support` sp join users u on u.ID = sp.MaKH WHERE sp.MaKH=" .
                $MaKH);
        return !empty($query->num_rows) ? $query->fetch_all() : [];
    }
}
