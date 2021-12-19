<?php


namespace MyProject\Model;

use MyProject\Database\DB;


class AdminModel
{
    //login
    public static function loginUser($data): bool
    {
        $query = DB::makeConnection()->query("SELECT * FROM users where email='" . $data['email'] . "' and password='"
            . $data['password'] . "' AND role in(2,3)");
        return !empty($query) && ($query->num_rows > 0);
    }

    //Product
    public static function selectAllProduct()
    {
        return DB::makeConnection()->query("SELECT * FROM sanpham");
    }

    public static function addProduct($aData)
    {
        $sql
            = "INSERT INTO `Product`(`MaSP`, `MaNSX`, `MaLoai`, `TenSP`, `ChiTiet`, `Gia`, `Anh`, `createDate`) VALUES (null,'" .
            $aData['MaNSX'] . "','" . $aData['MaLoai'] . "','" . $aData['TenSP'] . "','" . $aData['ChiTiet'] . "','" .
            $aData['Gia'] . "','" . $aData['images'] . "',null)";
        return DB::makeConnection()->query($sql);
    }

    public static function selectOneProduct($id)
    {
        return DB::makeConnection()->query("SELECT * FROM Product where MaSP='" . $id . "'");
    }

    public static function isProductExists($tensp)
    {
        $query = DB::makeConnection()->query("SELECT * FROM Product sp JOIN nhasanxuat nxx on sp.MaNSX=nxx.MaNSX 
            JOIN loai l ON l.MaLoai=sp.MaLoai WHERE TenSP='" . $tensp . "'");
        return (!empty($query) && $query->num_rows > 0);
    }

    public static function deleteProduct($id)
    {
        return DB::makeConnection()->query("DELETE FROM Product where MaSP='" . $id . "'");
    }

    public static function updateProduct($aData)
    {

        $query = [];
        if ($aData['TenSP'] ?? '') {
            $query[] = " TenSP ='" . $aData['TenSP'] . "'";
        }
        if ($aData['MaNSX'] ?? '') {
            $query[] = " MaNSX ='" . $aData['MaNSX'] . "'";
        }
        if ($aData['MaLoai'] ?? '') {
            $query [] = " MaLoai = '" . $aData['MaLoai'] . "'";
        }
        if ($aData['TenSP'] ?? '') {
            $query [] = " TenSP = '" . $aData['TenSP'] . "'";
        }
        if ($aData['ChiTiet'] ?? '') {
            $query [] = " ChiTiet = '" . $aData['ChiTiet'] . "'";
        }
        if ($aData['Gia'] ?? '') {
            $query [] = " Gia = '" . $aData['Gia'] . "'";
        }
        if ($aData['images'] ?? '') {
            $query [] = " Anh = '" . $aData['images'] . "'";
        }

        return DB::makeConnection()->query("UPDATE `Product` SET " . implode(',', $query) .
            ",`createDate`=null WHERE MaSP='" . $aData['id'] . "'");
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
