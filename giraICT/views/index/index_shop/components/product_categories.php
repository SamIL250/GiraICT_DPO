<style>
    .category-container{
        background: white; 
        border-radius: 0px; 
        transition: box-shadow 0.3s ease-in-out;
    }

    .category-container:hover{
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- Container Start -->
<div class="container">
    <div>
        <p style="font-size: 30px;" class="my-5">Browse our store</p>
    </div>
    <div class="row">
        <!-- Card Container Start --> 
        <?php
            $select_categories = mysqli_query(
                $conn, 
                "SELECT * FROM categories"
            );

            if($select_categories) {
                if(mysqli_num_rows($select_categories) > 0) {
                    foreach($select_categories as $category) {
                        $category_name = $category['name'];
                        ?>

                            <a href="index_category_filter.php?category_id= <?=$category['category_id']?>" class="col-md-3 mb-4">
                            <div >
                                <div class="category-container card p-3">
                                    <h5 class="card-title"><?=$category_name?></h5>
                                    
                                    <!-- Upper Section -->
                                    <div class="row mb-3">
                                        <?php
                                            $select_products = mysqli_query($conn, "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE name = '$category_name' ORDER BY name ASC LIMIT 2");
                                            if ($select_products) {
                                                if(mysqli_num_rows($select_products) > 0 ){
                                                    foreach ($select_products as $product) {
                                                        ?>
                                                            <div class="col-6 mb-2">
                                                                <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="<?=$product['product_name']?>" class="img-fluid" style="height: 100px; object-fit: cover;">
                                                                <p class="mt-2" style="font-size: 13px;"><?=$product['product_name']?></p>
                                                            </div>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<div class='p-3'>No products found in this category.</div>";
                                                }

                                            }
                                        ?>
                                    </div>
                                    
                                    <!-- Lower Section -->
                                    <div class="row">
                                        <?php
                                            $select_products = mysqli_query($conn, "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE name = '$category_name' ORDER BY product_name ASC LIMIT 2");
                                            if ($select_products) {
                                                foreach ($select_products as $product) {
                                                    ?>
                                                        <div class="col-6 mb-2">
                                                            <img src="../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$product['image_url']?>" alt="<?=$product['product_name']?>" class="img-fluid" style="height: 100px; object-fit: cover;">
                                                            <p class="mt-2" style="font-size: 13px;"><?=$product['product_name']?></p>
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                            </a>
                        <?php
                    }
                } else {
                    echo "<div class='p-3'>No categories found.</div>";
                }
            }
        
        
        ?>



        <!-- Card Container End -->
    </div>
</div>
<!-- Container End -->
