<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();


$getAllMemberSql = "select * from users where role_id = 1";
$users = queryExecute($getAllMemberSql, true);


$getAllRoomSql = "select * from room_types";
$room = queryExecute($getAllRoomSql, true);


$getAllRoomGalleriesSql = "select * from room_galleries";
$roomgalleries = queryExecute($getAllRoomGalleriesSql, true);


$getAllWebSql = "select * from web_setting";
$web = queryExecute($getAllWebSql, true);


$getAllContactSql = "select * from contact";
$contact = queryExecute($getAllContactSql, true);

$getAllBookingSql = "select * from booking";
$booking = queryExecute($getAllBookingSql, true);

$getAllFeedbackSql = "select * from custom_feedback";
$feed = queryExecute($getAllFeedbackSql,true);

$getAllNewsSql = "select * from news";
$news = queryExecute($getAllNewsSql,true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../_share/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../_share/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($users); ?></h3>
                                    <p>Người dùng</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'users' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?= count($room) ?></h3>
                                    <p>Loại Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'rooms' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?= count($roomgalleries) ?></h3>
                                    <p>Ảnh Phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'room_galleries/' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= count($contact) ?></h3>

                                    <p>Contact</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-id-card"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'contacts' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?= count($web) ?></h3>
                                    <p>Web Setting</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-internet-explorer"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'web_settings' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= count($booking) ?></h3>
                                    <p>Đặt phòng</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-check-alt nav-icon"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'booking' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3><?= count($feed) ?></h3>

                                    <p>Đánh Giá</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-comments"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'feedback' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                         <!-- ./col -->
                         <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= count($news) ?></h3>

                                    <p>Tin Tức</p>
                                </div>
                                <div class="icon">
                                <i class="nav-icon fas fa-newspaper"></i>
                                </div>
                                <a href="<?= ADMIN_URL . 'news' ?>" class="small-box-footer">Chi tiết <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php'; ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php'; ?>

</body>

</html>