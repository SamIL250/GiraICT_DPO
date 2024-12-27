<div class="grid grid-cols-2 mt-10 items-center">
    <div>
        <form action="orders.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control rounded-0" required placeholder="Search order..." name="product_search_name">
                <button class="btn btn-primary hover:bg-[--light-primary] rounded-0" type="submit" name="search_product">Search</button>
            </div>
        </form>
    </div>
    <div class="flex justify-end items-center gap-3">
        <div class="nav-item dropdown w-20">
            <a href="#" class="nav-link dropdown-toggle border px-3 rounded" data-bs-toggle="dropdown">

                <!-- //user profile -->
                <span class="d-none d-lg-inline-flex text-dark">
                    Filter
                </span>
            </a>
            <form action="orders.php" method="post" class="dropdown-menu dropdown-menu-end bg-light  m-0 border rounded text-dark" style="z-index: 111111;">
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_date">Date</button>
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_stock">Stock</button>
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_status">Status</button>
            </form>
        </div>

        <div class=" bg-[#D22127]">
            <a href="orders.php" class="nav-link   border  rounded"  > 
                <i class="bi bi-arrow-clockwise text-white"></i> 
            </a> 
        </div>
        
    </div>
    </div>