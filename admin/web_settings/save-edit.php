<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$title_hotel = trim($_POST['title_hotel']);
$hotline = trim($_POST['hotline']);
$map_url = trim($_POST['map_url']);
$email = trim($_POST['email']);
$slogan = trim($_POST['slogan']);
$intro_youtube_url = trim($_POST['intro_youtube_url']);
$image = $_FILES['logo'];
$image1 = $_FILES['small_logo'];
$image2 = $_FILES['background_img'];
$image3= $_FILES['slogan_author'];
$id = trim($_POST['id']);
// validate bằng php

// upload file ảnh
$filename = "";
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}
$filename1 = "";
if($image1['size'] > 0){
    $filename1 = uniqid() . '-' . $image1['name'];
    move_uploaded_file($image1['tmp_name'], "../../public/admin/img/" . $filename1);
    $filename1 = "public/admin/img/" . $filename1;
}
$filename2 = "";
if($image2['size'] > 0){
    $filename2 = uniqid() . '-' . $image2['name'];
    move_uploaded_file($image2['tmp_name'], "../../public/admin/img/" . $filename2);
    $filename2 = "public/admin/img/" . $filename2;
}
$filename3 = "";
if($image3['size'] > 0){
    $filename3 = uniqid() . '-' . $image3['name'];
    move_uploaded_file($image3['tmp_name'], "../../public/admin/img/" . $filename3);
    $filename3 = "public/admin/img/" . $filename3;
}
$updateWebSettingQuery = "update web_setting 
                        set
                            name = '$name', 
                            title_hotel = '$title_hotel',
                            logo = '$filename', 
                            small_logo = '$filename1', 
                            hotline = '$hotline',
                            map_url = '$map_url',
                            email = '$email', 
                            background_img = '$filename2', 
                            slogan = '$slogan', 
                            slogan_author = '$filename3', 
                            intro_youtube_url = '$intro_youtube_url'
                         
                        where id = $id";
queryExecute($updateWebSettingQuery, false);
header("location: " . ADMIN_URL . "web_settings");
die;