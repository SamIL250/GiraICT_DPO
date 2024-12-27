   
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

.rounded{
    border-radius: 0 !important;
}

</style>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4 relative">
<div class="">
    <div class="grid grid-cols-12 items-center ">
        <div class="col-span-6">
            <p class="text-3xl">Products Purchased</p>
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
<!-- ///////table view////////// -->
<?php
    // require 'components/data_layout_view/table_view.php'
?>  
<!-- //////////content view//////////////// -->
<?php
    require 'components/data_layout_view/cards_view.php'; 
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
    require 'components/anonymus_delete.php';
?> 
<!-- Update modal -->  
<?php
    require 'components/update.php';
?>
 
<?php
    require 'components/javascript.php';
?>
