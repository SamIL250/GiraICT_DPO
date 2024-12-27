<div class="my-4">
    <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $total_price = 0;
            foreach ($_SESSION['cart'] as $product_id) {
                // Fetch each product by its ID
                $select_cart_product = mysqli_query(
                    $conn,
                    "SELECT * FROM products WHERE product_id = '$product_id'"
                );
                
                if ($select_cart_product && mysqli_num_rows($select_cart_product) > 0) {
                    $product = mysqli_fetch_assoc($select_cart_product);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <img src="../../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Product image" class="img-fluid cart-img">
                        </div>
                        <div class="col-md-6">
                            <h4><?=$product['product_name']?></h4>
                            <p>Price: <?=number_format($product['price'], 2)?> Frw</p>
                            <div class="d-flex">
                                <input type="hidden" name="cart_item_id" value="<?=$product['product_id']?>">
                                <input type="number" min="1" disabled name="quantity" value="1" class="form-control" style="width: 50px;">
                                <button class="btn border" name="updateQuantity">Update</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p>Subtotal: <?php $sub_total = $product['price'] * 1; echo number_format($sub_total, 2)?> Frw</p>
                            <a href="./services/session_cart/remove_cart_session.php?product_session_id=<?=$product['product_id']?>" class="btn border" style="">Remove</a>
                            <?php
                                if($product['product_quantity'] <= 0) {
                                    ?>
                                        <a class="btn border" style="background: whitesmoke;">out of stock</a>
                                    <?php
                                } else {
                                    ?>
                                        <a href="./session_checkout.php?product_session_id=<?=$product['product_id']?>" class="btn border btn-success">Checkout</a>
                                    <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
        } else {
            ?>
            <div class="my-5">
                <p style="font-size: 25px;">No items yet!</p>
            </div>
            <?php
        }
    ?>
</div>
