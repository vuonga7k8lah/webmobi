<?php


namespace MyProject\Controller;


use MyProject\Core\Request;
use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Model\AdminModel;
use MyProject\Model\OrderModel;
use MyProject\Model\StatusOrderModel;
use MyProject\Model\UserModel;

require_once './function/UploadImages.php';

class AdminController
{
    //login
    public function loginUser()
    {
        $data = $_POST;
        $data['password'] = md5($_POST['password']);
        if (AdminModel::loginUser($data)) {
            Session::set('login_true', 'true');
            $aUser = UserModel::isUserExists($data['email'])[1];
            Session::set('adminUserID', $aUser['ID']);
            Session::set('userRole', $aUser['role']);
            header('location:' . URL::uri('dashboard'));
        } else {
            Session::set('error_login', 'Email OR PASSWORD KHONG DUNG');
            header('location:' . URL::uri('admin'));
        }
    }

    public function getViewDashboard()
    {
        require_once 'views/Admin/Dashboard/Dashboard.php';
    }

    public function viewAdmin()
    {
        if (isset($_SESSION['login_true'])) {
            require_once 'views/Admin/Dashboard/Dashboard.php';
        }
        require_once 'views/Admin/Login/viewLogin.php';
    }

    public function viewProfile()
    {
        require_once 'views/Admin/AdminProfile/profileView.php';
    }

    public function getViewLoginAdmin()
    {
        require_once 'views/Admin/Login/viewLogin.php';
    }

    //Product
    public function listProductView()
    {
        require_once 'views/Admin/Product/listProductView.php';
    }

    public function updateView()
    {
        require_once 'views/Admin/Product/updateProductView.php';
    }

    public function addView()
    {
        require_once 'views/Admin/Product/addProductView.php';
    }

    public function updateProduct()
    {
        $aData = $_POST;
        $aData['images'] = json_encode($_POST['images']);
        if (AdminModel::updateProduct($aData)) {
            Session::set('success_updateProduct', 'San Pham Da Update thanh cong');
            header('location:' . URL::uri('listProduct'));
        }
    }

    public function addProduct()
    {
        $aData = $_POST;
        $aData['images'] = json_encode($_POST['images']);
        if (AdminModel::isProductExists($aData['TenSP'])) {
            Session::set('error_AddProduct', 'San Pham Da Ton Tai');
            header('location:' . URL::uri('addProduct'));
        } else {
            if (AdminModel::addProduct($aData)) {
                Session::set('success_addProduct', 'S???n Ph???m T???o Th??nh C??ng');
                header('location:' . URL::uri('listProduct'));
            }
        }
    }

    public function deleteProduct()
    {
        $id = Request::uri()[1];
        if (AdminModel::deleteProduct($id)) {
            Session::set('delete_addProduct', 'S???n Ph???m ???? X??a Th??nh C??ng');
            unset($_SESSION['success_addProduct']);
            unset($_SESSION['success_updateProduct']);
            header('location:' . URL::uri('listProduct'));
        }
    }

    //Producer
    public function listViewProducer()
    {
        require_once 'views/Admin/Producer/listViewProducer.php';
    }

    public function addViewProducer()
    {
        require_once 'views/Admin/Producer/addViewProducer.php';
    }

    public function updateViewProducer()
    {
        require_once 'views/Admin/Producer/updateProducer.php';
    }

    public function deleteProducer()
    {
        $id = Request::uri()[1];
        if (AdminModel::deleteProducer($id)) {
            Session::set('delete_Producer', 'T??n Nh?? S???n Xu???t ???? x??a ');
            unset($_SESSION['success_addProducer']);
            unset($_SESSION['error_Producer']);
            unset($_SESSION['success_updateProducer']);
            header('location:' . URL::uri('listProducer'));
        }
    }

    public function addProducer()
    {
        $data = $_POST;
        if (AdminModel::isProducerExists($data['TenNSX'])) {
            Session::set('error_Producer', 'T??n Nh?? S???n Xu???t ???? T???n T???i');
            header('location:' . URL::uri('addProducer'));
        } else {
            if (AdminModel::addProducer($data)) {
                Session::set('success_addProducer', 'Nh?? S???n Xu???t T???o Th??nh C??ng');
                header('location:' . URL::uri('listProducer'));
            }
        }
    }

    public function updateProducer()
    {
        $data = $_POST;
        if (AdminModel::updateProducer($data)) {
            Session::set('success_updateProducer', 'Nh?? S???n Xu???t ???? UPDATE');
            header('location:' . URL::uri('listProducer'));
            die();
        }
        header('location:' . URL::uri('updateProducer'));
    }

    //Type
    public function listViewType()
    {
        require_once 'views/Admin/Type/listTypeView.php';
    }

    public function addViewType()
    {
        require_once 'views/Admin/Type/addTypeView.php';
    }

    public function updateViewType()
    {
        require_once 'views/Admin/Type/updateTypeView.php';
    }

    public function deleteType()
    {
        $id = Request::uri()[1];
        if (AdminModel::deleteType($id)) {
            Session::set('delete_Type', 'T??n Lo???i ???? x??a ');
            unset($_SESSION['success_addType']);
            unset($_SESSION['error_addType']);
            unset($_SESSION['success_updateType']);
            header('location:' . URL::uri('listType'));
        }
    }

    public function addType()
    {
        $data = $_POST;
        if (AdminModel::isTypeExists($data['TenLoai'])) {
            Session::set('error_addType', 'T??n Lo???i ???? T???n T???i');
            header('location:' . URL::uri('addType'));
        } else {
            if (AdminModel::insertType($data)) {
                Session::set('success_addType', 'T??n Lo???i ???? ???????c T???o');
                header('location:' . URL::uri('listType'));
            }
        }
    }

    public function updateType()
    {
        $data = $_POST;
        if (AdminModel::updateType($data)) {
            Session::set('success_updateType', 'Lo???i ???? UPDATE');
            header('location:' . URL::uri('listType'));
        }
    }

    //UserModel
    public function listViewUser()
    {
        require_once 'views/Admin/User/listViewUser.php';
    }

    public function addViewUser()
    {
        require_once 'views/Admin/User/addViewUser.php';
    }

    public function updateViewUser()
    {
        require_once 'views/Admin/User/updateViewUser.php';
    }

    public function deleteUser()
    {
        $id = Request::uri()[1];
        if (UserModel::deleteUser($id)) {
            Session::set('delete_User', 'T??i Kho???n ???? x??a ');
            unset($_SESSION['success_updateUser']);
            unset($_SESSION['success_addUser']);
            header('location:' . URL::uri('listUser'));
        }

    }

    public function addUser()
    {
        $data = $_POST;
        $data['password'] = md5($_POST['password']);
        if (UserModel::isUserExists($_POST['Email'])[0]) {
            Session::set('error_addUser', 'T??n T??i Kho???n Ho???c Email ???? T???n T???i');
            header('location:' . URL::uri('addUser'));
        } else {
            $data['info'] = json_encode([
                'avatar' => $data['images'],
                'sex'    => $data['sex']
            ]);
            unset($data['images']);
            unset($data['sex']);
            if (UserModel::insert($data)) {
                Session::set('success_addUser', 'T??i Kho???n ???? ???????c T???o');
                header('location:' . URL::uri('listUser'));
            }
        }

    }

    public function updateUser()
    {
        $data = $_POST;
        if (UserModel::updateUser($data)) {
            Session::set('success_updateUser', 'T??i Kho???n ???? UPDATE');
            header('location:' . URL::uri('listUser'));
        }
    }

    //admin-Order
    public function listViewOrder()
    {
        require_once 'views/Admin/Order/listOrder.php';
    }

    public function handleDelivery()
    {
        if (empty($_POST['data'])) {
            return false;
        }
        $aData = explode('+', $_POST['data']);
        $x = OrderModel::updateOrder($aData[1], $aData[0]);
        var_dump($x);
        die();
        echo "ok";
        die();
    }

    public function deleteOrder()
    {
        $id = Request::uri()[1];
        $aSubIDs = OrderModel::getAllSubOrderIDWithID($id);
        foreach ($aSubIDs as $id) {
            OrderModel::deleteSubOrder($id);
        }
        if (OrderModel::deleteOrder($id)) {
            unset($_SESSION['data-order']);
            header('location:' . URL::uri('listOrder'));
        }
    }

    public function printOrder()
    {
        $id = Request::uri()[1];
        require_once "views/Admin/Order/printOrder.php";
    }

    public function updateUserInfo()
    {
        $userID = $_POST['userID'];
        $status = $_POST['status'];
        $maDH = $_POST['maDH'];
        $x = UserModel::updateInfo($userID, [
            'status' => $status,
            'maDH'   => $maDH
        ]);
        OrderModel::updateOrder($maDH, $status);
        $idStatusOrder=StatusOrderModel::getIDStatusOrderWithMaKHAndMaDH($userID,$maDH);
        $aData=[
            'status' => $status
        ];
        if ($status=='dangGiao'){
            $aData=array_merge($aData,[
                'addDate'=>'abc'
            ]);
        }else{
            $aData=array_merge($aData,[
                'endDate'=>'abc'
            ]);
        }

        StatusOrderModel::update($idStatusOrder,$aData);
        var_dump($x);
        die();
        echo 'ok';
        die();
    }
}
