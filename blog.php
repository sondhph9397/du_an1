<?php 
session_start();
require_once "./config/utils.php";

$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

$getNewsQuery = "select * from news";
$news = queryExecute($getNewsQuery,true);
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from redqteam.com/sites/houston/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:56:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houston | Blog</title>
    <?php require_once './public/_share/style.php'; ?>
</head>

<body>

    <div id="rq-circle-loader-wrapper">
        <div id="rq-circle-loader-center">
            <div class="rq-circle-load">
                <img src="<?= ADMIN_ASSET_URL ?>img/oval.svg" alt="Page Loader">
            </div>
        </div>
    </div>
    <!--================================
                SIDE MENU
    =================================-->
    <!-- PAGE OVERLAY WHEN MENU ACTIVE -->
    <div class="rq-side-menu-overlay"></div>
    <!-- PAGE OVERLAY WHEN MENU ACTIVE END -->

    <?php include_once './public/_share/sidebar.php' ?>
    <!-- SIDE MENU END -->
    <?php include_once './public/_share/header.php'; ?>

    <section class="rq-page-background rq-blog-page-bg">
        <div class="banner_shadow">
            <h1>BLOG</h1>
        </div>
    </section>

    <section class="rq-blog-post-section" id="blog-post">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 rq-blog-post-wrapper">
                    <!-- BLOG ITEMS -->
                    <?php foreach ($news as $ne): ?>
                    <div class="rq-blog-items rq-image-post">
                        <div class="rq-blog-img-wrapper">
                            <img src="<?= BASE_URL . $ne['featrue_image'] ?>" alt="Blog Image">
                            <div class="rq-blog-cat-icon">
                                <i class="ion-ios-camera-outline"></i>
                            </div>
                        </div>

                        <div class="rq-blog-item-details">
                            <h3>
                                <a href="blog-details.php"><?= $ne['title']?></a>
                            </h3>
                            <p><?= $ne['content']?></p>
                            <span class="rq-blog-post-date"><?= $ne['created_at']?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- BLOG ITEMS END -->
                </div>

                <div class="col-md-4 col-sm-5 rq-sidebar">
                    <div class="rq-sidebar-wrapper">
                        <!-- SIDEBAR WIDGET -->
                        <div class="rq-sidebar-widget rq-recent-post-widget">
                            <h3 class="rq-sidebar-title">Recent Posts</h3>

                            <div class="rq-recent-post-wrapper">
                                <!-- POST ITEM -->
                                <?php foreach ($news as $ne): ?>
                                <div class="rq-recent-post-item">
                                    <div class="rq-recent-post-img-wrapper">
                                        <img src="<?= BASE_URL . $ne['featrue_image'] ?>" alt="Recent Post">
                                    </div>

                                    <div class="rq-recent-post-details">
                                        <h3><a href="blog-details.php"><?= $ne['title']?> </a></h3>
                                        <span class="rq-post-date"><?= $ne['created_at']?></span>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <!-- END -->
                            </div>
                        </div>
                        <!-- END -->

                        <!-- SIDEBAR WIDGET -->
                        <!-- END -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "./public/_share/footer.php"; ?>

    <?php require_once "./public/_share/script.php"; ?>
</body>

<!-- Mirrored from redqteam.com/sites/houston/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:56:39 GMT -->

</html>