
<style>
    .shopping-ideas a{
        display: block;
    }
    @media(width <= 425px) {
        .product-grid{
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            padding: 0 50px;
        }
    }

    @media(width <= 570px) {
        .buy a{
            font-size: 11px !important;
        }   
        .buy{
            padding: 5px !important;
        }
    } 
    </style>
<div class="my-3 mx-3">
    <p style="font-size: 30px; font-weight: 600;">Your search</p> 
</div>
<section class="product-section m5-3" id="products">
    
    <div class="product-grid">
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['query'])) {
                $search_item = $_GET['query'];
            
                $products = mysqli_query(
                    $conn,
                    "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_name LIKE '%$search_item%' OR product_brand LIKE '%$search_item%' OR name LIKE '%$search_item%'"
                );

                if(mysqli_num_rows($products) == 0) {
                    ?>
                        <div class="alert alert-warning">
                            No products found matching your search. Try searching with a different keyword.
                        </div>
                    <?php    
                } 

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
                                <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="Fossil Watch" style="max-width: 180px;" onclick="window.location.replace('product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')">
                                <h3><?=$product['product_name']?></h3>
                                <p class="price"><?=number_format($product['price'], 2)?> Frw</p>
                                <div class="buy">
                                    <a href="./services/add_to_cart.php?add_cart_id= <?=$product['product_id']?>&cart_id= <?php $user_id = $decode -> data -> id; $select_user_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'"); if($select_user_cart) { foreach($select_user_cart as $user_cart) { echo $user_cart['cart_id']; } } ?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>">Add to cart</a>
                                </div>
                                <p class="rating">★★★★☆</p>
                            </div>
                        </div>
                    <?php
                }

            }
        ?>
        
        
    </div>
</section>

