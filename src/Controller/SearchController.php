<?php


namespace MyProject\Controller;


use MyProject\Core\Request;

class SearchController
{
    public function searchProduct()
    {
        require_once 'views/HomeShop/right/searchViewProduct.php';
    }
    public function searchType()
    {
        $id=Request::uri()[1];
        require_once 'views/HomeShop/right/searchViewType.php';
    }
    public function searchProducer()
    {
        $id=Request::uri()[1];
        require_once 'views/HomeShop/right/searchViewProducer.php';
    }

}