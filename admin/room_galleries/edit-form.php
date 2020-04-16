<?php
session_start();
require_once '../../config/utils.php';

checkAdminLoggedIn();

$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRoomGalleriesQuery = "select * from room_galleries where id = '$id'";
$galleries = queryExecute($getRoomGalleriesQuery, false);

$getRoomQuery="select * from room_types";
$room= queryExecute($getRoomQuery,true);

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
                            <h1 class="m-0 text-dark">Sửa tin tức</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-user-form" action="<?= ADMIN_URL . 'room_galleries/save-edit.php' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="id" value="<?= $galleries['id'] ?>" hidden>
                                <div class="form-group">
                                    <label for="">Tên phòng<span class="text-danger">*</span></label>
                                    <select name="room_id" class="form-control">
                                        <option value="">Select ...</option>
                                        <?php foreach ($room as $ro) : ?>
                                        <option value="<?php echo $ro['name'] ?>"><?php echo $ro['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?= BASE_URL . $galleries['img_url']  ?>" width="300" id="preview-img" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image"
                                            onchange="encodeImageFileAsURL(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">Ảnh<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="from-group pt-2">
                                    <div class="col d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>&nbsp;
                                        <a href="<?= ADMIN_URL . 'news' ?>" class="btn btn-danger">Hủy</a>
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
        <!-- /.content-wrapper -->
        <?php include_once '../_share/footer.php'; ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include_once '../_share/script.php'; ?>
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

    $('#add-user-form').validate({
        rules: {
            title: {
                required: true,
                maxlength: 100
            },
            content: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Hãy nhập tên bản tin",
                maxlength: "Số lượng ký tự tối đa bằng 100 ký tự"
            },

            content: {
                required: "Hãy nhập nội dung bài viết"

            }
        }
    });
    </script>
</body>

</html>