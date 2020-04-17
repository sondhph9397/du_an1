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
    <?php require_once "../_share/style.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="main-wrapper">
        <!--================================
                SIDE MENU
    =================================-->
        <!-- PAGE OVERLAY WHEN MENU ACTIVE -->

        <!-- PAGE OVERLAY WHEN MENU ACTIVE END -->

        <!-- SIDE MENU END -->
        <?php include_once '../_share/header.php'; ?>

        <?php include_once '../_share/sidebar.php'; ?>


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
                    <form id="add-room-form" action="<?= ADMIN_URL  . 'rooms/save-add.php' ?>" method="post"
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
                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?= DEFAULT_IMAGE ?>" width="300" id="preview-img" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="featrue_image" onchange="encodeImageFileAsURL(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">Ảnh<span class="text-danger">*</span></label>
                                    </div>
                                </div>
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
                                    <textarea name="about" id="" cols="80" rows="5"></textarea>

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
                                    <div class="col d-flex justify-content-start">
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


        <?php require_once "../_share/footer.php"?>
        <!-- main-wrapper -->
        <?php require_once "../_share/script.php"; ?>
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
$('#add-room-form').validate({
        rules: {
            name: {
                required: true,
                maxlength: 191,
                minlength: 2
            },
            short_desc: {
                required: true,
                maxlength: 191
            },
           about: {
                required: true,
                maxlength: 191
            },
            featrue_image: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "hãy nhập tên phòng",
                maxlength: "kí tự không qá 191",
                minlength: "tên phòng từ 2 ký tự trở lên"
            },
            short_desc: {
                required: "hãy nhập tiêu đề",
                maxlength: "tiêu đề không quá 191 kí tự",
            },
            about: {
                required: "hãy nhập nội dung",
                maxlength: "nội dung không quá 191"
            },
           featrue_image:{
               required:"hãy chọn ảnh",
               extension:"hãy chọn đúng định dạng"
           }
        }
        
    });
</script>