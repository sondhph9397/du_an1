<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$roleId = isset($_GET['role']) == true ? $_GET['role'] : false;

// Lấy danh sách room
$getRoomQuery= "select * from room_types";
$room= queryExecute($getRoomQuery, true);

// danh sách users
$getUsersQuery = "select
                    u.*,
                    r.name as role_name
                    from users u
                    join roles r
                    on u.role_id = r.id";
// tìm kiếm
$users = queryExecute($getUsersQuery, true);

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
                            <h1 class="m-0 text-dark">Quản trị Phòng</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= ADMIN_URL . 'dashboard'?>">Dashboard</a></li>
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
                                        <input type="text" value="<?php echo $keyword ?>" class="form-control"
                                            name="keyword" placeholder="Nhập tên phòng, số phòng...">
                                    </div>
                                    <div class="form-group col-4">
                                        <select name="role" class="form-control">
                                            <option selected value="">Tất cả</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Danh sách users  -->
                        <table class="table table-stripped">
                            <thead>
                                <th>ID</th>
                                <th>Tên Phòng</th>
                                <th width="200">Ảnh</th>
                                <th>Trạng Thái</th>
                                <th>Giá</th>
                                <th>Tiêu Đề</th>
                                <th width="300">Nội Dung</th>
                                <th>Người lớn</th>
                                <th>Trẻ em</th>
                                <th>
                                    <a href="<?= ADMIN_URL . 'rooms/add-form.php' ?>" class="btn btn-primary btn-sm"><i
                                            class="fa fa-plus"></i> Thêm</a>
                                </th>
                            </thead>
                            <tbody>
                                <?php foreach ($room as $ro) : ?>
                                <tr>
                                    <td><?php echo $ro['id'] ?></td>
                                    <td><?php echo $ro['name'] ?></td>
                                    <td>
                                        <img class="img-fluid" src="<?= BASE_URL . $ro['featrue_image']?>" alt="">
                                    </td>
                                    <td>
                                        <?php echo $ro['status'] ?>
                                    </td>
                                    <td><?= $ro['price']?></td>
                                    <td><?php echo $ro['short_desc']?></td>
                                    <td><?php echo $ro['about']?> </td>
                                    <th><?php echo $ro['adults']?></th>
                                    <th><?php echo $ro['children']?></th>
                                    <td>
                                        <a href="<?php echo ADMIN_URL . 'rooms/edit-form.php?id=' . $ro['id'] ?>"
                                            class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?php echo ADMIN_URL . 'rooms/remove.php?id=' . $ro['id'] ?>"
                                            class="btn-remove btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
        $('.btn-remove').on('click', function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa tài khoản này?",
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
         <?php
        if (isset($_GET['msg'])): ?>
            Swal.fire({
                position: 'bottom-end',
                icon: 'warning',
                title: "<?= $_GET['msg'];?>",
                showConfirmButton: false,
                timer: 1500 });
            <?php endif; ?>
    });
    </script>
</body>

</html>