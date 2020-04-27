<?php 
session_start();
require_once "./config/utils.php";

$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from redqteam.com/sites/houston/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:56:30 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houston | Checkout</title>
    <?php require_once "./public/_share/style.php"; ?>
</head>

<body class="rq-about-us-template">
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

        <?php include_once './public/_share/sidebar.php' ?>
        <!-- SIDE MENU END -->


        <?php require_once "./public/_share/header.php"; ?>

        <div class="rq-checkout-banner">
            <div class="rq-checkout-banner-mask">
                <div class="container">
                    <div class="rq-checkout-banner-text">
                        <div class="rq-checkout-banner-text-middle">
                            <h1>booking</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- / rq-banner-area-->
        <div class="rq-checkout-form">
            <div class="container">
                <form id="check-booking" action="<?= ADMIN_URL . 'booking/save-add.php' ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="rq-categories">
                                <div class="rq-check-in-out-wrapper">
                                    <div class="rq-check-in-out">
                                        <h1>CHECK IN</h1>
                                        <div class="rq-check-in-out-display" id="rq-check-in">
                                            <input type="text" id="rq-checkin-date" hidden>
                                            <div class="rq-dmy-wrapper">
                                                <p class="rq-single-date"></p>
                                                <p class="rq-month-year">
                                                    <span class="rq-single-month"></span>
                                                    <span class="rq-single-year"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rq-check-in-out">
                                        <h1>CHECK OUT</h1>
                                        <div class="rq-check-in-out-display" id="rq-check-out">
                                            <input type="text" id="rq-checkout-date" hidden>
                                            <div class="rq-dmy-wrapper">
                                                <p class="rq-single-date"></p>
                                                <p class="rq-month-year">
                                                    <span class="rq-single-month"></span>
                                                    <span class="rq-single-year"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--  / date & time picker -->
                                <h4>total Room<span class="label label-default pull-right">1</span></h4>
                                <h4>adult <span class="label label-default pull-right">
                                        <select class="form-control" name="adult" id="adult">
                                            <option value="" selected></option>
                                            <option value="1">1 Người</option>
                                            <option value="2">2 Người</option>
                                            <option value="3">3 Người</option>
                                            <option value="4">4 Người</option>
                                        </select></span></h4>
                                <h4>children <span class="label label-default pull-right"> <select class="form-control"
                                            name="children" id="adult">
                                            <option value="" selected></option>
                                            <option value="1">1 Người</option>
                                            <option value="2">2 Người</option>
                                            <option value="3">3 Người</option>
                                            <option value="4">4 Người</option>
                                        </select></span></h4>
                                <h2>TOTAL <span class="label label-default pull-right">
                                        <input type="text" name="total_price" value="250$"></span></h2>
                            </div>
                        </div><!-- / col-md-4-->
                        <div class="col-md-8 col-sm-6">

                            <h1 class="rq-checkout-form-title">billing details</h1>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NAME <span>*</span></label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail7">ADDRESS</label>
                                        <input type="text" name="address" class="form-control" id="exampleInputEmail7"
                                            placeholder="Address">
                                    </div>
                                </div>
                            </div>
                            <!------/row-------->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail4">EMAIL<span>*</span></label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail4">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail5">PHONE </label>
                                        <input type="text" name="phone_number" class="form-control"
                                            id="exampleInputEmail5">
                                    </div>
                                </div>
                            </div>
                            <!------/row-------->

                            <h1 class="rq-checkout-form-title">additional info</h1>
                            <div class="form-group">
                                <label for="exampleInputEmail11">order notes</label>
                                <textarea name="message" class="form-control" rows="5"
                                    id="exampleInputEmail11"></textarea>
                            </div>
                            <!-- <a class="rq-btn-primary" href="#" role="button"></a> -->
                            <button class="btn rq-btn-primary" type="submit">book now</button>
                </form>
            </div>
        </div>
    </div>
    </div><!-- / rq-checkout-form-->

    <?php require_once "./public/_share/footer.php"; ?>
    </div><!-- main-wrapper -->
    <?php require_once "./public/_share/script.php"; ?>

</body>

<!-- Mirrored from redqteam.com/sites/houston/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:56:30 GMT -->

</html>