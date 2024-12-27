<?php
    if(isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $select_stock = mysqli_query($conn, "SELECT * FROM stock WHERE stock_id = $category_id");
        $stock_name = "";
        $product_stock = "";
        while($stock = mysqli_fetch_assoc($select_stock)) {
            $stock_name = $stock['stock_name'];
            $product_stock = $stock['stock_id'];
        }
        
    }
?>
<!-- Carousel Start -->
<!-- Carousel Start -->
<div class="container-fluid page-header mb-5 py-5"  style="max-height: 200px;">
    <div class="container grid grid-cols-2" style="display: flex !important; justify-content: space-between; align-items: center;">
    <h1 class="display-3 text-white mb-3 animated slideInDown">
            <?php
                $select_category = mysqli_query($conn, "SELECT * FROM categories WHERE category_id = $category_id");
                $category = mysqli_fetch_assoc($select_category);
                echo $category['name'];
            ?>
        </h1> 
    </div>
</div> 