<?php

function uploadImageMany($aData)
{
    $data = $aData['images'];
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'images/x-png', 'image/gif'];

// Kiem tra xem file upload co nam trong dinh dang cho phep
    for ($i = 0; $i < count($data['name']); $i++) {
        if (in_array(strtolower($data['type'][$i]), $allowed)) {
            // Neu co trong dinh dang cho phep, tach lay phan mo rong
            $ext = substr(strrchr($data['name'][$i], '.'), 1);
            $renamed = uniqid(rand(), true) . '.' . "$ext";
            $NameIMG[] = "./assets/uploads/" . $renamed;
            if (!move_uploaded_file($data['tmp_name'][$i], "./assets/uploads/" . $renamed)) {
                $errors[$data['name'][$i]] = "<p class='error'>Server problem</p>";
            }
            // Xoa file da duoc upload va ton tai trong thu muc tam
            if (isset($data['tmp_name'][$i]) && is_file($data['tmp_name'][$i]) &&
                file_exists($data['tmp_name'][$i])) {
                unlink($data['tmp_name'][$i]);
            }
        }
    }
    return json_encode($NameIMG);
}

function the_excerpt($text, $string = 400)
{
    $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
    if (strlen($sanitized) > $string) {
        $cutString = substr($sanitized, 0, $string);
        return substr($sanitized, 0, strrpos($cutString, ' '));

    } else {
        return $sanitized;
    }

}

function LoadAnh($data)
{
    $adata = json_decode($data, true);
    foreach ($adata as $val) {
        ?>
        <a href="<?= $val ?>"><img src="<?= $val ?>" alt=""
                                   style="width: 50px;height: 50px;float: left"></a>
        <?php
    }
}
