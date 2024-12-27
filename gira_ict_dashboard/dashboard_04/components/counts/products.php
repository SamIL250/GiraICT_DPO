<?php
    $sql = mysqli_query($conn, "SELECT * FROM products");
    echo mysqli_num_rows($sql);
?>