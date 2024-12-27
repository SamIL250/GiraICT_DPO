   
<style>

    th{
        min-width: 200px; max-width: 400px;
    }

    th:first-child, th:nth-child(2){
        min-width: 150px; max-width: 150px;
    } 
    table tbody tr img {
        width: 200px;
        height: 100px;
        object-fit: cover; 
    }

    .list-title{
        position: sticky;
        top: 12vh; /* It will stick after scrolling to 12vh from the top */
        background-color: white; /* Ensure it has a background to avoid content overlap */
        z-index: 1000; 
    }

</style>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4 relative">
    <div class="">
        <div class="grid grid-cols-12 items-center ">
            <div class="col-span-6">
                <p class="text-3xl">Products</p>
            </div> 
        </div>
    </div> 

<!-- /////tool bars//// -->
<?php
require 'components/tool_bars.php';
?>

<div class="mt-6">
    <!-- /////setted sessions//// -->
    <?php
        require 'components/sessions.php';
    ?>  
    <!-- /////////////list view//////////////// -->
    <?php
        require 'components/data_layout_view/list_view.php'
    ?> 
    <!-- //////////content view//////////////// -->
    <?php
        // require 'components/data_layout_view/cards_view.php'; 
    ?>
</div>

<!-- Modals -->
<!-- ////add new product model//// -->
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
<div class="btn h-[40px] w-[40px] bg-black text-white font-bold text-3xl fixed bottom-3 mb-16 right-12 shadow hover:bg-[--light-primary] flex items-center justify-center rounded-[50%]"  data-bs-toggle="modal" data-bs-target="#formModal">+</div>
    
</div>

<?php
    require 'components/javascript.php';
?>
 