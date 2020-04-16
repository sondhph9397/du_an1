<?php
session_start();
require_once "../../config/utils.php";
// lấy dữ liệu bảng roles
$getRoleQuery = "select * from roles";
$roles = queryExecute($getRoleQuery, true);

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from redqteam.com/sites/houston/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 06:52:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houston |</title>
    <?php require_once "../../public/_share/style.php"; ?>
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
        <?php include_once '../../public/_share/header.php'; ?>

        <div class="rq-contact-message">
            <div class="container">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">Thêm Phòng</h1>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <form id="add-user-form" action="<?= ADMIN_URL  . 'rooms/save-add.php' ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tên phòng<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name">
                                            <?php if (isset($_GET['nameerr'])) : ?>
                                            <label class="error"><?= $_GET['nameerr'] ?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Ảnh<span class="text-danger">*</span></label><br>
                                            <img src="<?= DEFAULT_IMAGE . 'default-image.jpg'?>" width="200" alt=""><br>
                                            <input type="file" class="form-control" name="featrue_image"
                                                onchange="encodeImageFileAsURL(this)">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tiêu Đề<span class="text-danger">*</span></label>
                                            <input type="" class="form-control" name="short_desc">
                                            <?php if(isset($_GET['short_descerr'])):?>
                                            <label class="error"><?= $_GET['short_descerr']?></label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nội Dung<span class="text-danger">*</span></label><br>
                                            <textarea name="about" id="" cols="72" rows="10">
                                            <?php if(isset($_GET['abouterr'])):?>
                                           
                                            <?php endif; ?>
                                            </textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="">Trạng thái<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" id="">
                                                <option value="ACTIVE">ACTIVE</option>
                                                <option value="INACTIVE">INACTIVE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Người Lớn<span class="text-danger">*</span></label>
                                            <select name="adults" class="form-control" id="">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Trẻ em<span class="text-danger">*</span></label>
                                            <select name="children" class="form-control" id="">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="col d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                                <a href="<?= ADMIN_URL . 'rooms' ?>" class="btn btn-danger">Hủy</a>
                                            </div>
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

            <?php require_once "../../public/_share/footer.php"?>
        </div><!-- main-wrapper -->
        <?php require_once "../../public/_share/script.php"; ?>
</body>

<!-- Mirrored from redqteam.com/sites/houston/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 06:52:20 GMT -->

</html>
<script>
function encodeImageFileAsURL(element) {
    var file = element.files[0];
    if (file === undefined) {
        $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
        return false;
    }
    var reader = new FileReader();
    reader.onloadend = function() {
        $('#preview-img').attr('src', reader.result)
    }
    reader.readAsDataURL(file);
}
</script>