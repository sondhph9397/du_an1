<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
// lấy thông tin từ form gửi lên
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$short_desc = trim($_POST['short_desc']);
$about = trim($_POST['about']);
$featrue_image = $_FILES['featrue_image'];
$id = trim($_POST['id']);
$adults = trim($_POST['adults']);
$children = trim($_POST['children']);

// kiểm tra tài khoản có tồn tại hay không

// kiểm tra xem có quyền để thực hiện edit hay không

// validate bằng php
$nameerr = "";
$emailerr = "";
// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email

// check email đã tồn tại hay chưa
$checkEmailQuery = "select * from users where email = '$email' and id != $id";
$users = queryExecute($checkEmailQuery, true);
if($emailerr == "" && count($users) > 0){
    $emailerr = "Email đã tồn tại, vui lòng sử dụng email khác";
}

if($nameerr . $emailerr != "" ){
    header('location: ' . ADMIN_URL . "users/edit-form.php?id=$id&nameerr=$nameerr&emailerr=$emailerr");
    die;
}

// upload file
$filename = $room['featrue_image'];
if($featrue_image['size'] > 0){
    $filename = uniqid() . '-' . $featrue_image['name'];
    move_uploaded_file($featrue_image['tmp_name'], "../../public/admin/img/" . $filename);
    $filename = "public/admin/img/" . $filename;
}

if($filename==null){$updateRoomQuery = "update room_types 
    set
          name = '$name',
          status = '$status',
          short_desc = '$short_desc',
          about = '$about',
          adults = '$adults',
          children = '$children'
          where id = $id";} 
else{
    $updateRoomQuery = "update room_types 
                    set
                          name = '$name', 
                          featrue_image= '$filename',
                          status = '$status',
                          short_desc = '$short_desc',
                          about = '$about',
                          adults = '$adults',
                          children = '$children'
                          where id = $id";
}

queryExecute($updateRoomQuery, false);

header("location: " . ADMIN_URL . "rooms");
die;