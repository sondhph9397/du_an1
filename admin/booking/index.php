<?php
session_start();
define('TITLE', 'Đặt phòng');
require_once '../../config/utils.php';
checkAdminLoggedIn();
// get keywords
$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";

$getBookingQuery = "select * from booking";
$booking = queryExecute($getBookingQuery,true);

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
                            <h1 class="m-0 text-dark">Quản trị đặt phòng</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= ADMIN_URL . 'dashboard' ?>">Dashboard</a></li>
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
                        <div class="col-md-10 col-offset-1">
                            <!-- Filter  -->
                            <form action="" method="get">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <input type="text" value="<?= $keyword ?>" class="form-control" name="keyword" placeholder="Nhập tên, nội dung dịch vụ...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="statusSearch" class="form-control">
                                            <option selected value="">Tất cả</option>
                                            <option value="<?= ACTIVE ?>">Kích hoạt</option>
                                            <option value="<?= INACTIVE ?>">Không kích hoạt</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Danh sách users  -->
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead class="table-secondary">
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Ngày đến</th>
                                    <th>Ngày Trả</th>
                                    <th>Loại phòng</th>
                                    <th>Người lớn</th>
                                    <th>Trẻ em</th>
                                    <th>Tổng tiền</th>
                                    <th>
                                       Thao tác
                                    </th>
                                </thead>
                                <tbody>
                                    <?php foreach ($booking as $book) : ?>
                                        <tr>
                                            <td><?php echo $book['name'] ?></td>
                                            <td><?php echo $book['email'] ?></td>
                                            <td><?php echo $book['check_in'] ?></td>
                                            <td><?php echo $book['check_out'] ?></td>
                                            <td><?php echo $book['room_stype'] ?></td>
                                            <td><?= $book['adults'] ?></td>
                                            <td><?= $book['children'] ?></td>
                                            <td><?= $book['total_price']?></td>
                                            <td>
                        
                                                <a href="<?php echo ADMIN_URL . 'booking/reply-form.php?id=' . $book['id'] ?>" class="btn btn-sm btn-success">
                                                    <i class="far fa-comment-dots"></i>
                                                </a>
                                           
                                                <a href="<?php echo ADMIN_URL . 'booking/remove.php?id=' . $book['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->

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
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                sessionStorage.clear();
            }, 2000);

            $('.btn-remove').on('click', function() {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa dịch vụ này không?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => { // arrow function es6 (es2015)
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                });
                return false;
            });
            <?php if (isset($_GET['msg'])) : ?>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "<?= $_GET['msg']; ?>",
                    showConfirmButton: false,
                    timer: 1500
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>
