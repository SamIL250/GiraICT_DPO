<style>
    .shopping-ideas a{
        display: block;
    }
</style>

<?php
    require 'components/header.php';
?>


<div>
    <!-- <p>Category showcase</p> -->
</div>
<div class="grid grid-cols-12 category-grids">
    <div class="col-span-9 left-category-aside"  style="padding: 0 60px;">
        <?php
            require 'components/right_aside/right_aside.php';
        ?>
    </div>
    <div class="col-span-3 right-category-aside" style="padding: 0 60px 0 0;">
        <?php
            
            require 'components/left_aside/left_aside.php';
        ?>
    </div>
</div>

<style>
    
    @media(width <= 768px) {
        .category-grids{
            display: block !important;
        }

        .right-category-aside{
            padding: 0 0 0 0 !important;
        }

        .left-category-aside{
            padding: 0 !important;
        }
    }
</style>