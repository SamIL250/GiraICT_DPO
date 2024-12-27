<div class="sidebar pe-4 pb-3 bg-[#F5ED4D] shadow-sm">
    <nav class="navbar bg-[#F5ED4D]] ">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img src="./img/logo.jpg" width="80%" alt="" srcset=""></img></h3>
            
        </a>
        
        <?php
            // Get the current page's filename
            $current_page = basename($_SERVER['PHP_SELF']);
        ?>

        <div class="navbar-nav w-100 bg-[#F5ED4D]">
            <a href="index.php" class="nav-item nav-link <?= $current_page == 'index.php' ? 'bg-white' : '' ?>">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
                        
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-box me-2"></i>Products
                </a>
                <div class="ml-2 dropdown-menu border-0 bg-light shadow-sm rounded-0">
                    <a href="products.php" class="dropdown-item rounded-0 <?= $current_page == 'products.php' ? 'bg-white' : '' ?>">Products</a>
                    <a href="product_categories.php" class="dropdown-item rounded-0 <?= $current_page == 'product_categories.php' ? 'bg-white' : '' ?>">Product Categories</a>
                    <a href="product_stock.php" class="dropdown-item rounded-0 <?= $current_page == 'product_stock.php' ? 'bg-white' : '' ?>">Product Stocks</a>
                </div>
            </div>

            <a href="orders.php" class="nav-item nav-link <?= $current_page == 'orders.php' ? 'bg-white' : '' ?>">
                <i class="bi bi-border-width me-2"></i>Orders
            </a>
            <a href="purchases.php" class="nav-item nav-link <?= $current_page == 'purchases.php' ? 'bg-white' : '' ?>">
                <i class="bi bi-receipt-cutoff me-2"></i>Purchases
            </a>
            <a href="sales.php" class="nav-item nav-link <?= $current_page == 'sales.php' ? 'bg-white' : '' ?>">
                <i class="bi bi-receipt-cutoff me-2"></i>Sales data
            </a>
            <a href="messages.php" class="nav-item nav-link <?= $current_page == 'messages.php' ? 'bg-white' : '' ?>">
                <i class="bi bi-receipt-cutoff me-2"></i>Messages
            </a>
        </div>
    </nav>
    <div class="absolute bottom-16 w-100 flex items-center justify-center">
            <span class="border-0 bg-white rounded-0 w-[90%] py-2 px-4 flex items-center justify-between cursor-pointer transition text-black" onclick="window.location.replace('./profile.php?profile_id= <?php echo  $user_id = $decode -> data -> id; ?>')">
                <a class="font-bold">Account</a>
                <!-- //logout icon -->
                <i class="font-bold bi bi-person"></i>
            </span>

        </div>
        <div class="absolute bottom-2 w-100 flex items-center justify-center">
            <span class="border-0 bg-black rounded-0 w-[90%] py-2 px-4 flex items-center justify-between cursor-pointer transition text-white" onclick="window.location.replace('./auth/logout.php')">
                <a class="font-bold">Logout</a>
                <!-- //logout icon -->
                <i class="font-bold bi bi-box-arrow-right"></i>
            </span>

        </div>
</div>