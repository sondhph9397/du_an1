<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone_number = trim($_POST['phone_number']);
$address = trim($_POST['address']);
$message = trim($_POST['message']);
$adult = trim($_POST['adult']);
$children = trim($_POST['children']);
$total_price = trim($_POST['total_price']);
// validate bằng php
$nameerr = "";
$emailerr = "";
$phone_numbererr = "";
$messageerr = "";
// check name
if (strlen($name) < 2 || strlen($name) > 191) {
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check email
if (strlen($email) == 0) {
    $emailerr = "Yêu cầu nhập email!";
}
if ($emailerr == "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailerr = "Không đúng định dạng email";
}

// check phone_number
if (strlen($phone_number) < 9 && strlen($phone_number) > 11) {
    $phone_numbererr = "Yêu cầu nhập số điện thoại từ 9 đến 10 chữ số";
}

// check message
if (strlen($message) < 2) {
    $messageerr = "Yêu cầu nhập nội dung phản hồi, không được để trống";
}

if ($nameerr . $emailerr . $phone_numbererr . $subjecterr . $messageerr != "") {
    header('location: ' . ADMIN_URL . "contacts/add-form.php?nameerr=$nameerr&emailerr=$emailerr&phone_number=$phone_numbererr&subject=$subjecterr&message=$messageerr");
    die;
}

// query upload to DB
$insertBookingQuery = "insert into booking
                          (checkin_date, name, email, phone_number, address, adults, children, total_price, message)
                    values
                          ('$checkin_date', '$name', '$email', '$phone_number', '$address', '$adult', '$children', '$total_price', '$message')";
// dd($insertBookingQuery);
queryExecute($insertBookingQuery, false);
header("location: " . BASE_URL . "index.php?msg= đặt phòng thành công");
die;
