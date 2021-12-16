<?php


namespace MyProject\Model;

use MyProject\Database\DB;


class AdminModel
{
    //login
    public static function loginUser($data): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM users where email='" . $data['email'] . "' and password='"
            . $data['password'] . "' AND role=2 ");
        return !empty($query) && ($query->num_rows > 0);
    }

    //Product
    public static function selectAllProduct()
    {
        return DB::makeConnection()->query("SELECT * FROM sanpham");
    }

    public static function addProduct($data)
    {
        $aValues = array_values($data);
        $aValues = '"' . implode('","', $aValues) . '"';
        $sql = sprintf('INSERT INTO sanpham(MaSP,TenSP,GiaBan,ChiTiet,MaNSX,MaLoai,Anh) VALUES(%s)', $aValues);
        return DB::makeConnection()->query($sql);
    }

    public static function selectOneProduct($id)
    {
        return DB::makeConnection()->query("SELECT * FROM sanpham where MaSP='" . $id . "'");
    }

    public static function isProductExists($tensp)
    {
        return DB::makeConnection()->query("SELECT * FROM sanpham sp JOIN nhasanxuat nxx on sp.MaNSX=nxx.MaNSX 
            JOIN loai l ON l.MaLoai=sp.MaLoai WHERE TenSP='" . $tensp . "'");
    }

    public static function deleteProduct($id)
    {
        return DB::makeConnection()->query("DELETE FROM sanpham where MaSP='" . $id . "'");
    }

    public static function updateProduct($data)
    {
        return DB::makeConnection()->query("UPDATE sanpham SET TenSP='" . $data['TenSP'] . "',GiaBan='" .
            $data['GiaBan'] . "',ChiTiet='" . $data['ChiTiet'] . "',
        MaNSX='" . $data['NSX'] . "',MaLoai='" . $data['Loai'] . "',Anh='" . $data['Images'] . "'
        Where MaSP='" . $data['id'] . "'
        ");
    }

    // Producer
    public static function selectAllProducer()
    {
        return DB::makeConnection()->query("SELECT * FROM Producer");
    }

    public static function isProducerExists($TenNSX): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM Producer where TenNSX='" . $TenNSX . "'");
        return (!empty($query) && ($query->num_rows > 0));
    }

    public static function addProducer($aData)
    {
        return DB::makeConnection()->query('INSERT INTO Producer VALUES(null,
        "' . $aData['TenNSX'] . '",
        "' . $aData['DiaChi'] . '",
        "' . $aData['SDT'] . '",
        null)');
    }

    public static function selectOneProducer($id)
    {
        return DB::makeConnection()->query("SELECT * FROM Producer where MaNSX='" . $id . "'");
    }

    public static function updateProducer($aData)
    {
        $query = [];
        if ($aData['TenNSX'] ?? '') {
            $query[] = " TenNSX ='" . $aData['TenNSX'] . "'";
        }
        if ($aData['DiaChi'] ?? '') {
            $query[] = " DiaChi ='" . $aData['DiaChi'] . "'";
        }
        if ($aData['SDT'] ?? '') {
            $query [] = " SDT = '" . $aData['SDT'] . "'";
        }

        return DB::makeConnection()->query("UPDATE `Producer` SET " . implode(',', $query) .
            ",`createDate`=null WHERE MaNSX='" . $aData['id'] . "'");
    }

    public static function deleteProducer($id)
    {
        return DB::makeConnection()->query("DELETE FROM Producer where MaNSX='" . $id . "'");
    }

    //Type
    public static function selectAllType()
    {
        return DB::makeConnection()->query("SELECT * FROM typeProducts");
    }

    public static function selectOneType($id)
    {
        return DB::makeConnection()->query("SELECT * FROM typeProducts WHERE MaLoai='" . $id . "'");
    }

    public static function isTypeExists($TenLoai): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM typeProducts where TenLoai='" . $TenLoai . "'");
        return (!empty($query) && ($query->num_rows > 0));
    }

    public static function insertType($data)
    {
        return DB::makeConnection()->query("INSERT INTO typeProducts value (null ,'" .
            $data['TenLoai'] . "',null)");
    }

    public static function updateType($data)
    {
        return DB::makeConnection()->query("UPDATE typeProducts SET TenLoai='" . $data['TenLoai'] . "' where MaLoai='" .
            $data['id'] . "'");
    }

    public static function deleteType($id)
    {
        return DB::makeConnection()->query("DELETE FROM typeProducts where MaLoai='" . $id . "'");
    }

    //UserModel
    public static function selectAllUser()
    {
        return DB::makeConnection()->query('SELECT * FROM khachhang');
    }

    public static function selectOneUser($id)
    {
        return DB::makeConnection()->query("SELECT * FROM khachhang where MaKH='" . $id . "'")->fetch_assoc();
    }

    public static function updateUser($data)
    {
        return DB::makeConnection()->query("UPDATE khachhang SET TenKH='" . $data['TenKH'] . "', Email='" .
            $data['Email'] . "', DiaChi='" . $data['DiaChi'] . "',Sdt='" . $data['SDT'] . "'where MaKH='" .
            $data['MaKH'] . "'");
    }

    public static function deleteUser($id)
    {
        return DB::makeConnection()->query("DELETE FROM khachhang where MaKH='" . $id . "'");
    }

    //Order
    public static function selectAllOrder()
    {
        return DB::makeConnection()
            ->query("SELECT dh.id,kh.TenKH,kh.DiaChi,kh.Sdt,dh.created_at FROM donhang dh JOIN khachhang kh ON dh.MaKH=kh.MaKH")
            ->fetch_all();
    }

    public static function deleteOrder($id)
    {
        return DB::makeConnection()->query("DELETE FROM donhang where id=" . $id . "");
    }


}
