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
                            <div class="product-card">

                                <div style="width: 100%; max-height: 200px;">
                                    <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" onclick="window.location.replace('index_product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')" alt="Apple MacBook Pro" style=" width: 100%; height: 100%; object-fit: cover; max-height: 200px;">
                                </div>
                                <h3><?=$product['product_name']?></h3>
                                <p class="price"><?=$product['price']?> Frw</p>
                                <div class="buy">
                                <a href="./services/session_cart/cart.php?product_id= <?=$product_id?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>" class="border btn" style="background: black; color: white;">
                                    Add to cart
                                </a>
                                </div>
                                <p class="rating">★★★★☆</p>
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