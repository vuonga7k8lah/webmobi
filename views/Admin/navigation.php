<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php use MyProject\Core\URL;

        echo URL::uri('home') ?>">SHOP KMA</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo URL::uri('profile'); ?>"><i class="fa fa-user fa-fw"></i> User
                        Profile</a>
                </li>
                <!--                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo URL::uri('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>
                        Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!--                <li class="sidebar-search">-->
                <!--                    <div class="input-group custom-search-form">-->
                <!--                        <a href=""><i <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-laptop" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path fill-rule="evenodd" d="M13.5 3h-11a.5.5 0 0 0-.5.5V11h12V3.5a.5.5 0 0 0-.5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11z"/>-->
                <!--                                <path d="M0 12h16v.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5V12z"/>-->
                <!--                            </svg></i> hehe</a>-->
                <!--                    </div>-->
                <!--
                <!--                </li>-->
                <li>
                    <a href="<?php echo URL::uri('listProduct'); ?>"><i
                                class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href=""><i class="fa fa-cube fa-fw"></i> Products<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('listProduct') ?>">List Products</a>
                        </li>
                        <li>
                            <a href="<?php echo URL::uri('addProduct'); ?>">Add Products</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo URL::uri('listProducer'); ?>"><i class="fa fa-cube fa-fw"></i>Producer<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('listProducer'); ?>">List Producer</a>
                        </li>
                        <li>
                            <a href="<?php echo URL::uri('addProducer'); ?>">Add Producer</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo URL::uri('listType'); ?>"><i class="fa fa-cube fa-fw"></i>Type Product<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('listType'); ?>">List Type Product</a>
                        </li>
                        <li>
                            <a href="<?php echo URL::uri('addType'); ?>">Add Type Product</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo URL::uri('listUser'); ?>"><i class="fa fa-users fa-fw"></i> User<span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('listUser'); ?>">List User</a>
                        </li>
                        <li>
                            <a href="<?php echo URL::uri('addUser'); ?>">Add User</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="<?php echo URL::uri('listOrder'); ?>"><i class="fa fa-book fa-fw"></i>Order<span class="fa
                    arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('listOrder'); ?>">List Order</a>
                        </li>
                    </ul>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
