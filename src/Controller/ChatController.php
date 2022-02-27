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

        if (ChatModel::isNoChatFeedbackByAdmin($data['userID'])) {
            $aUserID = ChatModel::getListChatFeedback($data['userID']);
            foreach ($aUserID as $item) {
                ChatModel::updateUserNV($item[0], $data['maNV']);
            }
        }

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
        $maNV=0;
//        if (ChatModel::isNoChatFeedbackByAdmin($data['userID']))
//        {
//            $maNV = ChatModel::
//        }
        if (empty($data['content'])){
            echo "please enter the content";
        }else{
            $x = ChatModel::insert([
                'MaKH'    => $data['userID'],
                'MaNV'    => 0,
                'content' => $data['content'],
                'status'  => 'no',
            ]);
            if ($x) {
                echo "insert ok";
            } else {
                echo "insert k ok";
            }
        }
        die();
    }
}
