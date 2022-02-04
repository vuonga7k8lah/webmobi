<?php


namespace MyProject\Model;


use MyProject\Core\URL;
use MyProject\Database\DB;

class UserModel
{
    public static function isUserExists($usernameOrEmail): array
    {
        $oCheck = DB::makeConnection()->query("SELECT * FROM users WHERE username='" . $usernameOrEmail . "' 
        OR email='" . $usernameOrEmail . "'");

        return [$oCheck->num_rows > 0, $oCheck->fetch_assoc()];
    }

    public static function insert($aData)
    {
        $sql ="INSERT INTO `users`(`ID`, `username`, `email`, `password`, `role`, `DiaChi`, `sdt`, `createDate`, `info`) VALUES (null,'".$aData['username']."','".$aData['Email']."','".$aData['password']."','".$aData['role']."','".$aData['DiaChi']."','".$aData['SDT']."',null,'".$aData['info']."')";
        return DB::makeConnection()->query($sql);
    }

    public static function insertShop($aData)
    {
        $sql ="INSERT INTO `users`(`ID`, `username`, `email`, `password`, `role`, `DiaChi`, `sdt`, `createDate`, `info`) VALUES (null,'".$aData['username']."','".$aData['Email']."','".$aData['password']."','0','".$aData['DiaChi']."','".$aData['SDT']."',null,'".$aData['info']."')";
        return DB::makeConnection()->query($sql);
    }

    public static function getUsers()
    {
        $query = DB::makeConnection()->query("SELECT * FROM users");
        return !empty($query) ? $query->fetch_all() : [];
    }

    public static function getAddUser($id)
    {
        $oCheck = DB::makeConnection()->query("SELECT id,username,email,password FROM khachhang where id='" . $id .
            "'");
        return $oCheck;
    }

    public static function deleteUser($id)
    {
        return DB::makeConnection()->query("DELETE FROM users WHERE id='" . $id . "'");
    }

    public static function updateUser($aData)
    {
        $query = [];
        if (!empty($data['sex'])||!empty($data['images'][0])){

            $query[] = " info ='" . json_encode([
                'sex'=>$data['sex'],
                'avatar'=>$data['images'][0]
                ]) . "'";
        }

        if ($aData['username'] ?? '') {
            $query[] = " username ='" . $aData['username'] . "'";
        }
        if ($aData['email'] ?? '') {
            $query[] = " email ='" . $aData['email'] . "'";
        }
        if ($aData['DiaChi'] ?? '') {
            $query [] = " DiaChi = '" . $aData['DiaChi'] . "'";
        }
        if ($aData['TenSP'] ?? '') {
            $query [] = " TenSP = '" . $aData['TenSP'] . "'";
        }
        if ($aData['sdt'] ?? '') {
            $query [] = " sdt = '" . $aData['sdt'] . "'";
        }
        if ($aData['role'] ?? '') {
            $query [] = " role = '" . $aData['role'] . "'";
        }

        return DB::makeConnection()->query("UPDATE `users` SET " . implode(',', $query) .
            ",`createDate`=null WHERE ID='" . $aData['id'] . "'");
    }

    public static function updatePass($data)
    {
        $oUpDate = DB::makeConnection()->query("UPDATE khachhang SET password='" . $data['pass'] . "' 
        WHERE MaKH='" . $data['id'] . "' ");
        return $oUpDate;
    }

}
