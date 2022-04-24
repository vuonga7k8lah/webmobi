<?php

namespace MyProject\Model;

use MyProject\Database\DB;

class StatusOrderModel
{
    public static function insert($aData)
    {
        $connect = DB::makeConnection();
        $query
            = $connect->query("INSERT INTO `statusOrder`(`id`, `MaKH`, `MaDH`, `status`, `startDate`, `addDate`, `endDate`) VALUES (null ," .
            $aData['MaKH'] . "," . $aData['MaDH'] . ",'" . $aData['status'] . "',null,null,null)");
        return !empty($query) ? $connect->insert_id : 0;
    }

    public static function delete($id)
    {
        return DB::makeConnection()->query("DELETE FROM `statusOrder` WHERE id=" . $id);
    }

    public static function getAll()
    {
        $query = DB::makeConnection()->query("SELECT * FROM `statusOrder`");
        return !empty($query->num_rows) ? $query->fetch_all() : [];
    }

    public static function getWithId($id): ?array
    {
        $query = DB::makeConnection()->query("SELECT * FROM `statusOrder` WHERE id=" . $id);
        return !empty($query->num_rows) ? $query->fetch_assoc() : [];
    }

    public static function update($id, $aData)
    {
        $query = [];
        if ($aData['status'] ?? '') {
            $query[] = " status ='" . $aData['status'] . "'";
        }
        if ($aData['endDate'] ?? '') {
            $query [] = " endDate =  null";
        }
        if ($aData['addDate'] ?? '') {
            $query [] = " addDate = null";
        }
        if (isset($aData['startDate'])) {
            $query [] = " startDate = null";
        }
        $sql = "UPDATE `statusOrder` SET " . implode(',', $query) . " WHERE id='" . $id . "'";
        return DB::makeConnection()->query($sql);
    }

    public static function getIDStatusOrderWithMaKHAndMaDH($MaKH, $MaDH)
    {
        $query = DB::makeConnection()->query("SELECT id FROM statusOrder WHERE MaKH = " . $MaKH . " AND MaDH=" . $MaDH);
        return !empty($query->num_rows) ? $query->fetch_assoc()['id'] : 0;
    }
}
