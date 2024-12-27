<div class="card p-2">
    <p>Buy At: <span><?php
        $select_product_price = mysqli_query(
            $conn,
            "SELECT * FROM products WHERE product_id = '$product_id'"
        );

        if($select_product_price) {
            foreach($select_product_price as $product) {
                echo $product['price'];
            }
        }
    ?> Frw</span></p>
    <p><i class="bi bi-geo-alt"></i> Kigali, Rwanda</p>
    <p>Sold by GiraIct Resale </p>
    <div>
        <a href="./services/session_cart/cart.php?product_id= <?=$product_id?>&referrer=<?=urlencode($_SERVER['REQUEST_URI'])?>?>">
            <button class="border w-100 text-white btn" style="background: black;">Add to cart</button>
        </a>
    </div>
    <div class="card mt-5">
        <div>
            <img src="./img/eshuri.png" style="width: 100%;" alt="">
            <p class="my-3" style="font-size: 24px;">The Best Learning App For You</p>
            <button  onclick="window.location.replace('https://eshuri.org/')" class="btn border" style="background: #3170f6; color: white;">Apply now </button>
        </div>
    </div>   
</div>