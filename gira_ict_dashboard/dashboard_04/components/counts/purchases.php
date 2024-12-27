<?php
    $sql = mysqli_query($conn, "SELECT * FROM payments");
    echo mysqli_num_rows($sql);
?>