<style>
    .specifics .d-flex{
        margin-bottom: 10px;
    }
</style>

<?php
    $select_product_specifics  = mysqli_query(
        $conn, 
        "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_id = '$product_id'"
    );

    foreach($select_product_specifics as $data) {
        ?>
            <div class="row specifics">
                <!-- Left Column -->
                <div class="col-12 col-md-6">
                
                <div class="d-flex justify-content-between">
                    <strong>Type</strong>
                    <span><?=$data['name']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Color</strong>
                    <span style="width: 40px; height: 20px; background: <?=$data['color']?>;"></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Condition</strong>
                    <span><?=$data['condition']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Country/Region of Manufacture</strong>
                    <span><?=$data['country_of_origin']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Brand</strong>
                    <span><?=$data['product_brand']?></span>
                </div>
                </div>

                <!-- Right Column -->
                <div class="col-12 col-md-6">
                <div class="d-flex justify-content-between">
                    <strong>Material</strong>
                    <span><?=$data['product_material']?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <strong>Included accessories</strong>
                    <span><?=$data['included_materials']?></span>
                </div> 
                </div>
            </div>
        <?php
    }
?>

