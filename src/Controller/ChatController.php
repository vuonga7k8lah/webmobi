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

    public function loadViewAdminDetailChat()
    {
        require 'views/Admin/Chat/viewChat.php';
    }

    public function handleChatAdmin()
    {
        $data = $_POST;
        $x = ChatModel::insert([
            'MaKH'    => $data['userID'],
            'MaNV'    => $data['maNV'],
            'content' => $data['content'],
            'status'  => 'yes',
        ]);
        if ($x) {
            echo "insert ok";
        } else {
            echo "insert k ok";
        }
        die();
    }

    public function handleChat()
    {
        $data = $_POST;
        $x = ChatModel::insert([
            'MaKH'    => $data['userID'],
            'MaNV'    => '0',
            'content' => $data['content'],
            'status'  => 'no',
        ]);
        if ($x) {
            echo "insert ok";
        } else {
            echo "insert k ok";
        }
        die();
    }
}
