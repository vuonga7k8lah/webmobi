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
                    if (!empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                        $data = $_POST;
                        $data['MaKH'] = $_SESSION['currentUserID'];
                        $data['MaDH']=CartModel::insertOrder($data);
                        $adata = array();
                        foreach ($data['quantity'] as $key => $value) {
                            $data['gia'] = CartModel::selectGiaSanPham($key);
                            $data['MaSP']=(string) $key;
                            $data['quantity']=$value;
                            unset($data['order_click']);
                            unset($data['total']);
                            unset($data['note']);
                            unset($data['MaKH']);
                             $adata[]=$data;
                        }
                        foreach ($adata as $aItem){
                            CartModel::insertHoaDonphu($aItem);
                        }
                        $_SESSION['order']=$data['MaDH'];
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
