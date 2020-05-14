<?php
session_start();
include_once '../../config/utils.php';

$name = trim($_POST['name']);
$rating = trim($_POST['rating']);
$email = trim($_POST['email']);
$comment = trim($_POST['comment']);

$insertFeedbackQuery = "insert into custom_feedback
                                    (name,email,rating,comment)
                                values
                                    ('$name','$email','$rating','$comment')";
queryExecute($insertFeedbackQuery, false);
header('location: '.BASE_URL."single-room.php?msg=Gửi phản hồi thành công");
die;
?>
