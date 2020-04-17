<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getRoomQuery = "select * from room_types";
$room = queryExecute($getRoomQuery, true);

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
                            <h1 class="m-0 text-dark">Tạo Ảnh Phòng</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <form id="add-form" action="<?= ADMIN_URL . 'room_galleries/save-add.php' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tên Phòng<span class="text-danger">*</span></label>
                                    <select name="room_id" class="form-control">
                                        <option value="">Select ...</option>
                                        <?php foreach ($room as $ro) : ?>
                                            <option value="<?php echo $ro['name'] ?>"><?php echo $ro['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="form-group d-flex justify-content-center pt-2">
                                    <img src="<?= DEFAULT_IMAGE ?>" width="300" id="preview-img" alt="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" onchange="encodeImageFileAsURL(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">Ảnh Phòng<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                                    <a href="<?= ADMIN_URL . 'room_galleries' ?>" class="btn btn-danger" id="btnRemove">Hủy</a>
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
        $(document).ready(function() {
            $('#add-form').validate({
                rules: {
                    room_id: {
                        required: true,
                    },
                    image: {
                    required: true,
                    extension: "png|jpg|jpeg|gif"
                }
                },
                messages: {
                    room_id: {
                        required: "Hãy chọn phòng",
                    },
                    image: {
                    required: "Hãy nhập ảnh",
                    extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
                }
                }
            });
        });
    </script>
</body>

</html>