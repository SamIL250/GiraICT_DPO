<?php
    session_start();
    require './components/signed_out_components/header.php';
    require './config/config.php';
 
    //main variables
    $product_checkout_id = ""; 

    //product variables
    $total_amount = "";
    $product_name = "";
    $product_price = ""; 
    $product_quantity = 1;
 
 

    if(isset($_GET['product_session_id'])) {
        $product_checkout_id = $_GET['product_session_id']; 
        //select product
        
        $select_product = mysqli_query(
            $conn, 
            "SELECT * FROM products WHERE product_id = '$product_checkout_id'"
        );
        if($select_product) {
            foreach($select_product as $product) {
                $product_name = $product['product_name'];
                $product_price = $product['price'];  
                // $product_quantity = $product['quantity'];
                break;
            } 
        }
    } 

     
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.1/css/all.min.css" integrity="sha512-7ABO7dzyLyzxkTo8+FZbr1GqM5b7Eym3ocgH1yTgQp0WXAsZdNEx57BZ9ti3Oj7vlpCjjDNeAhHf7uCWokAKCg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->



    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- //font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">  
    <!--For The modal Login form--> 
</head>
<style>
    
</style>
<body> 

<style>
    .btn-red {
        background-color: var(--secondary);
        color: white;
    } 
    .total-amount {
        font-size: 2rem;
        color: #888;
        font-weight: bold;
    }
    .card-custom {
        border: none;
        background-color: whitesmoke;
    }

    input:invalid{
        border: 1px solid red;
    }
    </style>

<div class="container mt-5">

    <?php 
        if(isset($_SESSION['signed_out_order_message'])) {
            if($_SESSION['signed_out_order_message'] == 'Your order has been placed, we will contact you soon'){
                ?>
                     <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                        <?= $_SESSION['signed_out_order_message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            } else{
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                        <?= $_SESSION['signed_out_order_message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
            }

            unset($_SESSION['signed_out_order_message']);
        }
    ?>

    <div class="my-2">
        <?php
            require './components/back_btn.php';
        ?>
    </div>
    <div class="row">
        <!-- Left Column (Customer Information, Payment Method) -->
         <form class="col-lg-7" action="./services/payment/signed_out_payment/pay_with_cod.php" method="post">
            <div >
                <div class="card card-custom p-4 mb-4">
                    <h5>Customer Information</h5> 
                    <div class="alert alert-warning" role="alert">For the best shopping experience, we recommend logging in to manage your orders easily and receive personalized offers. However, feel free to continue as a guest if you prefer – you can still place your order without logging in!<a href="./auth/login.php" class="btn bg-dark text-white border bg-light">Login to your account</a></div>'
                       
                    <div class="mb-3">
                        <input type="hidden" name="order_user_id" value="" id="">
                        <label for="" class="form-label">Full names</label>
                        <input type="text" class="form-control" name="names" placeholder="Full names" value="" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone number, eg: 079... or 078..." value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email@example.com" value="" required>
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Country</label>
                            <select class="form-select" name="country" required>
                            <option selected hidden>Select Country</option>
                                <option value="rwanda">Rwanda</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Legion</label>
                            <select class="form-select" name="city_legion" required>
                                <option selected hidden>Select City legion</option>
                                <option value="nyarugenge">Nyarugenge</option>
                                <option value="kicukiro">Kicukiro</option>
                                <option value="gasabo">Gasabo</option>
                                <option value="kamonyi">Kamonyi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Delivery address</label>
                        <input type="text" class="form-control" name="address" placeholder="Delivery address" value="" required>
                    </div>
                </div>

                <!-- product details -->
                 <div> 
                    <input type="hidden" name="product_id" value="<?=$product_checkout_id?>" id="">
                    <input type="hidden" name="product_name" value="<?=$product_name?>"  id="">
                    <input type="hidden" name="product_price" value="<?=$product_price + 1000 ?>"  id="">
                    <input type="hidden" name="product_quantity" value="<?=$product_quantity?>"  id="">
                 </div>

                <!-- Payment Method Section -->
                <div class="card card-custom p-4">
                    <h5>Payment Method</h5>
                    <div class="btn-group w-100 mb-3">
                        <span class="btn btn-outline-success w-50"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Cash on Delivery (COD)</span>
                        <!-- <button class="btn btn-outline-secondary w-50">FlutterWave</button> -->
                    </div>
                    <div class="mb-2"> 
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <p>You can pay cash when you get your order</p> 
                                <button class="btn btn-outline-success w-50" name="order_with_cod">Make order</button>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group w-100 mb-3">
                        <span class="btn btn-outline-warning w-50"  data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">Flutter Wave</span>
                        <!-- <button class="btn btn-outline-secondary w-50">FlutterWave</button> -->
                    </div>
                    <div class="mb-2"> 
                        <div class="collapse" id="collapseExample2">
                            <div class="card card-body">
                                <span class="btn btn-outline-warning w-50" name="order_with_cod">Make order</button>
                            </div>
                        </div>
                    </div>

                                  
                </div>
            </div>
        </form>

        <!-- Right Column (Order Summary) -->
        <div class="col-lg-5">
            <div class="card card-custom p-4 mb-4">
                <h5>Total Amount</h5>
                <p class="total-amount"><?=$product_price?> Frw</p>
                <p class="text-success">Secure Payment</p>

                <hr>

                <h6>Order Summary</h6>
                <p><?=$product_name?></p>
                <p>Quantity 1</p>
                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span><?=$product_price?> Frw</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>1000 Frw</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span><strong>Total</strong></span>

                    <span class="total-amount"><?=$product_price + 1000 ?> Frw</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript Libraries -->
 <!-- jQuery (required by Bootstrap 4 JS) -->
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
