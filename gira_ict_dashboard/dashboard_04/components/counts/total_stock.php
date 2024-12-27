<?php
    $sql = mysqli_query($conn, "SELECT SUM(price * product_quantity) AS total_amount FROM products WHERE in_stock = 'true'");
    $result = mysqli_fetch_assoc($sql);
    if($result['total_amount'] > 0) {
        echo number_format($result['total_amount'], 2)."";
    } else {
        echo "0"." Frw";
    } 


?>