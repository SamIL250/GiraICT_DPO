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

<?php
    //main variables
    $product_checkout_id = "";
    $checkout_user_id = "";

    //product variables
    $total_amount = "";
    $product_name = "";
    $product_price = ""; 
    $product_quantity = "";

    //user variables
    $user_names = "";
    $phone = "";
    $email = "";
    $country = ""; 
    $city_legion = "";
    $address = "";

    if(isset($_GET['products'])) {
        $products = $_GET['products'];

        foreach($products as $product) {
            $product_checkout_id = $product['product_id'];
            $product_price = $product['price'];
            $quantity = $product['quantity'];
        }
    }
    
    $checkout_user_id = isset($_GET['checkout_user_id']) ? $_GET['checkout_user_id'] : null; 
    $total_amount = isset($_GET['total_amount']) ? $_GET['total_amount'] : null;
    $cart_id = isset($_GET['cart_id']) ? $_GET['cart_id'] : null; 
    $total_quantity = isset($_GET['total_quantity']) ? $_GET['total_quantity'] : null;
    $product_names = isset($_GET['product_names']) ? $_GET['product_names'] : null;

    if(isset($_GET['checkout_user_id'])) {
        $checkout_user_id = $_GET['checkout_user_id']; 
        //select user
        $select_user = mysqli_query(
            $conn, 
            "SELECT * FROM users WHERE user_id = '$checkout_user_id'"
        );
        if($select_user) {
            foreach($select_user as $user) {
                $user_names = $user['name'];
                $phone = $user['phone'];
                $email = $user['email'];
                $country = $user['country'];
                $city_legion = $user['city_legion'];
                $address = $user['address']; 
                break;
            }
        }
    } 
?> 

<div class="container mt-5">
    <div class="my-2">
        <?php
            require './components/back_btn.php';
        ?>
    </div>
    <div class="row">
        <!-- Left Column (Customer Information, Payment Method) -->
         <form class="col-lg-7" action="./services/payment/cod_multiple_payments/payment.php" method="post">
            <div >
                <div class="card card-custom p-4 mb-4">
                    <h5>Customer Information</h5>
                    <?php
                        $check_complete_profile = mysqli_query(
                            $conn, 
                            "SELECT * FROM users WHERE email = '$email'"
                        );
                        foreach ($check_complete_profile as $customer) {
                            if($customer['address'] == '' && $customer['phone'] == '') {
                                ?>
                                    <div class="alert alert-warning" role="alert">Please complete your profile to proceed with checkout, or fill out the form manually. <a href="profile.php?user_id= <?=$customer['user_id']?>" class="btn bg-dark text-white border bg-light">Complete profile</a></div>'
                                <?php
                                break;
                            }
                        }
                    ?>
                    <div class="mb-3">
                        <input type="hidden" name="order_user_id" value="<?=$checkout_user_id?>" id="">
                        <label for="" class="form-label">Full names</label>
                        <input type="text" class="form-control" name="names" placeholder="Full names" value="<?=$user_names?>" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone number" value="<?=$phone?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email@example.com" value="<?=$email?>" required>
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" value="Rwanda" required> 
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
                        <input type="text" class="form-control" name="address" placeholder="Delivery address" value="<?=$address?>" required>
                    </div>
                </div>

                <!-- product details -->
                 <div>
                     <!-- Cart ID -->
                    <input type="hidden" name="cart_id" value="cartId: <?=$cart_id?>" id="">

                    <!-- Loop through products and add input fields for product_id, product_name, product_price, and product_quantity -->
                    <?php foreach ($products as  $product): ?>
                        <input type="hidden" name="product_ids[]" value="<?=$product['product_id']?>" id=""> 
                        <input type="hidden" name="prices[]" value="<?=$product['price']?>" id="">
                        <input type="hidden" name="quantities[]" value="<?=$product['quantity']?>" id="">
                    <?php endforeach; ?>
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
                <p class="total-amount"><?=number_format($total_amount, 2)?> Frw</p>
                <p class="text-success">Secure Payment</p>

                <hr>

                <h6>Order Summary</h6>
                <p><?=$product_names?></p>
                <p>Quantity <?=$total_quantity?></p>
                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span><?=$total_amount?> Frw</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>1000 Frw</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span><strong>Total</strong></span>
                    <span class="total-amount"><?=$total_amount + 1000?> Frw</span>
                </div>
            </div>

            
        </div>
    </div>
</div>
