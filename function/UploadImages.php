<?php

function getAllFiles() {
    $allFiles = array();
    $allDirs = glob('assets/uploads'.date('d-m-Y', time()));
    foreach ($allDirs as $dir) {
        $allFiles = array_merge($allFiles, glob($dir . "/*"));
    }
    return $allFiles;
}

function updateFiles() {
    $allFiles = array();
    $allDirs = glob('assets/uploads/update'.date('d-m-Y', time()));
    foreach ($allDirs as $dir) {
        $allFiles = array_merge($allFiles, glob($dir . "/*"));
    }
    return $allFiles;
}
function uploadFilesUpdate($uploadedFiles) {
    $files = $uploadedFiles;
    $uploadPath = "./assets/uploads/update" . date('d-m-Y', time());
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
        $file = validateUploadFile($files);
        if ($file[1] != false) {
            move_uploaded_file($file[0]["tmp_name"], $uploadPath . '/' . $file[0]["name"]);
        } else {
            $errors = "The file " . basename($file[0]["name"]) . " isn't valid.";
            return $errors;
        }

}


function uploadFiles($uploadedFiles) {
    $files = $uploadedFiles;
    $uploadPath = "./assets/uploads" . date('d-m-Y', time());
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
        $file = validateUploadFile($files);
    if ($file[1] != false) {
        move_uploaded_file($file[0]["tmp_name"], $uploadPath . '/' . $file[0]["name"]);
    } else {
        $errors = "The file " . basename($file[0]["name"]) . " isn't valid.";
        return $errors;
    }

}

//Check file hợp lệ
function validateUploadFile($file) {
    //Kiểm tra xem có vượt quá dung lượng cho phép không?
    if ($file['size'] > 5 * 1024 * 1024) { //max upload is 5 Mb = 2 * 1024 kb * 1024 bite
        return false;
    }
    //Kiểm tra xem kiểu file có hợp lệ không?
    $validTypes = array("jpg", "jpeg", "png", "bmp","xls","xlsx","doc","docx");
    $fileType = explode('/',$file['type'][1]);
    if (in_array($fileType, $validTypes)) {
        return false;
    }
    return [$file,true];
}
