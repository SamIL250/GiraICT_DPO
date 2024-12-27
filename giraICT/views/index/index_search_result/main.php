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
            <button class="border shadow py-2 px-4" style="background: transparent;" onclick="window.location.replace('./session_cart.php')">View Cart</button>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['added_session_cart']); // Clear session after showing ?>
<?php endif; ?>

<style>
    .shopping-ideas a{
        display: block;
    }
    @media(width <= 425px) {
        .product-grid{
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            padding: 0 50px;
        }
    }
 
    
    @media(width <= 570px) {
        .buy a{
            font-size: 11px !important;
        }   
        .buy{
            padding: 5px !important;
        }
    } 
</style>

<?php
    require './components/signed_out_components/header.php'; 
?>

 
<div class="my-3 mx-3">
    <p style="font-size: 30px; font-weight: 600;">Your search</p> 
</div>
<section class="product-section m5-3" id="products">
    
    <div class="product-grid">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['query'])) {
                $search_item = $_GET['query'];
            
                $products = mysqli_query(
                    $conn,
                    "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_name LIKE '%$search_item%' OR product_brand LIKE '%$search_item%' OR name LIKE '%$search_item%'"
                );

                if(mysqli_num_rows($products) == 0) {
                    ?>
                        <div class="alert alert-warning">
                            No products found matching your search. Try searching with a different keyword.
                        </div>
                    <?php    
                } 

                //foreach
                foreach($products as $product) {
                    ?>
                        <div>
                            <div class="product-card" style="position: relative;">
                                <?php
                                    if($product['in_stock'] == 'false' or $product['product_quantity'] <= 0) {
                                        ?>
                                            <span class="alert alert-warning" style="position: absolute; top: 0px; right: 0;">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                ?>
                                <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Fossil Watch" style="max-width: 180px;" onclick="window.location.replace('index_product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')">
                                <h3><?=$product['product_name']?></h3>
                                <p class="price"><?=number_format($product['price'], 2)?> Frw</p>
                                <div class="buy">
                                    <a href="./services/session_cart/cart.php?product_id= <?=$product['product_id']?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>">Add to cart</a>
                                </div>
                                <p class="rating">★★★★☆</p>
                            </div>
                        </div>
                    <?php
                }

            }
        ?>
        
        
    </div>
</section>



<?php
    require './components/footer.php';
?>

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