<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getWebSettingQuery = "select * from web_setting";
$web = queryExecute($getWebSettingQuery, false);

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
                            <h1 class="m-0 text-dark">Sửa Web_Setting</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-form" action="<?= ADMIN_URL . 'web_settings/save-edit.php' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                            <input type="text" class="form-control" name="id" value="<?= $web['id'] ?>" hidden>
                                <div class="form-group">
                                    <label for="">Tên hotel<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $web['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu đề Hotel<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title_hotel" value="<?php echo $web['title_hotel']?>">
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?= BASE_URL . $web['logo']  ?>" width="100" id="logo" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="logo"
                                            onchange="logo(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">LOGO<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?= BASE_URL . $web['small_logo']  ?>" width="100" id="small_logo" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="small_logo"
                                            onchange="smalllogo(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">SMALL LOGO<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Điện thoại<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="hotline" value="<?php echo $web['hotline']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="map_url" value="<?php echo $web['map_url']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $web['email']?>">
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?= BASE_URL . $web['background_img']  ?>" width="300" id="background_img" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="background_img"
                                            onchange="back_ground(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">BANNER<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Slogan<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slogan" value="<?php echo $web['slogan']?>">
                                </div>

                                 <div class="form-group d-flex justify-content-center">
                                    <img src="<?= BASE_URL . $web['slogan_author']  ?>" width="100" id="slogan_author" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="slogan_author"
                                            onchange="slogan(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">SLOGAN AUTHOR<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Intro Youtube<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="intro_youtube_url" value="<?php echo $web['intro_youtube_url']?>">
                                </div>
                                <div class="col d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary">Sửa</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'web_settings' ?>" class="btn btn-danger"
                                        id="btnRemove">Hủy</a>
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
    <script type="text/javascript">
    function logo(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#logo').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#logo').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }

    function smalllogo(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#small_logo').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#small_logo').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }

    function back_ground(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#background_img').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#background_img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }

    function slogan(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#slogan_author').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#slogan_author').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }

    $(document).ready(function() {
        $('#add-form').validate({
            rules: {
                name: {
                    required: true,
                },
                title_hotel:{
                    required:true,
                },
                hotline:{
                    required:true,
                },
                map_url:{
                    required:true,
                },
                email:{
                    required:true,
                },
                slogan:{
                    required:true,
                },
                intro_youtube_url:{
                    required:true,
                },
                image: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            },
            messages: {
                name: {
                    required: "hãy nhập tên"
                },
                title_hotel:{
                    required: "hãy nhập tiêu đề hotel"
                },
                hotline:{
                    required: "hãy nhập số điện thoại hotel"
                },
                map_url:{
                    required: "hãy nhập địa chỉ"
                },
                email:{
                    required: "hãy nhập email"
                },
                slogan:{
                    required: "hãy nhập slogan"
                },
                intro_youtube_url:{
                    required: "hãy nhập link youtube"
                },
                image: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
            }
        });
    });
    </script>
</body>

</html>