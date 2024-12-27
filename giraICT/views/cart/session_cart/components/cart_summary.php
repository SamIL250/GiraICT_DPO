<div class="my-3 mx-4">
    <h1>My Cart</h1>
    <div style="position: relative;">
        <div class="card p-3 cart-summary-card">
            <p style="font-weight: 600;">Sub Total:
                <?php
                $total_price = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    // Convert cart array to a comma-separated string for the SQL query
                    $cart_ids = implode(',', array_map('intval', $_SESSION['cart']));

                    // Fetch the sum of prices for all items in the cart
                    $select_sum = mysqli_query(
                        $conn,
                        "SELECT SUM(price) AS sum_price FROM products WHERE product_id IN ($cart_ids)"
                    );

                    if ($select_sum) {
                        $sum = mysqli_fetch_assoc($select_sum);
                        $total_price = $sum['sum_price'];
                        echo number_format($total_price, 2) . " Frw";
                    }
                } else {
                    echo "0 Frw";
                }
                ?>
            </p>
            <p>Delivery fee: 1,000 Frw</p>
            <p style="font-weight: 600;">Total: <span style="font-size: 30px;"><?= number_format($total_price + 1000, 2) ?> Frw</span></p>
        </div>
        <div class="card p-3" style="position: relative;">
            <span style="position: absolute; right: 10px; top: -1px; display: flex; align-items: center; justify-content: center;" class="border p-2 bg-light">x</span>
            <img src="./img/eshuri.png" width="100%" alt="">
            <p class="my-3" style="font-size: 24px;">The Best Learning App For You</p>
            <button onclick="window.location.replace('https://eshuri.org/')" class="btn border" style="background: #3170f6; color: white;">Apply now </button>
        </div>
    </div>
</div>

<style>
    @media(width <=900px) {
        .cart-summary-card {
            padding: 0 20px !important;
        }
 
    }
</style>