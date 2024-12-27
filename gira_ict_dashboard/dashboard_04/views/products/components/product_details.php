<?php
    $product_detail_id = "";

    if (isset($_GET['product_detail_id'])) {
        $product_detail_id = $_GET['product_detail_id'];
    }
?>

<style>
    .customer-details p{
        margin-bottom: 10px;
    }

</style>

<!-- Container for the page content -->
<div class="container mx-auto mt-8">

<!-- Back to Orders Button -->
<a href="./products.php" class="text-blue-500 hover:underline border px-2 text-dark">&larr; Back to Products</a>

<!-- Product Details Card -->


<?php

    $select_product = mysqli_query(
        $conn,
        "SELECT * FROM products 
        JOIN stock ON products.stock_id = stock.stock_id
        JOIN categories ON products.category_id = categories.category_id
        WHERE product_id = '$product_detail_id'"
    );

    foreach ($select_product as $product) {
        ?>
            <div class="bg-white shadow-sm mt-4 p-6">
            <div class="flex flex-col md:flex-row">

            <!-- Product Image -->
            <div class="md:w-1/3">
                <img src="./data/images/<?=$product['image_url']?>" alt="Product Image" class="w-full h-auto object-cover">
                <?php
                    if($product['in_stock'] == 'false') {
                        ?>
                            <span class="text-red-500 font-semibold bg-gray-200 py-1 px-2 mt-2 inline-block">Out of stock</span>
                        <?php
                    } else {
                        ?>
                            <span class="text-green-500 font-semibold bg-gray-200 py-1 px-2 mt-2 inline-block">In stock</span>
                        <?php
                    }
                ?>
            
            </div>

            <!-- Product Details -->
            <div class="md:w-2/3 md:pl-8 mt-4 md:mt-0">

                <!-- Product Title -->
                <h1 class="text-2xl font-semibold"><?=$product['product_name']?></h1>

                <!-- Price -->
                <p class="text-gray-700 text-lg font-bold mt-2"><span class="" style="font-weight: 300;">Unit price</span>: <?=number_format($product['price'], 2)?> Frw</p>
                <p class="text-gray-700 text-lg font-bold mt-2"><span class="" style="font-weight: 300;">Stock price</span>: <?=number_format($product['price'] * $product['product_quantity'], 2)?> Frw</p>

                <!-- Product Description -->
                <div class="mt-4">
                    <h2 class="text-lg font-semibold">Description</h2>
                    <p class="text-gray-600 mt-2"><?=$product['product_description']?></p>
                    <br>
                    <p>Stock: <span class="font-bold"><?=$product['stock_name']?></span></p>
                    <br>
                    <span class="border-2 px-2 my-3 font-bold">Quantity: <?=$product['product_quantity']?></span>
                </div> 


                
            </div>

            </div> 
            <div class="my-5">
                <p class="font-bold text-3xl">More specifics</p>
            </div>
            <div class="row specifics">
                <!-- Left Column -->
                <div class="col-12 col-md-6">
                
                <div class="d-flex justify-content-between">
                    <strong>Type</strong>
                    <span><?=$product['name']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Color</strong>
                    <span style="width: 40px; height: 20px; background: <?=$product['color']?>;"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Condition</strong>
                    <span><?=$product['condition']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Country/Region of Manufacture</strong>
                    <span><?=$product['country_of_origin']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Brand</strong>
                    <span><?=$product['product_brand']?></span>
                </div>
                </div>

                <!-- Right Column -->
                <div class="col-12 col-md-6">
                <div class="d-flex justify-content-between">
                    <strong>Material</strong>
                    <span><?=$product['product_material']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Included accessories</strong>
                    <span><?=$product['included_materials']?></span>
                </div> 
                </div>
            </div>
            </div>
        <?php
    }

?>

</div>