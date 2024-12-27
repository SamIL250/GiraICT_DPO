<style>
    @media(width <= 425px) {
        .product-grid{
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            padding: 0 50px;
        }
    }
</style>

<section class="product-section my-3" id="products">
    <h2 style="margin-bottom: 20px;">Some Of Our Products</h2>
    <div class="product-grid">
        <?php
            $products = mysqli_query(
                $conn,
                "SELECT * FROM products ORDER BY RAND() LIMIT 17"
            );

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
                            <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Fossil Watch" onclick="window.location.replace('index_product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')">
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
        ?>
        
        <div class="" style="position: relative;">
            <button onclick="window.location.replace('index_shop.php')" class="border text-light py-2 px-4 w-100" style="background: tomato; position:absolute; bottom: 0;">More</button>
        </div>
    </div>
</section>


<style>
    
    @media(width <= 570px) {
        .buy{
            padding: 5px !important;
        }
        .buy a{
            font-size: 11px !important;

        }   
    }
</style>