<div>
    <div>
        <?php
            $select_product_description  = mysqli_query(
                $conn, 
                "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_id = '$product_id'"
            );

            if($select_product_description) {
                foreach($select_product_description as $description) {
                    ?>
                        <p style="font-size: 24px; font-weight: 600;"><?=$description['product_name']?></p>
                        <p><?=$description['product_description']?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat explicabo </p>
                        <p>4 ★★★★☆</p> 
                        <hr>
                        <p>Price: <span style=" border: 1px solid rgba(0, 0, 0, 0.125); font-weight: 800;display: inline-block; width: auto; padding: 5px 20px; border-radius: 30px;"><?=$description['price']?> Frw</span></p>
                        <p><?php
                            if($description['in_stock'] == 'false') {
                                echo "<p style='color: var(--primary); font-weight: 600;'>Not In Stock</p>";
                            } else {
                                echo "<p style='color: var(--dark); font-weight: 600;'>In Stock</p>";
                            }
                        ?></p>
                    <?php
                }
            }
        ?>
    </div>
</div>