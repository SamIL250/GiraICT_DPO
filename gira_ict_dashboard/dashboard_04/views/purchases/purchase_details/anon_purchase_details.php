<?php
$anon_purchase_id = "";
if (isset($_GET['anon_purchase_id'])) {
    $anon_purchase_id = $_GET['anon_purchase_id'];
}
?>

<style>
    .customer-details p {
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
        "SELECT * FROM signed_out_order
        JOIN products ON signed_out_order.product_ordered = products.product_id
        JOIN categories ON products.category_id = categories.category_id
        WHERE signed_out_order_id = '$anon_purchase_id'"
    );

    foreach ($select_order_details as $order) {
    ?>
        <div class="bg-white shadow-md rounded-lg mt-4 p-6 flex flex-col md:flex-row">

            <!-- Product Image -->
            <div class="md:w-1/3">
                <img src="./data/images/<?= $order['image_url'] ?>" alt="Product Image" class="rounded-lg w-full h-auto object-cover">
                <?php
                if ($order['in_stock'] == 'false') {
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
                <h1 class="text-2xl font-semibold"><?= $order['product_name'] ?></h1>

                <!-- Price -->
                <p class="text-gray-700 text-lg font-bold mt-2"><?= number_format($order['price'] * $order['quantity'], 2) ?> Frw</p>

                <!-- Product Description -->
                <div class="mt-4">
                    <h2 class="text-lg font-semibold">Description</h2>
                    <p class="text-gray-600 mt-2"><?= $order['product_description'] ?></p>
                    <br>
                    <span class="border-2 px-2 my-3 rounded font-bold">Quantity: <?= $order['quantity'] ?></span>
                </div>

                <!-- Customer Details Section -->
                <div class="mt-6">
                    <h2 class="text-lg font-semibold">Order Details</h2>
                    <div class="mt-2 customer-details">
                        <p class="text-gray-700"><span class="font-semibold">Customer Name:</span> <?= $order['user_names'] ?></p>
                        <p class="text-gray-700"><span class="font-semibold">Email:</span> <?= $order['user_email'] ?></p>
                        <p class="text-gray-700"><span class="font-semibold">Phone Number:</span>
                            <?php
                            if (empty($order['user_phone'])) {
                            ?>
                                <span class="alert-warning px-2">Unspecified</span>
                            <?php
                            } else {
                            ?>
                                <span class=""><?= $order['user_phone'] ?></span>
                            <?php
                            }
                            ?>
                        </p>
                        <p class="text-gray-700"><span class="font-semibold">Delivery Address:</span>
                            <?php
                            if (empty($order['home_address'])) {
                            ?>
                                <span class="alert-warning px-2">Unspecified</span>
                            <?php
                            } else {
                            ?>
                                <span class=""><?= $order['home_address'] ?></span>
                            <?php
                            }
                            ?>
                        </p>
                    </div>
                </div>


                <!-- Action Buttons -->
                <div class="col-span-3 items-center my-4">
                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#purchaseAnonymusDeleteModal" onclick="document.getElementById('puchaseAnonOrderId').value='<?= $order['signed_out_order_id'] ?>'"><i class="bi bi-trash"></i> Remove</a>
                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="window.location.replace('./services/payment/undo_anonymus_pod_payment.php?o= <?= $order['signed_out_order_id'] ?>&p= <?php echo 'PDO'; ?>&a= <?= $order['price'] ?>&s= <?= $order['payment_status'] ?>&previous_page= <?= urldecode($_SERVER['REQUEST_URI']) ?>')">Derived</span>
                </div>


            </div>

        </div>
    <?php
    }
    ?>


</div>