<?php

namespace MyProject\Controller;

use MyProject\Model\ChatModel;

class ChatController
{
    public function loadView()
    {
        require_once 'views/HomeShop/chat/viewChat.php';
    }

    public function loadViewAdminChat()
    {
        require 'views/Admin/Chat/listChat.php';
    }

    public function handleChat()
    {
        $data = $_POST;
       $x= ChatModel::insert([
            'MaKH'    => $data['userID'],
            'content' => $data['content'],
            'status'  => 'yes',
        ]);
    }
}
