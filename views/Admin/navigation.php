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
            <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
<!--                    <a href="--><?php //echo URL::uri('profile'); ?><!--profile"><i class="fa fa-user fa-fw"></i> User-->
<!--                        Profile</a>-->
                                        <a href=""><i class="fa fa-user fa-fw"></i> User
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
                <li>
                    <a href="<?php echo URL::uri('dashboard'); ?>"><i
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
                </li>
                <li>
                    <a href="<?php echo URL::uri('listOrder'); ?>"><i class="fa fa-book fa-fw"></i>Live Chat<span
                                class="fa
                    arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo URL::uri('admin-chat'); ?>">Live Chat</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
