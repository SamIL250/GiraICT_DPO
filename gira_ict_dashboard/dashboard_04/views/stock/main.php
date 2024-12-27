<style> 
    th{
        min-width: 150px; max-width: 300px;
    }

    th:first-child, th:nth-child(2){
        min-width: 50px; max-width: 100px;
    } 

    .rounded {
        border-radius: 0 !important;
    }
</style>

    <!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4 relative">
    <div class="">
        <div class="grid grid-cols-12 items-center ">
            <div class="col-span-6">
                <p class="text-3xl">Product Stock</p>
            </div> 
        </div>
    </div>

    <div class="grid grid-cols-2 mt-10 items-center">
        <div class="flex gap-3 items-center">
            <form action="product_categories.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control rounded-0" required placeholder="Search category..." name="category_search_name">
                    <button class="btn btn-primary hover:bg-[--light-primary] rounded-0" type="submit" name="category_search">Search</button>
                </div>
            </form>
            <button class="py-[7px] px-3 bg-[--primary] text-white rounded" onclick="window.location.href=window.location.href"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="flex justify-end items-center gap-3">
            <div class="nav-item dropdown w-20">
                <a href="#" class="nav-link dropdown-toggle border px-3 rounded" data-bs-toggle="dropdown">

                    <!-- //user profile -->
                    <span class="d-none d-lg-inline-flex text-dark">
                        Filter
                    </span>
                </a>
                <form action="product_categories.php" method="post" class="dropdown-menu dropdown-menu-end bg-light  m-0 border rounded text-dark">
                    <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_category_by_name">Name</button>
                    <button class="dropdown-item hover:bg-[#D22127] hover:text-white" name="filter_category_by_date">Latest</button>
                </form>
            </div>
            
        </div>
    </div>

    <div class="mt-6">
        <!-- //////sessions///// -->
        <?php
            require 'components/sessions.php';
        ?> 
        <?php
            require 'components/data_table.php';
        ?>
    </div> 
    <!-- Modals -->
    <!-- ///////add new stock//////// -->
        <?php
        require 'components/add.php';
        ?> 
    <!-- Delete modal -->
    <?php
        require 'components/delete.php';
    ?>

    <!-- Update modal --> 
    <?php
        require 'components/update.php';
    ?>
            
    <!-- Add btn -->
    <div class="btn btn-lg bg-black text-3xl font-bold text-white btn-lg-square fixed bottom-3 mb-16 right-12 shadow "  data-bs-toggle="modal" data-bs-target="#formModal">+</div>
        
</div>

<?php
    require 'components/javascript.php';
?>