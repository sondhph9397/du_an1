<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên;
$id = trim($_POST['id']);
$content = trim($_POST['content']);
$title = trim($_POST['title']);
$image = $_FILES['featrue_image'];
$created_at = trim($_POST['created_at']);
// kiểm tra xem tin tức có tồn tại hay không
$getNewsQuery = "select * from news where id = '$id'";
$news = queryExecute($getNewsQuery, false);
// upload file
$filename = $news['featrue_image'];
if($image['size'] > 0){
    $filename = uniqid() . '-' . $image['name'];
    move_uploaded_file($image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}

$updateNewsQuery = "update news
                    set 
                    title = '$title',
                    featrue_image = '$filename',
                    content = '$content',
                    created_at = '$created_at'
                    where id = '$id'";
queryExecute($updateNewsQuery, false);
//dd($filename    );
header("location: " . ADMIN_URL . "news");
die;