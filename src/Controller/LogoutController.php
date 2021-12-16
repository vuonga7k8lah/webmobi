<?php


namespace MyProject\Controller;


use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Core\Session;

class LogoutController
{
    public function logout()
    {
        Session::destroyAll();
        header('location:'.URL::uri('admin'));
    }
    public function logout1()
    {
        Session::destroyAll();
        header('location:'.URL::uri('home'));
    }
    public function logout2()
    {
        $id=Request::uri()[1];
        unset($_SESSION["cart"][$id]);
        header('location:'.URL::uri('cart'));
    }
}