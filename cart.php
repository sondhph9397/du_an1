<?php
session_start();
require_once "./config/utils.php";

$loggedInUser = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

$id = $_GET['id'];
$getBookingQuery = "select * from booking where id='$id'";
$booking = queryExecute($getBookingQuery, false);

$room_id = $booking['room_id'];
$getRoomQuery = "select * from room_types where id='$room_id'";
$room = queryExecute($getRoomQuery, false);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Houston | Cart</title>
  <?php require_once "./public/_share/style.php" ?>
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

    <?php include_once './public/_share/sidebar.php' ?>
    <!-- SIDE MENU END -->


    <?php require_once "./public/_share/header.php" ?>

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
    <div class="rq-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-5 col-xs-12">
            <div class="cart-left-side">
              <h4>Tạm tính <span class="label label-default pull-right">$250</span></h4>
              <h3>Tổng tiền<noscript></noscript> <span class="label label-default pull-right">$250</span></h3>
              <a class="btn rq-btn-secondary form-control" href="#">update cart</a>
              <button class="rq-btn-primary form-control" type="submit">proceed checkout</button>
            </div>
          </div>
          <!--- col-md-4 ------>
          <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="rq-cart-table">
              <table class="table" style="width:100%;">
                <tr class="rq-table-heading" style="text-align: left;">
                  <th>Product</th>
                  <th class="rq-align">Price</th>
                  <th class="rq-align">Quantity</th>
                  <th class="rq-align">total</th>
                </tr>
                <tr class="rq-table-border">
                  <td class="rq-cart-row">
                    <h3><i class="ion-android-close"></i><?= $room['name'] ?></h3>
                  </td>
                  <td class="rq-align"><span>$<?= $room['price'] ?></span> </td>
                  <td class="rq-align rq-color">
                    <?php
                    $date1 = date_create($booking['check_in']);
                    $date2 = date_create($booking['check_out']);
                    $diff = date_diff($date1, $date2);
                    $a = $diff->format('%a');
                    echo $a;
                    ?> </td>
                  <td class="rq-align"><span><?php
                                              $total = $a * $room['price'];
                                              echo $total;
                                              ?></span> </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!-- / rq-cart -->

    <?php require_once "./public/_share/footer.php"; ?>
  </div><!-- main-wrapper -->
  <?php require_once "./public/_share/script.php"; ?>
  <script>
    <?php if (isset($_GET['msg'])) : ?>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: "<?= $_GET['msg']; ?>",
        showConfirmButton: false,
        timer: 1500
      });
    <?php endif; ?>
  </script>
</body>

</html>