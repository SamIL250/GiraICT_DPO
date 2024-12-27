<div class="grid grid-cols-2 mt-10 items-center">
    <div class="flex">
        <form action="products.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control rounded-0" required placeholder="Search product..." name="product_search_name">
                <button class="btn btn-primary hover:bg-[--light-primary] rounded-0" type="submit" name="search_product">Search</button>
            </div>
        </form>
        <button class="py-[7px] mx-3 px-3 bg-[--primary] text-white rounded" onclick="window.location.href=window.location.href"><i class="bi bi-arrow-clockwise"></i></button>
    </div>
    <div class="flex justify-end items-center gap-3">
        <div class="nav-item dropdown w-20">
            <a href="#" class="nav-link dropdown-toggle border px-3 rounded" data-bs-toggle="dropdown">

                <!-- //user profile -->
                <span class="d-none d-lg-inline-flex text-dark">
                    Filter
                </span>
            </a>
            <form action="products.php" method="post" class="dropdown-menu dropdown-menu-end bg-light  m-0 border rounded text-dark" style="z-index: 11111;">
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_name">Name</button>
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_date">Date</button>
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_product_by_price">Price</button>
            </form>
        </div>

        <div class="nav-item dropdown w-20">
            <a href="#" class="nav-link dropdown-toggle border px-3 rounded" data-bs-toggle="dropdown">

                <!-- //user profile -->
                <span class="d-none d-lg-inline-flex text-dark">
                    View
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light  m-0 border rounded text-dark" style="z-index: 11111;"> 
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" id="list">List</button>
                <button class="dropdown-item hover:bg-[#D22127] hover:text-white" id="content">Contents</button>
            </div>
        </div>
        
    </div>
    </div>