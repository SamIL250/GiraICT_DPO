<?php
    $sql = mysqli_query($conn, "SELECT SUM(amount) AS total_amount FROM payments;");
    $result = mysqli_fetch_assoc($sql);
    if($result['total_amount'] > 0) {
        echo number_format($result['total_amount'], 2)."";
    } else {
        echo "0"." Frw";
    } 


?>