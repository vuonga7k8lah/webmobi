<?php

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
        <div class="register" style="height: 758px">
            <?php if (isset($_SESSION['register-error'])): ?>
                <div class="ui segment">
                    <?php echo $_SESSION['register-error']; ?>
                </div>
            <?php endif; ?>
            <div align="center" style="color:#C00;">Đăng Ký Khách Hàng</div>
            <form class="ui form" method="post" action="<?php echo URL::uri('register'); ?>">
                <div class="field">
                    <div class="field">
                        <label for="reg-username">Username</label>
                        <input id="reg-username" type="text" name="TenKH" placeholder="Username" required>
                    </div>
                    <div class="field">
                        <label for="reg-email">Email</label>
                        <input id="reg-email" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="field">
                        <label for="reg-email">Address</label>
                        <input id="reg-email" type="text" name="DiaChi" placeholder="address" required>
                    </div>
                    <div class="field">
                        <label for="reg-email">Number Phone</label>
                        <input id="reg-email" type="text" name="SDT" placeholder="Number Phone" required>
                    </div>
                    <div class="field">
                        <label for="reg-email">Sex</label>
                        <select>
                            <option value="">Gender</option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="reg-password">Password</label>
                        <input id="reg-password" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <button style="display: block;margin: 0 auto" class="ui button" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once 'views/HomeShop/Footer.php';

?>
