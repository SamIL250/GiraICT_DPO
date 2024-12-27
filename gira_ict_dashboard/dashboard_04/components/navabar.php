<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><img src="./img/logo.jpg" alt="" class="rounded" style="width: 100px;" srcset=""></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <?php
                $notifications = 0;
                $select_products_stock = mysqli_query(
                    $conn,
                    "SELECT * FROM products WHERE in_stock = 'false'"
                );

                $select_orders = mysqli_query(
                    $conn,
                    "SELECT 
                    order_items.*,
                    orders.order_id,
                    orders.user_id,
                    orders.total,
                    orders.status,
                    orders.created_at AS order_date, 
                    users.*,
                    products.*
                    FROM 
                        order_items 
                    INNER JOIN orders ON order_items.order_id = orders.order_id 
                    INNER JOIN users ON orders.user_id = users.user_id 
                    INNER JOIN products ON order_items.product_id = products.product_id 
                    ORDER BY created_at ASC LIMIT 4"
                );

                // $orders_notification = mysqli_fetch_assoc($select_orders);


                $notifications = mysqli_num_rows($select_orders);
                ?>
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2 relative">
                            <?php
                                if($notifications > 0) {
                                    ?>
                                        <span class="absolute top-[-8px] right-0 alert-warning rounded-[50%] p-1"><?=$notifications?></span>
                                    <?php
                                } else {
                                    ?>
                                        <i class="fa fa-bell me-lg-2 relative"></i>
                                    <?php
                                }
                            ?>
                        </i>
                        <span class="d-none d-lg-inline-flex">Notifications</span>
                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 min-w-[500px] rounded-0">
                        <div class="p-3">
                        <p class="font-bold">Orders</p>
                        </div>
                        <?php
                            foreach($select_orders as $orders) {
                                ?>
                                    <a href="orders_order_details.php?order= <?=$orders['order_item_id']?>" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle" src="./data/images/<?=$orders['image_url']?>" alt="" style="width: 40px; height: 40px;">
                                            <div class="ms-2">
                                                <h6 class="fw-normal mb-0"><?=$orders['email']?></h6>
                                                <small> 
                                                    <?php 
                                                        $orderDate = new DateTime($orders['order_date']);
                                                        $currentDate = new DateTime(); // Gets the current date and time on your PC

                                                        // Calculate the difference
                                                        $interval = $orderDate->diff($currentDate);

                                                        // Check and format the time difference message
                                                        if ($interval->y > 0) {
                                                            $timePassed = $interval->y . " years ago";
                                                        } elseif ($interval->m > 0) {
                                                            $timePassed = $interval->m . " months ago";
                                                        } elseif ($interval->d > 0) {
                                                            $timePassed = $interval->d . " days ago";
                                                        } elseif ($interval->h > 0) {
                                                            $timePassed = $interval->h . " hours ago";
                                                        } elseif ($interval->i > 0) {
                                                            $timePassed = $interval->i . " minutes ago";
                                                        } else {
                                                            $timePassed = "just now";
                                                        }

                                                        // Display the result
                                                        echo $timePassed;
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                            }
                        ?>
                        
                        <hr class="dropdown-divider">
                        <a href="orders.php" class="dropdown-item text-center">See all orders</a>
                    </div>
                <?php
            ?>
        </div>
        
        <div class="nav-item dropdown rounded-0">
            <a href="#" class="nav-link dropdown-toggle border px-3 rounded-0" data-bs-toggle="dropdown">

                <!-- //user profile -->
                <span class="d-none d-lg-inline-flex">
                    <?php
                        $user_id = $decode -> data -> id;
                        $select_profile = mysqli_query(
                            $conn, 
                            "SELECT * FROM users WHERE user_id = '$user_id'"
                        );

                        if($select_profile) {
                            foreach($select_profile as $profile) {
                                ?>
                                    <?=$profile['name']?>
                                <?php
                            }
                        }
                    ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light  m-0 border rounded-0">
                <a href="profile.php?profile_id= <?php echo  $user_id = $decode -> data -> id; ?>" class="dropdown-item hover:bg-[#D22127] hover:text-white">My Profile</a>
                 
                <a href="./auth/logout.php" class="dropdown-item hover:bg-[#D22127] hover:text-white">Log Out</a>
            </div>
        </div>
    </div>
</nav>