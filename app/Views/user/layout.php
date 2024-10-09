<?php

use App\Models\Model_Auth;
use App\Models\CartModel; // Don't forget to include CartModel

if (session()->has('id')) {
    $userId = session()->get('id');

    // Load model pengguna
    $userModel = new Model_Auth();

    // Ambil data pengguna yang login
    $data = $userModel->getLogin($userId);

    // Initialize CartModel to get cart items
    $cartModel = new CartModel();

    // Get total cart items for the user
    $total_cart = $cartModel->totalItemsByUser($userId);

    // Ensure $total_cart is set
    $total_cart = isset($total_cart) ? $total_cart : 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Katalog Indonesia</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="<?= base_url(); ?>user/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= base_url(); ?>user/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Topbar Start -->
  <div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
      <div class="col-lg-6 d-none d-lg-block">
        <div class="d-inline-flex align-items-center h-100">
          <a class="text-body mr-3" href="">About</a>
          <a class="text-body mr-3" href="">Contact</a>
          <a class="text-body mr-3" href="">Help</a>
          <a class="text-body mr-3" href="">FAQs</a>
        </div>
      </div>
      <!-- Language Selector -->
      <div class="col-lg-6 text-right">
                <div class="ml-auto">
                    <div id="google_translate_element"></div>
                </div>
       </div>


        <div class="d-inline-flex align-items-center d-block d-lg-none">
          <a href="" class="btn px-0 ml-2">
            <i class="fas fa-heart text-dark"></i>
            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
          </a>
          <a href="<?= base_url(); ?>cart" class="btn px-0 ml-2">
            <i class="fas fa-shopping-cart text-dark"></i>
            <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">
              <?php if (session()->get('id')) : ?>
                <?= $total_cart; ?>
              <?php else : ?>
                0
              <?php endif ?>

            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
      <div class="col-lg-4 d-flex align-items-end">
        <div class="">
          <img class="img-fluid" width="50px" src="<?= base_url(); ?>user/img/katalog1.png" alt="">
        </div>
        <div class="">
          <a href="" class="text-decoration-none">
            <span class="h3 text-uppercase text-primary bg-dark px-2">atalog</span>
            <span class="h3 text-uppercase text-dark bg-primary px-2 ml-n1">Indonesia</span>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-4 text-left">
        <form action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products">
            <div class="input-group-append">
              <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 col-6 text-right">
        <p class="m-0">Customer Service</p>
        <h5 class="m-0">+62-8786-5309-966</h5>
      </div>
    </div>
  </div>
  <!-- Topbar End -->


  <!-- Navbar Start -->
  <div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
      <div class="col-lg-3 d-none d-lg-block">
        <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
          <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
          <i class="fa fa-angle-down text-dark"></i>
        </a>
        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
          <div class="navbar-nav w-100">

            <?php foreach ($kategori as $kt) : ?>
              <div class="nav-item dropdown dropright">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $kt['kategori_nama'] ?> <i class="fa fa-angle-right float-right mt-1"></i></a>
                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                  <?php foreach ($kt['sub_kategori'] as $sk) : ?>
                    <a href="" class="dropdown-item"><?= $sk['nama_sub_kategori'] ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </nav>
      </div>
      <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
          <a href="" class="text-decoration-none d-block d-lg-none">
            <span class="h1 text-uppercase text-light bg-danger px-2">KATALOG</span>
            <span class="h1 text-uppercase text-danger bg-light px-2 ml-n1">INDONESIA</span>
          </a>
          <button type="bp;utton" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
                            <a href="<?= base_url(); ?>" class="nav-item nav-link <?= $menu == 'dashboard' ? 'active' : '' ?> h5">Home</a>
                            <a href="<?= base_url('user/shop'); ?>" class="nav-item nav-link <?= $menu == 'shop' ? 'active' : '' ?> h5">Barang</a>
                            <a href="<?= base_url('user/jasa'); ?>" class="nav-item nav-link <?= $menu == 'jasa' ? 'active' : '' ?> h5">Jasa</a>
                            <a href="<?= base_url('contact'); ?>" class="nav-item nav-link h5">Contact</a>
                        </div>

                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
    <a href="#" class="btn px-0">
        <i class="fas fa-heart text-primary"></i>
    </a>
    <a href="<?= base_url(); ?>cart" class="btn px-0 ml-3">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
            <?php if (session()->get('id')) : ?>
                <?= $total_cart; ?>
            <?php else : ?>
                0
            <?php endif ?>
        </span>
    </a>

    <!-- Dropdown for user account -->
    <div class="btn-group">
    <button type="button" class="btn user-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user text-primary"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <?php if (session()->get('username')) : ?>
            <!-- Conditional links based on user level -->
            <?php if ($data['level'] == 2) : ?>
                <a href="<?= base_url(); ?>sales/home" class="dropdown-item" type="button">Masuk Ke Halaman Penjual</a>
            <?php else : ?>
                <a href="<?= base_url(); ?>daftar/penjual" class="dropdown-item" type="button">Daftar Sebagai Penjual</a>
            <?php endif; ?>

            <!-- Check if the user is a seller, if not show My Account -->
            <?php if ($data['level'] != 2) : ?>
                <a href="<?= base_url(); ?>myaccount" class="dropdown-item">My Account</a>
            <?php endif; ?>
            
            <a href="<?= base_url(); ?>logout" class="dropdown-item" type="button">Log Out</a>
        <?php else : ?>
            <!-- If the user is not logged in -->
            <a href="<?= base_url(); ?>auth/login" class="dropdown-item">Masuk</a>
            <a href="<?= base_url(); ?>auth/register" class="dropdown-item">Daftar</a>
        <?php endif; ?>
    </div>
</div>

</div>

</div>

          </div>
        </nav>`
      </div>
    </div>
  </div>
  <!-- Navbar End -->
  <div class="flash_data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
  <div class="error_flash" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>

  <?= $this->renderSection('content'); ?>


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
      <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
        <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
        <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Jln. Ganetri IV No. 4 DPS 80237 Bali; Jln. Sari Dana I No. 1 DPS 80116 Bali</p>
        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>patners@katalogindonesia.com</p>
        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62-8786-5309-966</p>
      </div>
      <div class="col-lg-8 col-md-12">
        <div class="row">
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
              <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
            <div class="d-flex flex-column justify-content-start">
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
              <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
              <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
            </div>
          </div>
          <div class="col-md-4 mb-5">
            <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
            <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
            <form action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Your Email Address">
                <div class="input-group-append">
                  <button class="btn btn-primary">Sign Up</button>
                </div>
              </div>
            </form>
            <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
            <div class="d-flex">
              <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
              <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
              <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
      <div class="col-md-6 px-xl-0">
        <p class="mb-md-0 text-center text-md-left text-secondary">
          &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
          by
          <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
        </p>
      </div>
      <div class="col-md-6 px-xl-0 text-center text-md-right">
        <img class="img-fluid" src="<?= base_url(); ?>user/img/payments.png" alt="">
      </div>
    </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>user/lib/easing/easing.min.js"></script>
  <script src="<?= base_url(); ?>user/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="<?= base_url(); ?>user/mail/jqBootstrapValidation.min.js"></script>
  <script src="<?= base_url(); ?>user/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="<?= base_url(); ?>user/js/main.js"></script>
  
  <?= $this->renderSection('scripts'); ?>
  <script>
    const flashData = $('.flash_data').data('flashdata')
    const errorflashData = $('.error_flash').data('flashdata')
    console.log(errorflashData);
    if (flashData) {
      swal("Success!", flashData, "success")
    }

    if (errorflashData) {
      swal("Terjadi Kesalahan", errorflashData, "error")
    }
  </script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            {pageLanguage: 'en'},
            'google_translate_element'
        );
    }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>