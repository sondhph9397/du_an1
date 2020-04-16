<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$room_id = trim($_POST['room_id']);
$image = $_FILES['image'];
$id = trim($_POST['id']);
// kiểm tra xem tin tức có tồn tại hay không
$getRoomGalleriesQuery = "select * from room_galleries where id = '$id'";
$galleries = queryExecute($getRoomGalleriesQuery, false);
// upload file
$filename = $galleries['img_url'];
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}

$updateRoomgalleriesQuery = "update room_galleries
                    set   
                    room_id ='$room_id',
                    img_url = '$filename'
                    where id = '$id'";

queryExecute($updateRoomgalleriesQuery, false);
header("location: " . ADMIN_URL . "room_galleries");
die;