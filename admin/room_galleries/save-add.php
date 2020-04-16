<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$room_id = trim($_POST['room_id']);
$image = $_FILES['image'];
// validate bằng php

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}
// upload file ảnh
$filename = "";
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}
$insertRoomGalleriesQuery = "insert into room_galleries 
                          (room_id, img_url)
                    values 
                          ('$room_id', '$filename')";
queryExecute($insertRoomGalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;