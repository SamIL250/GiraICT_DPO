<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gira ICT Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/fav.jpg" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/tailwind_layout.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>

</style>

<body>

    <?php if (isset($_SESSION['added_session_cart'])): ?>
        <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
            <?= $_SESSION['added_session_cart']; ?>
            <button class="border text-light py-2 px-4" style="background: tomato;" onclick="window.location.replace('./session_cart.php')">View Cart</button>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['added_session_cart']); // Clear session after showing 
        ?>
    <?php endif; ?>

    <?php
    require './components/signed_out_components/header.php';
    ?>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-danger" style="width: 8rem; height: 8rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div>
        <?php
        require 'components/header.php'
        ?>
        <div class="grid grid-cols-12 my-4 main-product-description-padding" style="padding: 0 180px;">
            <div class="col-span-3">
                <?php
                require 'components/image.php'
                ?>
            </div>
            <div class="col-span-6">
                <?php
                require 'components/description.php'
                ?>
            </div>
            <div class="col-span-3">
                <?php
                require 'components/add_to_cart.php'
                ?>
            </div>
        </div>
        <div style="padding: 0 80px;" class="product-specifics">
            <p style="font-size: 24px; font-weight: 600;">Product specifics</p>
            <div class="border p-3 shadow-sm gap-3">
                <?php
                require 'components/product_specifics.php'
                ?>
            </div>
        </div>
        <div>
            <?php
            require 'components/related_products.php'
            ?>
        </div>
    </div>
    <?php
    require './components/footer.php';
    ?>

    <style>
        @media(width <=990px) {
            .main-product-description-padding {
                padding: 0 30px !important;
                display: block !important;
                ;
            }

            .product-description-image {
                max-width: 300px;
            }

            .product-specifics {
                padding: 0 10px !important;
            }
        }
    </style>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js (required by Bootstrap 4 modals) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Bootstrap 4 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>