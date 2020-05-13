<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$short_desc = trim($_POST['short_desc']);
$about = trim($_POST['about']);
$adults = trim($_POST['adults']);
$children = trim($_POST['children']);
$featrue_image = $_FILES['featrue_image'];
$price = trim($_POST['price']);
// validate bằng php
$nameerr = "";
$short_descerr = "";
$abouterr = "";
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email
// check email đã tồn tại hay chưa

if($nameerr . $short_descerr . $abouterr != "" ){
    header('location: ' . ADMIN_URL . "rooms/add-form.php?nameerr=$nameerr&short_descerr=$short_descerr&abouterr=$abouterr");
    die;
}
// upload file ảnh
$filename = "";
if($featrue_image['size'] > 0){
    $filename = uniqid() . '-' . $featrue_image['name'];
    move_uploaded_file($featrue_image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}
$insertRoomQuery = "insert into room_types 
                          (name, featrue_image, status, price, short_desc, about, adults, children)
                    values 
                          ('$name', '$filename', '$status','$price', '$short_desc', '$about', '$adults', '$children')";
queryExecute($insertRoomQuery, false);
header("location: " . ADMIN_URL . "rooms");
die;