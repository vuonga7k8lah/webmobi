<?php use MyProject\Core\URL; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-start sticky-top" id="my-menu">
    <a class="navbar-brand" href="<?php echo URL::uri('home'); ?>"><i
                class="fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-home"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" data-spy="scroll" data-target="#my-menu" >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?=URL::uri('order'); ?>">Order</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?=URL::uri('cart'); ?>">Cart</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?=URL::uri('about'); ?>">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="<?=URL::uri('chat'); ?>">Contact</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$_SESSION['isLogin']??'Account'?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if (!isset($_SESSION['isLogin'])):?>
                    <a class="dropdown-item" href="<?=URL::uri('login'); ?>">Login</a>
                    <a class="dropdown-item" href="<?=URL::uri('register'); ?>">Register</a>
                    <?php endif;?>
                    <?php
                    if (isset($_SESSION['login_true'])){
                        ?>
                        <a class="dropdown-item" target="_blank" href="<?=URL::uri('dashboard'); ?>">Manage Admin</a>
                    <?php
                    }
                    ?>
                    <?php if (isset($_SESSION['isLogin'])):?>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=URL::uri('logout1'); ?>">Logout</a>
                    <?php endif;?>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo URL::uri('search'); ?>"
              method="post">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

