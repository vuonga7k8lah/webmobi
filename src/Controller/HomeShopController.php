<?php


namespace MyProject\Controller;


use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\CartModel;
use MyProject\Model\UserModel;

class HomeShopController
{
    public function homeView()
    {
        require_once 'views/HomeShop/Index.php';
    }

    public function cartAction()
    {
        if (isset($_POST['update_click'])) {
            $aSession = $_POST['quantity'];
            $_SESSION['cart'] = array();
            foreach ($aSession as $key => $value) {
                $_SESSION['cart'][$key] = $value;
            }
            header('location:' . URL::uri('cart'));
        } else {
            if (isset($_SESSION['isLogin'])) {

                if ($_POST['order_click']) { //Đặt hàng sản phẩm
                    if (empty($_POST['quantity'])) {
                        echo "Giỏ hàng rỗng";
                    }
                    $error = false;
                    $success = false;
                    if ($error == false && !empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                        $data = $_POST;
                        $data['MaKH'] = CartModel::selectIdKhachHang($_SESSION['isLogin'])['MaKH'];
                        $insertOrder = CartModel::insertOrder($data);
                        $data['id_donhang'] = CartModel::selectIdDonHang($data['MaKH'])['id'];
                        $adata = array();
                        foreach ($data['quantity'] as $key => $value) {
                            $data['gia'] = CartModel::selectGiaSanPham($key)['GiaBan'];
                            $data['MaSP']=(string) $key;
                            $data['quantity']=$value;
                            unset($data['order_click']);
                            unset($data['total']);
                            unset($data['note']);
                            unset($data['MaKH']);
                             $adata[]=$data;
                        }
                        $insertDonHangPhu=CartModel::insertHoaDonphu($adata);
                        $_SESSION['order']=$data['id_donhang'];
                        unset($_SESSION['cart']);
                        header('location:'.URL::uri('order'));
                    }
                }
            } else {
                Session::set('isLoginCart',"Bạn Hãy Đăng Nhập Tài Khoản Để Đặt Hàng");
                header('location:' . URL::uri('login'));
            }
        }
    }

}