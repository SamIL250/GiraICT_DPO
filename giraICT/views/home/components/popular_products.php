  <!-- Popular Products Section -->
  <section class="product-section container">
    <div class="product-grid">  
        <?php
            $select_products = mysqli_query(
                $conn, 
                "SELECT 
                    products.*, 
                    categories.category_id AS categories_category_id, 
                    categories.name, 
                    categories.description 
                    FROM products 
                    INNER JOIN categories 
                    ON products.category_id = categories.category_id ORDER BY RAND()  LIMIT 10"
            );
            if($select_products) {
                if(mysqli_num_rows($select_products) > 0 ) {
                    foreach($select_products as $product) {
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
                                
                                <div style="width: 100%; max-height: 200px;">
                                    <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" onclick="window.location.replace('product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['category_id']?>')" alt="Apple MacBook Pro" style=" width: 100%; height: 100%; object-fit: cover; max-height: 200px;">
                                </div>
                                <h3><?=$product['product_name']?></h3>
                                <p class="price"><?=number_format($product['price'], 2)?> Frw</p>
                                <div class="buy">
                                <?php
                                        $user_id = $decode -> data -> id;
                                        $check_active_cart = mysqli_query(
                                            $conn,
                                            "SELECT * FROM cart WHERE user_id = '$user_id'"
                                        );

                                        if($check_active_cart) {
                                            if(mysqli_num_rows($check_active_cart) > 0) {
                                                ?>
                                                    <a href="./services/add_to_cart.php?add_cart_id= <?=$product['product_id']?>&cart_id= <?php $user_id = $decode -> data -> id; $select_user_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'"); if($select_user_cart) { foreach($select_user_cart as $user_cart) { echo $user_cart['cart_id']; } } ?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>">Add to cart</a>
                                                <?php
                                            }else {
                                                ?>  
                                                <form action="./services/activate_cart.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?=$user_id?>" id="">
                                                    <input type="hidden" name="page_url" value="<?=urlencode($_SERVER['REQUEST_URI'])?>" id="">
                                                    <button name="activateCart" class="border text-white text-sm" style="background: black; padding: 6px 10px;">Activate your cart</button>
                                                </form> 
                                                <?php
                                            } 
                                        }                                                        

                                    ?>
                                    
                                </div> 
                                <p class="rating">★★★★☆</p>
                                <a href="product_details.php?product_id= <?=$product['product_id']?>&product_category_id= <?=$product['categories_category_id']?>" class="btn" style="background: transparent; color: #777;">More <i class="bi bi-arrow-right"></i></a>
                            </div>

                            </div>
                        <?php
                    }
                }
            }
        ?>
        <div class="" style="position: relative;">
            <button onclick="window.location.replace('shop.php')" class="border text-light py-2 px-4 w-100" style="background: tomato; position:absolute; bottom: 0;">More</button>
        </div>
    </div> 
</section>

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


<script>
//  function openProductModal(card) {
//     // Get product data from the clicked card's data attributes
//     var productName = card.getAttribute('data-product-name');
//     var productPrice = card.getAttribute('data-product-price');
//     var productDescription = card.getAttribute('data-product-description');
//     var productImage = card.getAttribute('data-product-image');
//     var productStock = card.getAttribute('data-product-stock');

//     // Populate the modal with the product details
//     document.getElementById('productModalLabel').textContent = productName;
//     document.getElementById('productModalImage').setAttribute('src', productImage);
//     document.getElementById('productModalPrice').textContent = productPrice;
//     document.getElementById('productModalDescription').textContent = productDescription;
//     document.getElementById('productModalStock').textContent = productStock;

//     // Display the modal
//     var productModal = new bootstrap.Modal(document.getElementById('productModal'));
//     productModal.show();
// }
 
</script>