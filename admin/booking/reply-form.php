<?php
session_start();
require_once "../../config/utils.php";
checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getBooking = "select * from booking where id = $id";
$booking = queryExecute($getBooking, false);

if (!$booking) {
    header('location:' . ADMIN_URL . 'booking?msg=không tồn tại');
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once '../_share/header.php' ?>

        <?php include_once '../_share/sidebar.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Trả Lời Liên hệ</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <form action="<?= ADMIN_URL . 'booking/save-reply.php' ?>" id="answer-form" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                    <div class="container-fluid">
                        <div class="form-group" hidden>
                            <input type="text" name="reply_by" class="form-control"
                                value="<?= $_SESSION[AUTH]['name'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Tên người đặt</label>
                                            <input type="text" name="name" class="form-control"
                                                value="<?= $booking['name'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="<?= $booking['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngày đặt</label>
                                            <input type="text" name="check_in" class="form-control"
                                                value="<?= $booking['check_in'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ngày trả</label>
                                            <input type="text" name="check_out" class="form-control"
                                                value="<?= $booking['check_out'] ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Loại phòng</label>
                                            <input type="text" name="room_types" class="form-control"
                                                value="<?= $booking['room_stype'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thành tiền</label>
                                            <input type="text" name="total_price" class="form-control"
                                                value="$<?= $booking['total_price'] ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trả lời</label>
                                            <textarea name="reply_message" class="form-control" id="" cols="30"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary">Lưu</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'booking' ?>" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php' ?>
    <script>
    $('#answer-form').validate({
        rules: {
            reply: {
                required: true
            },
        },
        messages: {
            reply: {
                required: "Hãy nhập phản hồi"
            },
        }
    });
    </script>
</body>

</html>