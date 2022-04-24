<?php


namespace MyProject\Controller;


use Exception;
use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Database\DB;
use MyProject\Model\CartModel;
use MyProject\Model\StatusOrderModel;
use MyProject\Model\UserModel;

class HomeShopController
{
    public function homeView()
    {
        require_once 'views/HomeShop/Index.php';
    }

    /**
     * @throws Exception
     */
    public function cartAction()
    {
        if (isset($_POST['update_click'])) {
            $aSession = $_POST['quantity'];
            $_SESSION['cart'] = [];
            foreach ($aSession as $key => $value) {
                $_SESSION['cart'][$key] = $value;
            }
            header('location:' . URL::uri('cart'));
        } else {
            if (isset($_SESSION['isLogin'])) {

                if ($_POST['order_click']) { //Đặt hàng sản phẩm
                    try {
                        if (empty($_POST['quantity'])) {
                            echo "Giỏ hàng rỗng";
                        }
                        $error = false;
                        $success = false;
                        try {
                            $aError = [];
                            if (empty($_POST['DiaChi'])) {
                                $aError[] = 'Hãy nhập địa chỉ để đặt hàng';
                            } else {
                                Session::set('DiaChi', $_POST['DiaChi']);
                            }
                            if (empty($_POST['SDT'])) {
                                $aError[] = 'Hãy nhập Số Điện Thoại để đặt hàng';
                            } else {
                                Session::set('DiaChi', $_POST['DiaChi']);
                            }
                            if (empty($_POST['note'])) {
                                $aError[] = 'Hãy note để đặt hàng';
                            } else {
                                Session::set('note', $_POST['note']);
                            }
                            if (!empty($aError)) {
                                foreach ($aError as $item) {
                                    throw new Exception($item);
                                }
                            }
                        } catch (Exception $exception) {
                            Session::set('ErrorCart', $exception->getMessage());
                            header('location:' . URL::uri('cart'));
                            die();
                        }
                        Session::destroy('note');
                        Session::destroy('DiaChi');
                        Session::destroy('SDT');
                        if (!empty($_POST['quantity'])) { //Xử lý lưu giỏ hàng vào db
                            $data = $_POST;
                            $data['MaKH'] = $_SESSION['currentUserID'];
                            $data['MaDH'] = CartModel::insertOrder($data);
                            if (!empty($data['MaDH'])) {
                                $status=StatusOrderModel::insert([
                                    'MaKH' => $data['MaKH'],
                                    'MaDH' => $data['MaDH'],
                                    'status' => 'chuanBi'
                                ]);
                            }else{
                                throw new Exception('Error crate order');
                            }
                            $adata = [];
                            foreach ($data['quantity'] as $key => $value) {
                                $data['gia'] = CartModel::selectGiaSanPham($key);
                                $data['MaSP'] = (string)$key;
                                $data['quantity'] = $value;
                                unset($data['order_click']);
                                unset($data['total']);
                                unset($data['note']);
                                unset($data['MaKH']);
                                $adata[] = $data;
                            }

                            foreach ($adata as $aItem) {
                                CartModel::insertHoaDonphu($aItem);
                            }
                            $_SESSION['order'] = $data['MaDH'];
                            unset($_SESSION['cart']);
                            header('location:' . URL::uri('order'));
                        }
                    }catch (Exception $exception){
                        Session::set('errorOrder',$exception->getMessage());
                        header('location:' . URL::uri('cart'));
                    }
                }
            } else {
                Session::set('isLoginCart', "Bạn Hãy Đăng Nhập Tài Khoản Để Đặt Hàng");
                header('location:' . URL::uri('login'));
            }
        }
    }

}
