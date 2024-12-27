<div class="my-3 mx-4">
    <h1>My Cart</h1>
    <div>
        <div class="card p-3">
            <p style="font-weight: 600;">Sub Total: 
                <?php
                    $total_price = "";
                    $select_sum = mysqli_query(
                        $conn,
                        "SELECT SUM(products.price * cart_items.quantity) AS total_cart_price
                        FROM products
                        INNER JOIN cart_items ON products.product_id = cart_items.product_id
                        WHERE cart_items.cart_id = '$cart_id'"
                    );

                    if($select_sum) {
                        $sum = $select_sum->fetch_assoc(); // Assuming $select_sum is the result of the query
                        $total_price = $sum['total_cart_price'];
                        echo number_format($total_price, 2) . " Frw";
                    }
                ?>
            </p>
            <p>Delivery fee: 1,000 Frw</p>
            <p style="font-weight: 600;">Total: <span style="font-size: 30px;"> <?=number_format($total_price + 1000, 2)?> Frw</span></p> 
            <?php
                $user_id = $decode->data->id;
                // Initialize variables
                $product_data = [];
                $total_amount = 0;
                $total_quantity = 0;
                $product_names = "";
                
                if (!empty($cart_products)) {
                    foreach ($cart_products as $product) {
                        // Accumulate product data
                        $product_data[] = [
                            'product_id' => $product['product_id'],
                            'quantity' => $product['quantity'],
                            'price' => $product['price'],
                        ];
                        
                        // Accumulate total amount and quantity
                        $total_amount += $product['price'] * $product['quantity'];
                        $total_quantity += $product['quantity'];
                        
                        // Append product name
                        $product_names .= $product['product_name'] . ", ";
                    }
                
                    // Remove the trailing comma and space from product names
                    $product_names = rtrim($product_names, ', ');
                
                    // Encode the product data into a query string
                    $product_query = http_build_query(['products' => $product_data]);
                
                    // Prepare the checkout link
                    $checkout_url = "./checkout_total.php?$product_query&checkout_user_id=$user_id&total_amount=$total_amount&cart_id=$cart_id&total_quantity=$total_quantity&product_names=" . urlencode($product_names);
                } 
                
            ?>

            <?php
                if (empty($product_data)) {
                    ?>
                        <p class="alert alert-danger">Your cart is empty. Add items to proceed to checkout.</p>
                    <?php
                } else {
                    ?>
                        <a href="<?= $checkout_url ?>" class="border w-100 px-2 py-2" 
                        style="background-color: #f5ed4d; font-weight: 600;">
                            Check out
                        </a>
                    <?php
                }
            ?>

            
        </div>
        <h3 class="mt-3">My Orders</h3>
        <?php
            //check if user has ordered
            $check_order = mysqli_query(
                $conn,
                "SELECT * FROM orders WHERE user_id = '$user_id'"
            );
            if(mysqli_num_rows($check_order) > 0 ) {
                ?>
                    <button onclick="window.location.replace('orders.php?order_user_id=<?=$user_id?>')" class="w-100 py-2 border px-3 d-flex items-center  alert-success" style="justify-content: space-between;">
                        <span>Check Orders</span> <i class="bi bi-arrow-right-square"></i>
                    </button>
                <?php
            } else {
                ?>
                    <div class="border p-2 alert-warning d-flex items-center">
                        No orders yet.
                    </div>
                <?php
            }
        ?>
    </div>
</div>