<?php
use MyProject\Core\Request;
use MyProject\Core\URL;
use MyProject\Model\AdminModel;
if (!isset($_SESSION['login_true'])) {
    header('location:' . URL::uri('admin'));
} else {

    require_once 'views/Admin/header.php';
    require_once 'views/Admin/navigation.php';
    $id = Request::uri()[1];
    $aUser = AdminModel::selectOneUser($id);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thành Viên
                        <small>Sửa</small>
                    </h1>
                </div>

                <!-- /.col-lg-12 -->
                <!--                <div class="col-lg-7" style="padding-bottom:120px">-->

                <form action="<?php echo \MyProject\Core\URL::uri('updateUser'); ?>" method="POST">
                    <input name="id" type="hidden" value="<?=$aUser["ID"]?>"/>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="form-control" name="username" value="<?=$aUser["username"]?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" value="<?=$aUser["email"]?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" name="DiaChi" value="<?=$aUser["DiaChi"]?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input class="form-control" name="sdt" value="<?=$aUser["sdt"]?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <?php
                        $aInfo=json_decode($aUser['info'],true);
                        $sex=$aInfo['sex'];
                        $aOption=[
                          '0'=>'Male',
                          '1'=>'Female'
                        ];
                        ?>
                        <select class="form-control" name="sex">
                            <?php
                            foreach ($aOption as $key=>$value){
                                ?>
                                <option <?=($key==$sex)?'SELECTED':''?> value="<?=$key?>"><?=$value?></option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Vai Trò</label>
                        <select class="form-control" name="role">
                            <option <?=(0==$aUser['role'])?'SELECTED':''?> value="0">Khách Hàng</option>
                            <?php if(isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 2))
                            {
                                ?>
                                <option <?=(1 == $aUser['role']) ? 'SELECTED' : ''?> value="1">Quản Lý</option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="file" id="imagesAvatarUpdate" name="images" data-allow-reorder="true"
                               data-max-file-size="3MB" data-max-files="5">
                        <?php
                            $preview = '<img src="' . $aInfo['avatar'] . '" width="200px;" height="200px">';
                            $inputIMG = '<input name="images[]" type="hidden" value="' . $aInfo['avatar'] . '">';
                        ?>
                        <div id="previewAvatarUpdate" style="margin-top: 10px"><?= $preview ?></div>
                        <div id="inputIMGAvatarUpdate"><?= $inputIMG ?></div>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Thành Viên</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php
    require_once 'views/Admin/footer.php';
}
