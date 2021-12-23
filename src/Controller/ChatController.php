<?php

namespace MyProject\Controller;

class ChatController
{
    public function loadView()
    {
        require_once 'views/HomeShop/chat/viewChat.php';
    }

    public function loadViewAdminChat()
    {
        require 'views/Admin/Chat/viewChat.php';
    }
}
