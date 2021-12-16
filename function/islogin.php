<?php

use MyProject\Core\URL;

function isUserLoggedIn(): bool
{
    return isset($_SESSION['isLogin']);
}

function checkUserLoginAdmin(): bool
{
    if (!isset($_SESSION['login_true'])) {
        header('location:' . URL::uri('login-view'));
    }
    return true;
}
