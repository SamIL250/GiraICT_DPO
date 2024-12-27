<div class="my-4">
    <?php
        $user_id = $decode -> data -> id;
        $check_user_cart = mysqli_query(
            $conn,
            "SELECT * FROM cart WHERE user_id = '$user_id'"
        );

        $cart_id  = "";
        foreach($check_user_cart as $cart) {
            $cart_id  = $cart['cart_id'];
        }
        



        if($check_user_cart) {
            if(mysqli_num_rows($check_user_cart) > 0){
                $check_cart_items = mysqli_query(
                    $conn,
                    "SELECT * FROM cart_items WHERE cart_id = '$cart_id'"
                );

                if($check_cart_items) {
                    if(mysqli_num_rows($check_cart_items) > 0){
 
                        $select_cart_product = mysqli_query(
                            $conn,
                            "SELECT * FROM products INNER JOIN cart_items ON products.product_id = cart_items.product_id WHERE cart_items.cart_id = '$cart_id'"
                        ); 

                        if($select_cart_product) {
                            $total_price = 0;
 
                            $cart_products = $cart_products ?? [];

                            foreach($select_cart_product as $product) {
                                $cart_products[] = $product; 
                                ?>
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Product image" class="img-fluid cart-img">
                                        </div>
                                        <div class="col-md-6">
                                            <h4><?=$product['product_name']?></h4>
                                            <p>Price: <?=number_format($product['price'], 2)?> Frw</p>
                                            <form action="./services/update_cart_item_quantity.php" method="post" class="d-flex">
                                                <input type="hidden" name="product_id" value="<?=$product['product_id']?>" id="">
                                                <input type="hidden" name="cart_item_id" value="<?=$product['cart_item_id']?>">
                                                <input type="number" min="0" name="quantity" value="<?=$product['quantity']?>" min="1" class="form-control" style="width: 50px;">
                                                <button class="btn border" name="updateQuantity">Update</button>
                                            </form>
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Subtotal: <?php $sub_total = $product['price'] * $product['quantity']; echo number_format($sub_total, 2)?> Frw</p>
                                            
                                            <a href="./services/remove_cart_item.php?cart_item_id=<?=$product['product_id']?>" class="btn border" style="">Remove</a>
                                            <!-- checkout -->
                                             <?php
                                                if($product['product_quantity'] <= 0) {
                                                    ?>
                                                        <a class="btn border bg-[#999]">Out of stock</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <a href="./checkout.php?product_checkout_id= <?=$product['product_id']?>&checkout_user_id= <?= $user_id = $decode -> data -> id?>&total_amount= <?=$product['price']*$product['quantity']?>&cart_item_id= <?=$product['cart_item_id']?>&cart_id= <?=$cart_id?>" class="btn border btn-success" style="">Checkout</a>
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
                }
            } else {
                ?>
                    <div class="pt-5">
                        <p style="font-size: 25px;">Your cart is not activated!</p>
                    </div>
                    <div>
                        <form action="./services/activate_cart.php" method="post">
                            <input type="hidden" name="user_id" value="<?=$user_id?>" id="">
                            <button name="activateCart" class="border text-white" style="background: black; padding: 10px 30px;">Activate your cart</button>
                        </form>
                    </div>
                <?php
                 
            }
        }
    ?>
</div>
