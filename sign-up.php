<?php
session_start();
require_once "./config/utils.php";
$getRoleQuery = "select * from roles where status=1";
$roles = queryExecute($getRoleQuery, true);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from redqteam.com/sites/houston/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 06:52:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houston | Sing Up</title>
    <?php
    include_once "./public/_share/style.php";
    ?>
    <style>
    label.error {
        color: #ff0000;
        display: block;
    }
    </style>
</head>

<body>
    <div id="rq-circle-loader-wrapper">
        <div id="rq-circle-loader-center">
            <div class="rq-circle-load">
                <img src="<?= ADMIN_ASSET_URL ?>img/oval.svg" alt="Page Loader">
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <!--================================
                SIDE MENU
    =================================-->
        <!-- PAGE OVERLAY WHEN MENU ACTIVE -->
        <div class="rq-side-menu-overlay"></div>
        <!-- PAGE OVERLAY WHEN MENU ACTIVE END -->

        <div class="rq-side-menu-wrap">
            <!-- OVERLAY -->
            <div class="rq-dark-overlay"></div>
            <!-- OVERLAY END -->

            <div id="rq-side-menu" class="rq-side-menu">
                <div class="rq-side-menu-widget-wrap">
                    <div class="rq-login-form-wrapper">
                        <h3>User Login</h3>
                        <p>Login to add new listing </p>

                        <div class="rq-login-form">
                            <form action="#">
                                <input type="text" name="rq-user-name" id="rq-user-input" placeholder="User Name">
                                <input type="password" name="rq-user-password" id="rq-user-password"
                                    placeholder="Password">
                                <button type="submit">Login</button>
                            </form>
                        </div>

                        <div class="rq-social-login-opt">
                            <a href="#" class="rq-social-login-btn rq-facebook-login">Login with Facebook</a>
                            <a href="#" class="rq-social-login-btn rq-twitter-login">Login with Twitter</a>
                        </div>

                        <div class="rq-other-options">
                            <a href="#" class="rq-forgot-pass">Forget Password ?</a>
                            <a href="#" class="rq-signup">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>

            <button class="rq-side-menu-close-button" id="rq-side-menu-close-button">Close Menu</button>
        </div>
        <!-- SIDE MENU END -->
        <?php include_once './public/_share/header.php'; ?>

        <div class="rq-contact-message">
            <div class="container">
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
                            <form id="add-user-form" action="<?= BASE_URL  . 'save-add.php' ?>" method="post"
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
                                        <div class="col d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                            <a href="<?= BASE_URL ?>" class="btn btn-danger">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.row -->

                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>

            <?php require_once "./public/_share/footer.php" ?>
        </div><!-- main-wrapper -->
    </div>
    <?php include_once "./public/_share/script.php"; 
    include_once "./admin/_share/script.php" ?>
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
                equalTo: "#main-password"
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
                equaTo: "mật khẩu không khớp"
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

<!-- Mirrored from redqteam.com/sites/houston/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 06:52:20 GMT -->

</html>