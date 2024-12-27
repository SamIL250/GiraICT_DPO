<div>
    <div class="mb-3 main-right-aside go-back-btn">
        <?php
        require './components/back_btn.php';
        ?>
    </div>
    <?php
    require 'ad.php';
    ?>
    <div class="my-4 main-right-aside">
        <small>
            Check each product page for other buying options.
        </small>
        <?php
        $select_chosen_category = mysqli_query(
            $conn,
            "SELECT 
                    products.*, 
                    categories.category_id AS categories_category_id, 
                    categories.name, 
                    categories.description 
                FROM products 
                INNER JOIN categories 
                    ON products.category_id = categories.category_id 
                WHERE categories.category_id = '$category_id';
"
        );

        if ($select_chosen_category) {
            if (mysqli_num_rows($select_chosen_category) > 0) {
                foreach ($select_chosen_category as $chosen_category) {
                    $product_id = $chosen_category['product_id'];
                    $category_chosen = $chosen_category['categories_category_id'];
        ?>
                    <div class="grid grid-cols-12 my-2 actual-categories" style="border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0px;">
                        <div class="col-span-3" style="padding: 10px;">
                            <img src="../../../../../gira_ict_dashboard/dashboard_04/data/images/<?= $chosen_category['image_url'] ?>" alt="" style="width: 100%; max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-span-9" style="padding: 10px 30px">
                            <a href="product_details.php?product_id= <?= $product_id ?>&product_category_id= <?= $category_chosen ?>" style="text-decoration: none; color: unset;">
                                <p style="font-weight: 700; font-size: 19px;"><?= $chosen_category['product_name'] ?></p>
                                <span class="product-description"><?= $chosen_category['product_description'] ?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto totam ullam repellat facere voluptatem </span>
                                <div class="price-btns-wrapper">
                                    <div class=" my-3 d-flex" style="gap: 10px;">
                                        <a href="product_details.php?product_id= <?= $product_id ?>&product_category_id= <?= $category_chosen ?>">
                                            <button class="border btn">
                                                More...
                                            </button>
                                        </a>

                                        <?php
                                        $user_id = $decode->data->id;
                                        $check_active_cart = mysqli_query(
                                            $conn,
                                            "SELECT * FROM cart WHERE user_id = '$user_id'"
                                        );

                                        if ($check_active_cart) {
                                            if (mysqli_num_rows($check_active_cart) > 0) {
                                        ?>
                                                <a href="./services/add_to_cart.php?add_cart_id= <?= $chosen_category['product_id'] ?>&cart_id= <?php $user_id = $decode->data->id;
                                                                                                                                                $select_user_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
                                                                                                                                                if ($select_user_cart) {
                                                                                                                                                    foreach ($select_user_cart as $user_cart) {
                                                                                                                                                        echo $user_cart['cart_id'];
                                                                                                                                                    }
                                                                                                                                                } ?>&referrer=<?= urlencode($_SERVER['REQUEST_URI']) ?>" class="border btn" style="background: black; color: white;">
                                                    Add to cart
                                                </a>
                                            <?php
                                            } else {
                                            ?>
                                                <form action="./services/activate_cart.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?= $user_id ?>" id="">
                                                    <input type="hidden" name="page_url" value="<?= urlencode($_SERVER['REQUEST_URI']) ?>" id="">
                                                    <button name="activateCart" class="border text-white" style="background: black; padding: 6px 10px;">Activate your cart</button>
                                                </form>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </div>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <p style=" border: 1px solid rgba(0, 0, 0, 0.125); font-weight: 800;display: inline-block; width: auto; padding: 5px 20px; border-radius: 30px;"><?= $chosen_category['price'] ?>Frw</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "<h2>No products found in this category.</h2>";
            }
        }
        ?>
    </div>

</div>

<style>
    @media(width <=768px) {
        .main-right-aside {
            padding: 20px;
        }

        .go-back-btn{
            display: none;
        }
    }

    @media(width <=600px) {
        .actual-categories{
            display: block !important;
        }

        .product-description {
            font-size: 15px;
        }

        .btn,
        button {
            padding: 8px;
            font-size: 14px;
        }

        .price-btns-wrapper{
            /* display: flex;
            align-items: center;
            justify-content: space-between; */
        }
    }
</style>