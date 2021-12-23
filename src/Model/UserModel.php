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

    public static function insert($data)
    {
        $sql = sprintf(
            "INSERT INTO khachhang(%s) VALUES(%s)",
            implode(',', array_keys($data)),
            '"' . implode('","', array_values($data)) . '"');
        $oCheck = DB::makeConnection()->query($sql);
        return $oCheck;
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
        $oDelete = DB::makeConnection()->query("DELETE FROM khachhang WHERE id='" . $id . "'");
        return $oDelete;
    }

    public static function updateUser($data)
    {
        $oUpdate = DB::makeConnection()->query("UPDATE khachhang SET id='" . $data['id'] . "',username='" .
            $data['username'] . "',
        email='" . $data['email'] . "',password='" . $data['password'] . "'
         WHERE id='" . $data['id'] . "'");
        return $oUpdate;
    }

    public static function updatePass($data)
    {
        $oUpDate = DB::makeConnection()->query("UPDATE khachhang SET password='" . $data['pass'] . "' 
        WHERE MaKH='" . $data['id'] . "' ");
        return $oUpDate;
    }

}
