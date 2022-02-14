<?php

use MyProject\Core\URL;

if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {
    require_once 'views/Admin/header.php';
//<!-- Navigation -->
    require_once 'views/Admin/navigation.php';
    $productNumber = \MyProject\Model\DashboardModel::countProduct();
    $totalMoney = \MyProject\Model\DashboardModel::totalOrderMoney();
    $countUser = \MyProject\Model\DashboardModel::countUser();
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$productNumber?></div>
                                    <div>Product Number</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=URL::uri('listProduct')?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Product Sold</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$countUser?></div>
                                    <div>Sum User</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=URL::uri('listUser')?>">
                            <div class="panel-footer">
                                <span class="pull-left">View list User</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dollar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=Money($totalMoney)?></div>
                                    <div>Tổng Thu Nhập</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=URL::uri('listOrder')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Xem Danh Sách Đơn</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=\MyProject\Model\DashboardModel::countComment()?></div>
                                    <div>Phản hồi</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=URL::uri('admin-chat')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Danh sách phản hồi</span>
                                <span class="pull-right"><i class="fas fa fa-newspaper-o"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=\MyProject\Model\DashboardModel::countProducer()?></div>
                                    <div>Nhà Sản Xuất</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?=URL::uri('listProducer')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Danh sách nhà sản xuất</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <?php

    require_once 'views/Admin/footer.php';
}
?>
