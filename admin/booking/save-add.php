<?php
session_start();
include_once "../../config/utils.php";


$check_in = trim($_POST['check_in']);
$check_out = trim($_POST['check_out']);
$name = $_SESSION[AUTH]['name'];
$email = $_SESSION[AUTH]['email'];
$room_id = trim($_POST['room_id']);
$room_stype = trim($_POST['room_stype']);
$adult = trim($_POST['adult']);
$children = trim($_POST['children']);

// validate bằng php
$checkinerr = "";
$checkouterr = "";
$roomerr = "";

// hiệu timestamp của checkout với checkin
//strtotime Hàm trả về số nguyên là timestamp
$diff = strtotime($check_out) - strtotime($check_in);
// tính ngày chênh lệch của ngày checkout với ngày checkin
$total_date = round($diff / (60 * 60 * 24));
// lấy timestamp hiện tại
$today = date("m/d/Y");
//hiệu timestamp của ngày checkin với ngày hiện tại
$diff_today = strtotime($check_in) - strtotime($today);
//tính ngày chênh lệch của ngày checkin với ngày hiện tại
$total_today = round($diff_today / (60 * 60 * 24));


if (strlen($check_in) == 0) {
    $checkinerr = "Yêu cầu nhập ngày đến khách sạn";
}
if ($checkinerr == "" && $total_date <= 0) {
    $checkinerr = "Yêu cầu nhập ngày đến nhỏ hơn ngày rời";
}
if ($checkinerr == "" && $total_today < 0) {
    $checkinerr = "Yêu cầu nhập ngày đến lớn hơn hoặc bằng hiện tại";
}
if (strlen($check_out) == 0) {
    $checkouterr = "Yêu cầu nhập ngày rời đi";
}
if ($checkinerr . $checkouterr != "") {
    header('location:' . BASE_URL . "single-room.php?id=$room_id&&checkinerr=$checkinerr&&checkouterr=$checkouterr");
    die;
}

$getRoomPriceQuery = "select * from room_types where id = '$room_id'";
$roomPrice = queryExecute($getRoomPriceQuery, false);

$totalPrice = $total_date * $roomPrice['price'];

// query upload to DB
$insertBookingQuery = "insert into booking
                                (check_in, check_out, name, email, room_stype, room_id, adults, children, total_price)
                          values
                                ('$check_in','$check_out', '$name', '$email', '$room_stype', '$room_id', '$adult', '$children', '$totalPrice')";

queryExecute($insertBookingQuery, false);
// dd($insertBookingQuery);
$getBookingQuery = "select * from booking where room_id = $room_id order by id desc";
$booking = queryExecute($getBookingQuery, false);

header("location: " . BASE_URL . "cart.php?id=" . $booking['id'] . '&msg=Bạn đã đặt phòng thành công');
die;
