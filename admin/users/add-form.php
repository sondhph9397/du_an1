<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getRoleQuery = "select * from roles";
$roles = queryExecute($getRoleQuery, true);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once '../_share/style.php';?>
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
                            <h1 class="m-0 text-dark">Tạo tài khoản</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-user-form" action="<?= ADMIN_URL  . 'users/save-add.php' ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tên người dùng<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name">
                                            <?php if (isset($_GET['nameerr'])) : ?>
                                            <label class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email">
                                            <?php if (isset($_GET['emailerr'])) : ?>
                                            <label class="error"><?= $_GET['emailerr'] ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mật khẩu<span class="text-danger">*</span></label>
                                            <input type="password" id="main-password" class="form-control"
                                                name="password">
                                            <?php if (isset($_GET['passworderr'])) : ?>
                                            <label class="error"><?= $_GET['passworderr'] ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="cfpassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trạng thái<span class="text-danger">*</span></label>
                                            <input class="form-control" name="status">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quyền</label>
                                            <select name="role_id" class="form-control">
                                                <?php foreach ($roles as $ro) : ?>
                                                <option value="<?= $ro['id'] ?>"><?= $ro['name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" class="form-control" name="number_phone">
                                        </div>
                                        <div class="col d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                            <a href="<?= ADMIN_URL . "users" ?>" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    $('#add-user-form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 191,
                minlength: 2
            },
            email: {
                required: true,
                maxlength: 191,
                email: true,
                remote: {
                    url: "<?= ADMIN_URL . 'users/verify-email-existed.php' ?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $("input[name='email']").val();
                        }
                    }
                }
            },
            password: {
                required: true,
                maxlength: 191
            },
            cfpassword: {
                required: true,
                equalTo: "#main-password",
            },
            number_phone: {
                required: true,
                number: true,
                maxlength: 10,
                minlength: 10,

            },
            status: {
                required: true,
                maxlength: 1,
                number: true,
                max: 2,
                min: 1

            },
            avatar: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "hãy nhập tên người dùng",
                maxlength: "kí tự không qá 191",
                minlength: "tên người dùng từ 2 ký tự trở lên"
            },
            email: {
                required: "hãy nhập email",
                maxlength: "email không quá 191 kí tự",
                email: "không đúng định dạng email",
                remote: "email đã tồn tại"
            },
            password: {
                required: "hãy nhập password",
                maxlength: "mật khẩu không quá 191"
            },
            cfpassword: {
                required: "hãy nhập lại mật khẩu",
                equalTo: "mật khẩu không khớp",
                same:"ok"
            },
            number_phone: {
                required: "hãy nhập số điện thoại",
                number: "hãy nhập số",
                minlength: "điện thoại không quá 10 số",
                minlength: "điện thoại phải 10 số"
            },
            status: {
                required: "hãy nhập trạng thái",
                number: "hãy nhập số",
                maxlength: "không quá 1 kí tự",
                max: "giá trị không lớn hơn 2",
                min: "giá trị không nhỏ hơn 1"
            },
        }
        
    });
    </script>
</body>

</html>