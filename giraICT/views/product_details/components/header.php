<?php
    $product_id = "";
    if(isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
    }

    $category_id = "";
    if(isset($_GET['product_category_id'])) {
        $category_id = $_GET['product_category_id']; 
    }
?>
<div class="card w-100 recommendation-product" style="height: 50px; width: 100%; padding:5px  80px;">
    <div class="row g-0">
        <div class="col-2">
            <?php
                $select_ad_product = mysqli_query(
                    $conn,
                    "SELECT * FROM products WHERE category_id  = '$category_id'  ORDER BY product_id ASC LIMIT 1",
                );
                if($select_ad_product) {
                    foreach($select_ad_product as $image) {
                        ?>
                        <img src='../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$image['image_url']?>' alt='<?=$image['product_name']?>' class="img-fluid" style="height: 40px; object-fit: contain;">
                        <?php
                    }
                }
            ?>
        </div>
        <div class="col-8 d-flex" style="align-items: center; gap: 10px;">
            <h5 class="card-title" style="font-size: 16px; margin-bottom: 0;  max-width: 98%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$image['product_name']?></h5>
            <p class="card-text" style="font-size: 14px; margin-bottom: 0; max-width: 90%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><?=$image['product_description']?>  <span class="mx-4">4 ★★★★☆</span> <span style="font-weight: 600;"><?=$image['price']?> Frw</span></p> 
          
        </div>
        <div class="col-2 d-flex justify-content-end align-items-center">
            <a class="btn">View Details</a> 
        </div>
    </div>
</div>
<div class="mt-3 go-back-btn" style="padding: 0 80px;">
    <?php
        require './components/back_btn.php';
    ?>
</div>

<style>
    @media(width <= 907px) {
        .recommendation-product{
            display: none;
        }

        .go-back-btn{
            display: none
        }
    }

</style>