 
<div class="card w-100" style="height: 50px; width: 100%; padding:5px  5px;">
    <div class="row g-0 d-flex cart-header">
        <div class="col-2">
            <?php
               
                require './components/back_btn.php'; 
            ?>
        </div>
        <div class="col-8 d-flex" style="align-items: center;">
            <p style="font-size: 30px; ">Cart</p> 
        </div>
        <div class="col-2 d-flex justify-content-end align-items-center"> 
        </div>
    </div>
</div>

<style>
    @media(width <= 683px) {
        .cart-header{
            display: flex !important;
            justify-content: space-between !important;
        }

        .cart-header .col-2{
            display: none !important;
        }
    }
</style>