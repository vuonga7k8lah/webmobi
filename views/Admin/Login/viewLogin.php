<?php

use MyProject\Core\Session;
use MyProject\Core\URL;

require_once 'views/Admin/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <?php if (isset($_SESSION['error_login'])): ?>
                    <div class="alert-danger">
                        <?php echo $_SESSION['error_login']; ?>
                    </div>
                <?php endif; ?>
                <div class="panel-body">
                    <form role="form" action="<?php echo URL::uri('login-admin'); ?>" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Session::checkReloadPage([
    'error_login'
]);
require_once 'views/Admin/footer.php';
?>
