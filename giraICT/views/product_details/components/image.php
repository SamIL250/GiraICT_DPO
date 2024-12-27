<div style="padding: 0 10px;" class="product-description-image">
    <?php
       $select_image = mysqli_query(
            $conn,
            "SELECT * FROM products WHERE product_id = '$product_id'"
       );
       if($select_image) {
        foreach($select_image as $image) {
                ?>
                <img src='../../../../gira_ict_dashboard/dashboard_04/data/images/<?=$image['image_url']?>' alt='$image[product_name]' style='width: 100%; height: auto;'>
                <?php
            }
       }
    ?>
</div>