<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();

$content = trim($_POST['content']);
$title = trim($_POST['title']);
$featrue_image = $_FILES['featrue_image'];
$created_at = trim($_POST['created_at']);


// upload file ảnh
$filename = $news['featrue_image'];
if($featrue_image['size'] > 0){
    $filename = uniqid() . '-' . $featrue_image['name'];
    move_uploaded_file($featrue_image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}
$insertNewsQuery = "insert into news
                          (title, featrue_image, content, created_at)
                    values
                          ('$title', '$filename ', '$content', '$created_at')";
//dd($featrue_image);
queryExecute($insertNewsQuery, false);
header("location: " . ADMIN_URL . "news");
die;
