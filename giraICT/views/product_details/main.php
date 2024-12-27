<div> 
    <?php
        require 'components/header.php'
    ?>
    <div class="grid grid-cols-12 my-4 main-product-description-padding" style="padding: 0 180px;">
        <div class="col-span-3">
            <?php
                require 'components/image.php'
            ?>
        </div>
        <div class="col-span-6">
            <?php
                require 'components/description.php'
            ?>
        </div>
        <div class="col-span-3">
            <?php
                require 'components/add_to_cart.php'
            ?>
        </div>
    </div> 
    <div style="padding: 0 80px;" class="product-specifics">
        <p style="font-size: 24px; font-weight: 600;">Product specifics</p>
        <div class="border p-3 shadow-sm gap-3">
            <?php
                require 'components/product_specifics.php'
            ?>
        </div>
    </div>
    <div>
        <?php
            require 'components/related_products.php'
        ?>
    </div>
</div>

<style>
    @media(width <= 990px) {
        .main-product-description-padding{
            padding: 0 30px !important;
            display: block !important;;
        }
        .product-description-image{
            max-width: 300px;
        }

        .product-specifics{
            padding: 0 10px !important;
        }

    }
</style>