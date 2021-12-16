<?php


namespace MyProject\Controller;


use MyProject\Core\URL;
use MyProject\Model\UserModel;


class ForgotController
{
    public function loadview()
    {
        require_once 'views/forgotpassword.php';
    }

    public function viewRePass()
    {
        require_once 'views/ResestPassWord.php';
    }

    public function forgot()
    {
        $email = $_POST['email'];
        if (UserModel::isUserExists($email)[0]) {
            $_SESSION['id']= UserModel::isUserExists($email)[1]['MaKH'];
            header('location:'.URL::uri('repass'));

        } else {
            $_SESSION['errorps'] = 'Email Khong Ton Tai';
            header('location:' . URL::uri('forgot'));
        }
    }

    public function resertPass()
    {
        $data=$_POST;
        $data['pass']=md5($_POST['pass']);
        if (UserModel::updatePass($data)){
            $_SESSION['islogin1']='Password da cap nhat';
            header('location:'.URL::uri('login'));
        }
    }
}