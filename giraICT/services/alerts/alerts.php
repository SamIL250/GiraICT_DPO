<?php 
    if (isset($_SESSION['cart_success'])){
        if($_SESSION['cart_success']  == "Product added to cart!" or $_SESSION['cart_success']  == "Product quantity updated in cart!") {
            ?>
                <div class="alert alert-dismissible fade show" style="position: fixed; right: 0px; bottom: 0px; z-index: 11111; background: whitesmoke;" role="alert">
                        <?= $_SESSION['cart_success']; ?>
                    <?php
                            if(isset($_SESSION['product__added_id'])) {

                                $product_added_id = $_SESSION['product__added_id'];
                                //select product
                                $select_product_added_to_cart = mysqli_query(
                                    $conn, 
                                    "SELECT * FROM products WHERE product_id = '$product_added_id'"
                                ); 
                                //foreach loop
                                foreach($select_product_added_to_cart as $product) {
                                    ?>
                                        <div class="grid grid-cols-12 my-2" style="border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0px;">
                                            <div class="col-span-3" style="background: whitesmoke; padding: 10px;">
                                                <img src="../../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="" style="width: 100%; max-height: 200px; object-fit: cover;">
                                            </div>
                                            <div class="col-span-9" style="padding: 10px 30px">
                                                <p style="font-size: 18px; font-weight: 600;"><?=$product['product_name']?></p>
                                                <p><?=$product['product_description']?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, necessitatibus</p>
                                                <a href="cart.php">
                                                    <button class="btn" style="background: black; color: white;">View cart</button>
                                                </a>
                                                <a href="./checkout.php?product_checkout_id= <?=$product['product_id']?>&checkout_user_id= <?php if(isset($_SESSION['user_id'])) { echo $_SESSION['user_id']; unset($_SESSION['user_id']); } ?>&total_amount= <?=$product['price']?>&cart_item_id= <?php if(isset( $_SESSION['cart_items_id'])) { echo $_SESSION['cart_items_id']; unset($_SESSION['cart_items_id']); } ?>">
                                                    <button class="btn" style="background: red; color: white;">Checkout</button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- //view cart btn -->
                                        

                                    <?php
                                    
                                    
                                    
                                }
                                unset($_SESSION['product__added_id']); // Clear session after showing message
                            }
                    ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
        } else {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?=$_SESSION['cart_success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        unset($_SESSION['cart_success']); // Clear session after showing 
    }
?>

<?php if (isset($_SESSION['remove_items_from_cart'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
            <?=$_SESSION['remove_items_from_cart'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['remove_items_from_cart']); // Clear session after showing ?>
<?php endif; ?>

<?php if (isset($_SESSION['cart_activated'])): ?>
        <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
            <?= $_SESSION['cart_activated']; ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['cart_activated']); // Clear session after showing ?>
<?php endif; ?>

<?php if (isset($_SESSION['order_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
            <?= $_SESSION['order_success']; ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['order_success']); // Clear session after showing ?>
<?php endif; ?>


<?php if (isset($_SESSION['profile_update_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
            <?= $_SESSION['profile_update_success']; ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['profile_update_success']); // Clear session after showing ?>
<?php endif; ?>

<?php
    if(isset( $_SESSION['feedback_sent'])) {
        if( $_SESSION['feedback_sent'] == "Thank you for your feedback!") {
            ?>
                <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?=$_SESSION['feedback_sent']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            <?php
        } else {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?=$_SESSION['feedback_sent']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
           
        }

        unset($_SESSION['feedback_sent']);
    }

    if(isset($_SESSION['canceled_order_message'])) {
        if($_SESSION['canceled_order_message'] == "Your order has been canceled!" or $_SESSION['canceled_order_message'] == "Your order has been re-ordered.") {
            ?>
                <div class="alert alert-success alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?=$_SESSION['canceled_order_message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        } else {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" style="position: fixed; right: 20px; bottom: 20px; z-index: 11111;" role="alert">
                    <?=$_SESSION['canceled_order_message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        unset($_SESSION['canceled_order_message']);
    }
?>