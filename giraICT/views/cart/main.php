<div style="padding: 0px 80px;" class="top-main-cart-container">
    <?php
        require 'components/header.php';
    ?>
    <div class="grid grid-cols-12 main-cart-container">
        <div class="col-span-8">
            <?php
                require 'components/cart_items.php';
            ?>
        </div>
        <div class="col-span-4">
            <?php
                require 'components/cart_summary.php';
            ?>
        </div>
    </div>
</div>

<style>
    @media(width <= 1214px) {
        .main-cart-container {
           display: block;
        }

        .cart-img{
            /* -width: 300px; */
        }
    }

    @media(width <= 900px) {
        .top-main-cart-container{
            padding: 0 20px !important;
        }
    }

    @media(width <= 767px) {
        .cart-img{
            max-width: 200px;
        }
    }

</style>