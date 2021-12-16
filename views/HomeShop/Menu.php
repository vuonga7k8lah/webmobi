<div class="menu">
    <ul >
        <li ><i class="fas fa-home"></i><a href="<?php echo \MyProject\Core\URL::uri('home');?>">TRANG CHỦ</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('home');?>">SẢN PHẨM</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('register');?>">ĐĂNG KÝ</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('login');?>">ĐĂNG NHẬP</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('cart');?>">GIỎ HÀNG</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('order');?>">ĐƠN HÀNG</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('about');?>">GIỚI THIỆU</a></li>
        <li><a href="<?php echo \MyProject\Core\URL::uri('logout1');?>">ĐĂNG XUẤT</a></li>

        <form action="<?php echo \MyProject\Core\URL::uri('search');?>"method="post" enctype="multipart/form-data">
            <div class="searchform">
                <input type="text"id="searchf"name="search" placeholder="Search..."/>
                <input type="submit" value="search"/>
            </div>
        </form>

    </ul>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-home"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="<?php echo \MyProject\Core\URL::uri('search');?>"
                  method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

</div>
