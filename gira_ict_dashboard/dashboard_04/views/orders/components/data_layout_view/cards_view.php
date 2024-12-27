<style>
    .order-description p{
        margin-bottom: 20px;
    }

    .order-description p span{
        background: whitesmoke;
    }
</style>

<div class="" id="list_view">
    <div class="grid grid-cols-12 card shadow-sm p-3 list-title">
        <div class="col-span-4">
            <p>Product</p>
        </div> 
        <div class="col-span-6">
            <p>Description</p>
        </div>
        <div class="col-span-2">
            <p>Action</p>
        </div>
    </div>
    <?php
        $select_anonymous_orders = mysqli_query(
            $conn,
            "SELECT * FROM signed_out_order
            INNER JOIN products ON signed_out_order.product_ordered = products.product_id
            INNER JOIN stock ON products.stock_id = stock.stock_id
            WHERE payment_status = 'pending'"
        );

        foreach($select_anonymous_orders as $products) {
            $_id = 1; 
                    if($products['payment_status'] == 'pending') {
                        ?>
                        <div class="card my-3">
                            <div class="relative grid grid-cols-12 w-100 p-2 items-center justify-between">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('anonymus_orders_order_details.php?anonymus_order= <?=$products['signed_out_order_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p> 
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#anonymusDeleteModal" onclick="document.getElementById('anonymusProductId').value='<?=$products['signed_out_order_id'] ?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 border cursor-pointer" onclick="window.location.replace('./services/payment/anonymus_pod.php?o= <?=$products['signed_out_order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['payment_status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Approve</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1 cursor-pointer" data-bs-toggle="dropdown" onclick="window.location.replace('anonymus_orders_order_details.php?anonymus_order= <?=$products['signed_out_order_id']?>')">More..</span>
                                     
    
                                </div>
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?>
                            </div> 
                        </div>
                    <?php 
                    } elseif($products['payment_status'] == "delivered") {
                        ?>
                        <div class="card my-3">
                            <div class="grid grid-cols-12 w-100 p-2 items-center relative">
                                <div class="col-span-7 ">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?php ?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="">Derived</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                    
     
                                </div>
                                 
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?> 
                            </div> 
                        </div>
                    <?php   
                    } 
        }
    ?> 

    <?php 

        if(isset($_POST['filter_product_by_date'])){ 
            $select_products = mysqli_query(
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
                WHERE orders.canceled = 'false'
                AND orders.status = 'pending'
                ORDER BY order_date ASC
                "
            );

            if(mysqli_num_rows($select_products) > 0) {
                $_id = 1;
                foreach($select_products as $products) {
                    if($products['status'] == 'pending') {
                        ?>
                        <div class="card my-3">
                            <div class="relative grid grid-cols-12 w-100 p-2 items-center justify-between">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['order_item_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 border cursor-pointer" onclick="window.location.replace('./services/payment/pod.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Approve</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
    
                                </div>
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?>
                            </div> 
                        </div>
                    <?php 
                    } elseif($products['status'] == "delivered") {
                        ?>
                        <div class="card my-3">
                            <div class="grid grid-cols-12 w-100 p-2 items-center relative">
                                <div class="col-span-7 ">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="window.location.replace('./services/payment/undo_pod_payment.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Derived</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                    
     
                                </div>
                                 
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?> 
                            </div> 
                        </div>
                    <?php   
                    }
                    
                }
            } else {
                echo 'No products found.';
            } 

        } elseif(isset($_POST['filter_product_by_stock'])) {
            $select_products = mysqli_query(
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
                WHERE orders.canceled = 'false'
                AND orders.status = 'pending'
                ORDER BY stock.stock_name 
                "
            );

            if(mysqli_num_rows($select_products) > 0) {
                $_id = 1;
                foreach($select_products as $products) {
                    if($products['status'] == 'pending') {
                        ?>
                        <div class="card my-3">
                            <div class="relative grid grid-cols-12 w-100 p-2 items-center justify-between">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['order_item_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 border cursor-pointer" onclick="window.location.replace('./services/payment/pod.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Approve</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                           
                                </div>
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?>
                            </div> 
                        </div>
                    <?php 
                    } elseif($products['status'] == "delivered") {
                        ?>
                        <div class="card my-3">
                            <div class="grid grid-cols-12 w-100 p-2 items-center relative">
                                <div class="col-span-7 ">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="window.location.replace('./services/payment/undo_pod_payment.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Derived</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
                                </div>
                                 
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?> 
                            </div> 
                        </div>
                    <?php   
                    }
                    
                }
            } else {
                echo 'No products found.';
            } 

        } elseif(isset($_POST['filter_product_by_status'])) {
            $select_products = mysqli_query(
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
                WHERE orders.canceled = 'false'
                AND orders.status = 'pending'
                ORDER BY orders.status 
                "
            );

            if(mysqli_num_rows($select_products) > 0) {
                $_id = 1;
                foreach($select_products as $products) {
                    if($products['status'] == 'pending') {
                        ?>
                        <div class="card my-3">
                            <div class="relative grid grid-cols-12 w-100 p-2 items-center justify-between">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['order_item_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 border cursor-pointer" onclick="window.location.replace('./services/payment/pod.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Approve</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
                                </div>
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?>
                            </div> 
                        </div>
                    <?php 
                    } elseif($products['status'] == "delivered") {
                        ?>
                        <div class="card my-3">
                            <div class="grid grid-cols-12 w-100 p-2 items-center relative">
                                <div class="col-span-7 ">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="window.location.replace('./services/payment/undo_pod_payment.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Derived</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
                                </div>
                                 
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?> 
                            </div> 
                        </div>
                    <?php   
                    }
                    
                }
            } else {
                echo 'No products found.';
            } 

        } else {
            $select_products = mysqli_query(
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
                WHERE orders.canceled = 'false'
                AND orders.status = 'pending'
                ORDER BY order_date DESC
                "
            );
        
            if(mysqli_num_rows($select_products) > 0) {
                $_id = 1;
                foreach($select_products as $products) {
                    if($products['status'] == 'pending') {
                        ?>
                        <div class="card my-3">
                            <div class="relative grid grid-cols-12 w-100 p-2 items-center justify-between">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div> 
                                         
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                                
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['order_item_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 border cursor-pointer" onclick="window.location.replace('./services/payment/pod.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Approve</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
                                </div>
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?>
                            </div> 
                        </div>
                    <?php 
                    } elseif($products['status'] == "delivered") {
                        ?>
                        <div class="card my-3">
                            <div class="grid grid-cols-12 w-100 p-2 items-center relative">
                                <div class="col-span-7 ">
                                    <div class="grid grid-cols-12 gap-3">
                                        <div class="col-span-3">
                                            <img onclick="showImage(this)" src="./data/images/<?=$products['image_url']?>" class="rounded shadow-sm" style="height: 50px; width: 80px; object-fit: cover;" alt="" srcset="">
                                        </div>
                                        <div class="col-span-9">
                                            <div class="grid grid-cols-1 items-center">
                                                <p class="font-bold cursor-pointer" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')"><?=$products['product_name']?></p>
                                                <div class="grid grid-cols-3 items-center gap-1"> 
                                                    <p><?=number_format($products['price']* $products['quantity'], 2). 'Frw'?></p>
                                                    <span class="border rounded-2xl text-center p-1"><?=$products['stock_name']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                <div class="col-span-3 items-center"> 
                                    <a class=" rounded-0 px-3 py-1 bg-warning text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('productId').value='<?=$products['product_id']?>'"><i class="bi bi-trash"></i> Remove</a>
                                    <span class=" rounded-0 px-3 py-1 alert-success cursor-pointer" onclick="window.location.replace('./services/payment/undo_pod_payment.php?o= <?=$products['order_id']?>&p= <?php echo'PDO'; ?>&a= <?=$products['price']?>&s= <?=$products['status']?>&previous_page= <?=urldecode($_SERVER['REQUEST_URI'])?>')">Derived</span>
                                </div>
                                <div class="col-span-2 items-center dropdown ">
                                    <span class="border px-3 py-1" data-bs-toggle="dropdown" onclick="window.location.replace('orders_order_details.php?order= <?=$products['order_item_id']?>')">More..</span>
                                     
                                </div>
                                 
                                <?php
                                    if($products['in_stock'] == 'false') {
                                        ?>
                                            <span class="border alert-danger absolute left-0 top-[-5px] rounded-lg">
                                                Out of stock
                                            </span>
                                        <?php
                                    }
                                                                
                                ?> 
                            </div> 
                        </div>
                    <?php   
                    }
                    
                }
            } else {
                echo 'No products found.';
            } 
        }

        

    

    ?>
    </div> 
    
</div>  
 