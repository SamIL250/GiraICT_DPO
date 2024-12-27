<?php
    $sql = mysqli_query($conn, "SELECT * FROM order_items INNER JOIN orders ON order_items.order_id = orders.order_id WHERE status = 'pending'");
    echo mysqli_num_rows($sql);
?>