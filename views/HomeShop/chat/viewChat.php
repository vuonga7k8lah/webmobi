<?php

use MyProject\Core\Redirect;
use MyProject\Model\ChatModel;

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';

$aDataKH=\MyProject\Model\UserModel::getUserWithUserID($_SESSION['currentUserID']);
$src=!empty($aDataKH['info'])?json_decode($aDataKH['info'],true)['avatar']:'';
?>

    <main class="content">
        <?php
        if (!isset($_SESSION['isLogin'])) {
            Redirect::to('login');
        } else {
            ?>
            <div class="container">
                <h1 class="h3 mb-3" style="text-align: center">Contact Shop</h1>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card chat-app">
                            <div class="chat">
                                <div class="chat-header clearfix">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                <img    style="width: 50px;height: 50px"
                                                        src="https://bootdey.com/img/Content/user_3.jpg"
                                                     alt="avatar">
                                            </a>
                                            <div class="chat-about">
                                                <h5 class="m-b-0"><?=$aDataKH['username']?></h5>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 hidden-sm text-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-history">
                                    <ul class="m-b-0">
                                        <?php
                                        $aDataMessage = ChatModel::getAllChatAdminWithMaKH($_SESSION['currentUserID']);
                                        if (!empty($_SESSION['currentUserID'])) {
                                            foreach ($aDataMessage as $item) {
                                                $src =!empty($item[4])?json_decode($item[4], true)['avatar']:'';
                                                if ($item[6] != 'no') {
                                                    ?>
                                                    <li class="clearfix">
                                                        <div class="message-data text-right">
                                                            <span class="message-data-time"><?= date('G:i A',
                                                                    strtotime($item[5])) ?>,<b>Admin: <?=ucfirst($item[2]) ?></b></span>
                                                            <img style="width: 50px;height: 50px" src="https://bootdey.com/img/Content/user_3.jpg"
                                                                 alt="avatar">
                                                        </div>
                                                        <div class="message other-message float-right">
                                                            <?= $item[3] ?>
                                                        </div>
                                                    </li>
                                                <?php } else { ?>
                                                    <li class="clearfix">
                                                        <div class="message-data">
                                                            <span class="message-data-time"><?= date('G:i A',
                                                                    strtotime($item[5])) ?> </span>
                                                        </div>
                                                        <div class="message my-message">   <?= $item[3] ?></div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="chat-message clearfix">
                                    <div class="input-group mb-0">
                                        <div class="input-group-prepend">
                                            <button type="submit" id="send-message" class="input-group-text"><i
                                                        class="fa fa-send"></i></button>
                                        </div>
                                        <input type="hidden" name="userID" value="<?= $_SESSION['currentUserID'] ?>">
                                        <input type="hidden" name="username" value="<?= $_SESSION['isLogin'] ?>">
                                        <input type="text" name="content" class="form-control"
                                               placeholder="Enter text here...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </main>
    <br>
<?php
require_once 'views/HomeShop/Footer.php';
