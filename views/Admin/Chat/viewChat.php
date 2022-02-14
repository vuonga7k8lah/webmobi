<?php

use MyProject\Core\URL;
//$maKH=\MyProject\Core\Request::uri()[1];
//$aMessage=\MyProject\Model\ChatModel::getAllChatAdminWithMaKH($maKH);
//var_dump($_SESSION['adminUserID']);
//var_dump($aMessage);die();
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
require_once 'views/Admin/header.php';
//<!-- Navigation -->
require_once 'views/Admin/navigation.php';
$maKH=\MyProject\Core\Request::uri()[1];
$aMessage=\MyProject\Model\ChatModel::getAllChatAdminWithMaKH($maKH);

$aDataKH=\MyProject\Model\UserModel::getAddUser($maKH);

?>
    <div id="page-wrapper">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="col-md-10 bg-white ">
                    <div class="chat-message" style="height: 500px;overflow: scroll;">
                        <ul class="chat">
                            <?php
                                foreach ($aMessage as $item):

                                    $src=json_decode($item[4],true)['avatar'];
                                    if ($item[6] == 'no'){

                            ?>
                            <li class="left clearfix">
                    	<span class="chat-img pull-left">
                    		<img src="<?=$src?:'https://bootdey.com/img/Content/user_3.jpg'?>" alt="">
                    	</span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font"><?=$item[2]?></strong>
                                        <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>
                                            <?=$item[5]?></small>
                                    </div>
                                    <p>
                                        <?=$item[3]?>
                                    </p>
                                </div>
                            </li>
                                <?php
                                    }else{
                                        ?>
                                        <li class="right clearfix">
                    	<span class="chat-img pull-right">
                    		<img src="<?=$src?:'https://bootdey.com/img/Content/user_1.jpg'?>" alt="User Avatar">
                    	</span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font"><?=$item[2]?></strong>
                                                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i><?=$item[5]?></small>
                                                </div>
                                                <p>
                                                    <?=$item[3]?>
                                                </p>
                                            </div>
                                        </li>
                                <?php
                                    }
                                    endforeach;
                                    ?>
                        </ul>
                    </div>
                    <div class="chat-box bg-white">
                        <div class="input-group">
                            <input type="hidden" name="userID" value="<?=$maKH?>">
                            <input type="hidden" name="MaNV" value="<?=$_SESSION['adminUserID']?>">
                            <input type="hidden" name="username" value="<?=$aDataKH['username']?>">
                            <input name="content"
                                   class="form-control border no-shadow no-rounded"
                                   placeholder="Type your message here">
                            <span class="input-group-btn">
            			<button class="btn btn-success no-rounded" id="send-message-admin" type="button">Send</button>
            		</span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <?php
    require_once 'views/Admin/footer.php';
}
?>
