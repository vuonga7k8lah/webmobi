<?php

use MyProject\Core\Session;
use MyProject\Core\URL;

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';
require_once 'views/HomeShop/Slide.php';
?>
<div class="content">
    <div class="left">
        <?php
        require_once 'views/HomeShop/left/danhsachsp.php';
        ?>
    </div>
    <div class="right">
        <div class="login1" style="height: 758px">
            <?php if (isset($_SESSION['isLoginCart'])): ?>
                <div class="ui segment" style="color: red;">
                    <?php echo $_SESSION['isLoginCart']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['errorLogin'])): ?>
                <div class="ui segment" style="color: red;">
                    <?php echo $_SESSION['errorLogin']; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['islogin1'])): ?>
                <div class="ui segment" style="color: #00c6ff">
                    <?php echo $_SESSION['islogin1']; ?>
                </div>
            <?php endif; ?>
            <div align="center" style="color:#C00;">Đăng Nhập Khách Hàng</div>
            <form class="ui form" method="POST" action="<?php echo URL::uri('login'); ?>">
                <div class="field">
                    <div class="field">
                        <label for="login-username">Username / Email</label>
                        <input id="login-username" type="text" name="TenKH" placeholder="Username" required>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <a href="<?php echo URL::uri('forgot'); ?>">Forgot Password</a>
                    </div>
                    <br>
                    <br>
                    <button class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
<?php
Session::checkReloadPage([
    'errorLogin',
    'isLoginCart',
    'islogin1',
]);
require_once 'views/HomeShop/Footer.php';

?>
