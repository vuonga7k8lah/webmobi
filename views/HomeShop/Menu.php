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
                <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">Order</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">About</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">Contact</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Login</a>
                    <a class="dropdown-item" href="#">Register</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo URL::uri('search'); ?>"
              method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

