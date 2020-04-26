<?php
/**
 * 1. lấy id xuống
 * 2. kiểm tra xem có quyền để xóa tài khoản với id đc nhận hay không
 * 4. thực hiện câu lệnh xóa với csdl
 * 5. điều hướng về danh sách
 *
 */
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveWebQuery = "select * from web_setting where id = $id";
$removeWebQuery = "delete from web_setting where id = $id";
queryExecute($removeRoomQuery, true);
header("location: " . ADMIN_URL . "web_settings?msg=Xóa thành công");
die;

?>