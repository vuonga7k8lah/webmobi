<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/admin/profile.css">
</head>
<body>
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="http://127.0.0.1:8080/myproject/assets/ad.jpg" style="width: 250px;height: 250px;" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        Lê Hùng Vương
                    </h5>
                    <h6>
                        Đại Từ - Thái Nguyên
                    </h6>
                    <p class="proile-rating">
                        <div class="icon">
                        <img src="./assets/facebook.png" alt=""style="height: 20px;width: 20px;border-radius:50%;position: absolute;padding: 2px;">
                        </div>
                    <div style="margin: 20px;">
                        <span style="color: #00c6ff"><a href="https://www.facebook.com/le.hungvuong.96">Lê Hùng Vương</a></span>
                    </div>
                    </p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                               href="<?php use MyProject\Core\URL;

                               echo URL::uri('listProduct'); ?>" role="tab"
                               aria-controls="profile" aria-selected="false">Về Trang Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="" role="tab"
                               aria-controls="profile" aria-selected="false">
                                <audio controls autoplay loop style="width: 20px;height: 20px;">
                                    <source src="./assets/nhac.mp3">
                                </audio>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <!--                    <p>WORK LINK</p>-->
                    <!--                    <a href="">Website Link</a><br/>-->
                    <!--                    <a href="">Bootsnipp Profile</a><br/>-->
                    <!--                    <a href="">Bootply Profile</a>-->
                    <p>SKILLS</p>
                    <a href="">Humman Flag</a><br/>
                    <a href="">Planche</a><br/>
                    <a href="">Front Lever</a><br/>
                    <a href="">Back Lever</a><br/>
                    <a href=""></a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Chức Vụ:</label>
                            </div>
                            <div class="col-md-6">
                                <p>Quản Lý Hệ Thống</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Địa Chỉ Cửa Hàng:</label>
                            </div>
                            <div class="col-md-6">
                                <p>141 Chiến Thắng-Văn Quán-Hà Đông-Hà Nội</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>ShopKMA@gmail.com</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>0888888888</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Quan Điểm:</label>
                            </div>
                            <div class="col-md-6">
                                <p>Khách Hàng Là Thượng Đế :vv</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>