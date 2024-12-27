
<p class="main-left-aside">Popular shopping ideas</p>
<div class="shopping-ideas main-left-aside">
    <?php
        $select_popular_shopping_ideas = mysqli_query(
            $conn,
            "SELECT * FROM categories ORDER BY created_at ASC LIMIT 4"
        );  
        foreach ($select_popular_shopping_ideas as $popular_ideas){
            ?>
                <a href="index_category_filter.php?category_id= <?=$popular_ideas['category_id']?>">
                    <?=$popular_ideas['name']?>
                </a>
            <?php
        }
    ?> 
</div>

<hr>

<div class="main-left-aside">
    <p>Product brands</p>
    <div class="grid grid-cols-3 gap-4">
        <!-- Product brands -->
            <?php
            $select_brands_ka_stocks = mysqli_query(
                $conn, 
                "SELECT * FROM stock WHERE stock_id = ' $product_stock'"
            );
            if($select_brands_ka_stocks) {
                if(mysqli_num_rows($select_brands_ka_stocks) > 0) {
                    foreach($select_brands_ka_stocks as $brand) {
                        ?>
                            <a href=""><?=$brand['stock_name']?></a>
                        <?php
                    }
                } else {
                    echo "No brand found";
                }

            }
            ?>
    </div>

</div>

<style>
    @media(width <= 768px) {
        .main-left-aside{
            padding: 20px;
        }
    }
</style>