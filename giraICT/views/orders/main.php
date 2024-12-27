<style>
#order-history h2 {
    color: #333;
    font-weight: bold;
}

.order-list h4, .order-details h4 {
    color: #333;
    font-weight: bold;
    margin-bottom: 20px;
}

.order-item, .order-product, .order-summary {
    border-color: #ddd;
    border-width: 0 0 1px 0;
}

.order-item h5, .order-product h6 {
    color: #333;
    margin-bottom: 8px;
}

.order-item p, .product-info p {
    color: #666;
    margin: 0;
}

.order-summary {
    color: #333;
    font-weight: bold;
}

.order-summary p {
    margin: 0;
    color: #333;
}

.order-summary h5 {
    color: #000;
    font-weight: bold;
}

.product-image {
    width: 100%;
    max-width: 60px;
    height: auto;
    object-fit: cover;
}

.btn-outline-dark {
    border: 1px solid #333;
    color: #333;
    font-weight: bold;
}

.btn-outline-dark:hover {
    background-color: #333;
    color: #fff;
}

/* Badge Styles */
.badge {
    display: inline-block;
    padding: 3px 8px;
    font-size: 0.9rem;
    font-weight: bold;
    color: #fff;
    text-align: center;
}

.badge-completed {
    background-color: #28a745; /* Green for Completed */
}

.badge-pending {
    background-color: #ffc107; /* Yellow for Pending */
}

/* Responsive Adjustments */
@media(width <= 902px){
    .order-details {
        padding: 20px !important;
    }

    .order-product {
        flex-wrap: wrap !important;
        text-align: center !important;
    }

    .product-image {
        margin: 0 auto 15px !important;
    }

    .badge {
        position: static !important;
        margin: 10px 0 !important;
    }

    .btn-outline-dark {
        width: 100% !important;
    }
}

@media(width <= 991px) {
    .order-product{
        display: block !important;
    }
}

@media(width <= 500px) {
    #order-history{
        padding: 0 10px !important;
    }
}
</style>

<div id="order-history" class="container-fluid py-5" style="padding: 0 80px;">
    <?php
        require './components/back_btn.php'
    ?>
    <div class="row mt-2"> 
       <!-- Order Details Section -->
       <div class="col-lg-8 col-md-7 col-sm-12">
            <div class="order-details p-4 border">
                <h4 class="mb-4">Order List</h4>
                
                <!-- Product List for the Selected Order -->
                <div class="order-products">
                    <?php
                        if(isset($_GET['order_user_id'])) {
                            $order_user_id = $_GET['order_user_id']; 
                            
                            // Get user details from database
                            $user_profile = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$order_user_id'"); 
                            $name = "";
                            $email = "";
                            $phone = "";
                            $address = "";
                            $country = "";
                            $city_legion = "";
                            $address = "";
                            
                            // Get user details from database
                            foreach($user_profile as $profile){
                                $name = $profile['name'];
                                $email = $profile['email'];
                                $phone = $profile['phone'];
                                $address = $profile['address'];
                                $country = $profile['country'];
                                $city_legion = $profile['city_legion'];
                            }

                            //get orders for the user
                            $user_orders = mysqli_query(
                                $conn,
                                " SELECT 
                                order_items.*,
                                orders.order_id,
                                orders.user_id,
                                orders.total,
                                orders.status,
                                orders.canceled,
                                orders.created_at AS order_date, 
                                users.*,
                                products.*,
                                stock.*
                                FROM 
                                    order_items 
                                INNER JOIN orders ON order_items.order_id = orders.order_id 
                                INNER JOIN users ON orders.user_id = users.user_id 
                                INNER JOIN products ON order_items.product_id = products.product_id 
                                INNER JOIN stock ON products.stock_id = stock.stock_id
                                WHERE orders.user_id = '$order_user_id'
                                ORDER BY order_date DESC"
                            );

                            foreach($user_orders as $order) {
                                ?> 
                                    <!-- Product 1 -->
                                    <div class="order-product d-flex mb-3 border-bottom pb-2" style="position: relative;">
                                        <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$order['image_url']?>" alt="Product Image" class="product-image me-3">
                                        <div class="product-info">
                                            <h6><?=$order['product_name']?></h6>
                                            <p>Quantity: <?=$order['quantity']?></p> 
                                            <p><strong>Subtotal: <?=number_format($order['price'] * $order['quantity'], 2)?> Frw</strong></p>
                                        </div>
                                        <?php
                                            if($order['status'] == 'pending') {
                                                ?>
                                                    <span class="badge badge-pending" style="border-radius: 30px; height: auto; display: flex !; position: absolute; right: 20px; top: 0px;">Pending</span>
                                                    <?php
                                                        if($order['canceled'] == 'false') {
                                                            ?>
                                                                <a href="./services/orders/cancer_order.php?canceled_order=<?=$order['order_id']?>&order_user_id=<?=$order_user_id?>" class="border badge text-dark py-2" style="height: auto; display: flex !; position: absolute; right: 20px; bottom: 15px;">Cancel order</a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <a href="./services/orders/re_order.php?canceled_order=<?=$order['order_id']?>&order_user_id=<?=$order_user_id?>" class="border badge text-dark py-2" style="height: auto; display: flex !; position: absolute; right: 20px; bottom: 15px;">Re-order</a>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                <?php
                                            } else {
                                                ?>
                                                    <span class="badge badge-completed" style="border-radius: 30px; height: auto; display: flex !; position: absolute; right: 20px; top: 0px;">Completed</span>
                                                <?php
                                            } 
                                        ?>
                                        
                                    </div>
                                
                                <?php
                            }
                        }
                    ?>
                    

                     
                </div>
 
            </div>
        </div>
        <!-- Order List Section -->
        <div class="col-lg-4 col-md-5 col-sm-12 text-center">
            <div>
                <img src="./img/eshuri.png" style="width: 100%;" alt="">
                <p class="my-3" style="font-size: 1.5rem;">The Best Learning App For You</p>
                <button  onclick="window.location.replace('https://eshuri.org/')" class="btn border" style="background: #3170f6; color: white;">Apply now </button>
            </div>
        </div>   
        
        
    </div>
</div>
