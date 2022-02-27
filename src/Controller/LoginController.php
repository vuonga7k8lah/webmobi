<?php

namespace MyProject\Controller;

use MyProject\Core\Session;
use MyProject\Core\URL;
use MyProject\Model\LoginModel;
use MyProject\Model\UserModel;

class LoginController
{
    public function loadView()
    {

        include "views/login.php";
    }

    public function handleLogin()
    {
        $data = $_POST;
        $data['password'] = md5($_POST['password']);
        if (LoginModel::isLoggedIn($data)[0]) {
            Session::set('isLogin', LoginModel::isLoggedIn($data)[1]['username']);
            Session::set('currentUserID', LoginModel::isLoggedIn($data)[1]['ID']);
            if (UserModel::isUserAdminWithUserId(LoginModel::isLoggedIn($data)[1]['ID'])) {
                Session::set('login_true', 'true');
                $aUser = UserModel::getUserWithUserID($_SESSION['currentUserID']);
                Session::set('adminUserID', $aUser['ID']);
                Session::set('userRole', $aUser['role']);
            }
            header('location:' . URL::uri(''));
        } else {
            Session::set('errorLogin', 'username Or Password khong dung');
            header('location:' . URL::uri('login'));
        }
    }
}
