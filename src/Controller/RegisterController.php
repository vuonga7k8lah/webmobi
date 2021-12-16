<?php

namespace MyProject\Controller;

use MyProject\Core\URL;
use MyProject\Model\RegisterModel;
use MyProject\Model\UserModel;
use MyProject\Database\QueryBuilder;
use MyProject\Core\Session;
use MyProject\Core\Redirect;

class RegisterController
{
    public function loadView()
    {
        include "views/register.php";
    }

    public function handleRegister()
    {
        $data=$_POST;
        $data['password']=md5($_POST['password']);
        if (UserModel::isUserExists($_POST['TenKH'])[0] || UserModel::isUserExists($_POST['email'])[0]) {
            Session::set('register-error', 'username or email Đã Tồn Tại');
            Redirect::to('register');
        } else {
            $userId = UserModel::insert($data);
            if ($userId) {
                Session::set('register-success','Tài Khoản Được Tạo Thành Công');
                header('location:'.URL::uri('login'));
            } else {
                Session::set('register-error', 'We could not insert this username to database');
                Redirect::to('register');
            }
        }
    }
}
