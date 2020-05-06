<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getFeedback = "select * from custom_feedback where id = $id";
$feed = queryExecute($getFeedback, false);

if(!$feed){
    header("location: ".ADMIN_URL."contacts?msg=nhận xét không tồn tại");
    die;
}
$removefeedback = "delete from custom_feedback where id = $id";
queryExecute($removefeedback, false);
header("location: ".ADMIN_URL."feedback?msg=Xóa nhận xét thành công!")
?>