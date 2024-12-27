<?php
    $order_id = "";
    if(isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
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
<a href="./purchases.php" class="text-blue-500 hover:underline border px-2 text-dark">&larr; Back to Purchases</a>

<!-- Product Details Card -->
<?php
    $select_order_details = mysqli_query(
        $conn,
        "SELECT 
        order_items.*,
        orders.order_id,
        orders.user_id,
        orders.total,
        orders.status,
        orders.canceled,
        orders.created_at AS order_date, 
        users.*,
        products.*,
        stock.*
        FROM 
            order_items 
        INNER JOIN orders ON order_items.order_id = orders.order_id 
        INNER JOIN users ON orders.user_id = users.user_id 
        INNER JOIN products ON order_items.product_id = products.product_id 
        INNER JOIN stock ON products.stock_id = stock.stock_id
        WHERE orders.order_id = '$order_id'"
    );

    foreach($select_order_details as $order) {
        ?>
           <div class="bg-white shadow-md rounded-lg mt-4 p-6 flex flex-col md:flex-row">

                <!-- Product Image -->
                <div class="md:w-1/3">
                    <img src="./data/images/<?=$order['image_url']?>" alt="Product Image" class="rounded-lg w-full h-auto object-cover">
                    <?php
                        if($order['in_stock'] == 'false') {
                            ?>
                                <span class="text-red-500 font-semibold bg-gray-200 py-1 px-2 rounded mt-2 inline-block">Out of stock</span>
                            <?php
                        } else {
                            ?>
                                <span class="text-green-500 font-semibold bg-gray-200 py-1 px-2 rounded mt-2 inline-block">In stock</span>
                            <?php
                        }
                    ?>
                   
                </div>

                <!-- Product Details -->
                <div class="md:w-2/3 md:pl-8 mt-4 md:mt-0">

                    <!-- Product Title -->
                    <h1 class="text-2xl font-semibold"><?=$order['product_name']?></h1>

                    <!-- Price -->
                    <p class="text-gray-700 text-lg font-bold mt-2"><?=number_format($order['price'] * $order['quantity'], 2)?> Frw</p>

                    <!-- Product Description -->
                    <div class="mt-4">
                        <h2 class="text-lg font-semibold">Description</h2>
                        <p class="text-gray-600 mt-2"><?=$order['product_description']?></p>
                        <br>
                        <span class="border-2 px-2 my-3 rounded font-bold">Quantity: <?=$order['quantity']?></span>
                    </div>

                    <!-- Customer Details Section -->
                <div class="mt-6">
                    <h2 class="text-lg font-semibold">Order Details</h2>
                    <div class="mt-2 customer-details">
                        <p class="text-gray-700"><span class="font-semibold">Customer Name:</span> <?=$order['name']?></p>
                        <p class="text-gray-700"><span class="font-semibold">Email:</span> <?=$order['email']?></p>
                        <p class="text-gray-700"><span class="font-semibold">Phone Number:</span>
                            <?php 
                                if(empty($order['phone'])){ 
                                    ?>
                                        <span class="alert-warning px-2">Unspecified</span>
                                    <?php 
                                } else { 
                                    ?>
                                        <span class=""><?=$order['phone']?></span>
                                    <?php
                                }
                            ?>
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">Delivery Address:</span>
                            <?php 
                                if(empty($order['address'])){ 
                                    ?>
                                        <span class="alert-warning px-2">Unspecified</span>
                                    <?php 
                                } else { 
                                    ?>
                                        <span class=""><?=$order['address']?></span>
                                    <?php
                                }
                            ?>
                        </p>
                    </div>
                </div>


                    <!-- Action Buttons -->
                    <div class="flex mt-6 space-x-4">
                        <button class="bg-yellow-400 text-white font-semibold py-2 px-4 rounded-0 hover:bg-yellow-500 transition">
                            <i class="bi bi-trash text-red"></i> Remove
                        </button>
                        <?php
                            if($order['status'] == 'pending') {
                                ?>
                                    <button onclick="window.location.replace('./services/payment/pod.php?o= <?=$order['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$order['price']?>&s= <?=$order['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')"  class="border font-semibold py-2 px-4 rounded-0 transition">
                                        Approve
                                    </button> 
                                <?php
                            } else {
                                ?>
                                    <button onclick="window.location.replace('./services/payment/undo_pod_payment.php?o= <?=$order['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$order['price']?>&s= <?=$order['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')" class="alert-success border font-semibold py-2 px-4 rounded-0 transition">
                                        Delivered
                                    </button> 
                                <?php
                            }
                        ?>
                      
                    </div>

                </div>

                </div> 
        <?php
    }
?>
 

</div>