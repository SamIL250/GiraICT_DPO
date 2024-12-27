<div>
    <p style="font-size: 25px; font-weight: 600; padding:5px  80px;">
        related products
    </p>
    <section class="product-section container">
    <div class="product-grid">  
        <?php 
            $select_products = mysqli_query(
                $conn, 
                "SELECT * FROM products WHERE category_id = '$category_id' LIMIT 4"
            );
            if($select_products) {
                if(mysqli_num_rows($select_products) > 0 ) {
                    foreach($select_products as $product) {
                        ?>
                            <div>
                                <div class="product-card">

                                <div style="width: 100%; max-height: 200px;">
                                    <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Apple MacBook Pro" onclick="window.location.replace('product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')" style=" width: 100%; height: 100%; object-fit: cover; max-height: 200px;">
                                </div>
                                <h3><?=$product['product_name']?></h3>
                                <p class="price"><?=$product['price']?> Frw</p>
                                <div class="buy">
                                    <a href="./services/add_to_cart.php?add_cart_id= <?=$product['product_id']?>&cart_id= <?php $user_id = $decode -> data -> id; $select_user_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'"); if($select_user_cart) { foreach($select_user_cart as $user_cart) { echo $user_cart['cart_id']; } } ?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>">Add to cart</a>
                                </div>
                                <p class="rating">★★★★☆</p>
                                </div>
                            </div>
                        <?php
                    }
                }
            }
        ?>
    </div> 
</section>
</div>

<style>
    @media(width <= 570px) {
        .buy a{
            font-size: 11px !important;
        }   
        .buy{
            padding: 5px !important;
        }
    } 
</style>