<?php


namespace MyProject\Controller;


use MyProject\Core\Redirect;
use MyProject\Core\Session;
use MyProject\Model\OrderModel;

class OrderController
{
    public function orderView()
    {
        require_once 'views/HomeShop/right/order.php';
    }

    public function handleCustomDateOrder()
    {
        $from = $_POST['startDate'];
        $to = $_POST['endDate'];
        $aData = OrderModel::getOrdersWithCustomerDate($from, $to);
        Session::set('from-date', $from);
        Session::set('to-date', $to);
        Session::set('data-order', $aData);
        Redirect::to('listOrder');
    }

}
