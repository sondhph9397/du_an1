<div class="rq-side-menu-wrap">
    <!-- OVERLAY -->
    <div class="rq-dark-overlay"></div>
    <!-- OVERLAY END -->

    <div id="rq-side-menu" class="rq-side-menu">
        <div class="rq-side-menu-widget-wrap">
            <div class="rq-login-form-wrapper">
                <?php if (isset($loggedInUser)) : ?>
                    <h3>Người dùng</h3>
                    <ul>
                        <li>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?= $loggedInUser['name']; ?></a>
                        </li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Thông tin cá nhân</a></li>
                        <?php if ($loggedInUser !== null && $loggedInUser['role_id'] > 1):?>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" class="login-color" href="<?=ADMIN_URL. 'dashboard'?>">Quản trị</a></li>
                                            <?php endif;?>
                        <li>
                            <a class="" href="#">Đổi mật khẩu</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'login/logout.php' ?>">Đăng xuất</a>
                        </li>
                    </ul>
                <?php else : ?>
                    <h3>User Login</h3>
                    <p>Login to add new listing </p>
                    <div class="rq-login-form">
                        <form action="<?=LOGIN_URL . 'post-login.php'?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="email" id="rq-user-input" placeholder="Email người dùng">
                            <input type="password" name="password" id="rq-user-password" placeholder="Password">
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
                <?php endif; ?>
            </div>
        </div>
    </div>

    <button class="rq-side-menu-close-button" id="rq-side-menu-close-button">Close Menu</button>
</div>