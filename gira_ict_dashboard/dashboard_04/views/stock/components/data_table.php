<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Stock Name</th> 
                <th>Date created</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset($_POST['category_search'])) {
                    $search_name = $_POST['category_search_name']; 
                    $select_product_categories_search = mysqli_query(
                        $conn, 
                        "SELECT * FROM categories WHERE name LIKE '%$search_name%'"
                    );

                    if(mysqli_num_rows($select_product_categories_search) > 0) {
                        $_id = 1;
                        foreach($select_product_categories_search as $category_search) {
                            ?>
                            <tr>
                                <td>
                                        <a href="" class="mx-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="" class="mx-1"><i class="bi bi-trash"></i> Delete</a>
                                        
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td><?=$category_search['name']?></td>
                                <td><?=$category_search['description']?></td> 
                                <td><?=$category_search['created_at']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No search found.</td></tr>';
                    }
                }elseif(isset($_POST['filter_category_by_name'])){
                    $filter_by_name = mysqli_query(
                        $conn,
                        "SELECT * FROM categories ORDER BY name"
                    );

                    $_id = 1;
                    foreach($filter_by_name as $by_name) {
                        ?>
                            <tr>
                                <td>
                                        <a href="" class="mx-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="" class="mx-1"><i class="bi bi-trash"></i> Delete</a>
                                        
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td><?=$by_name['name']?></td>
                                <td><?=$by_name['description']?></td> 
                                <td><?=$by_name['created_at']?></td> 
                            </tr>
                        <?php
                    }

                } elseif(isset($_POST['filter_category_by_date'])) {
                    $filter_by_date = mysqli_query(
                        $conn,
                        "SELECT * FROM categories ORDER BY created_at DESC"
                    );

                    $_id = 1;
                    foreach($filter_by_date as $by_date) {
                        ?>
                            <tr>
                                <td>
                                        <a href="" class="mx-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="" class="mx-1"><i class="bi bi-trash"></i> Delete</a>
                                        
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td><?=$by_date['name']?></td>
                                <td><?=$by_date['description']?></td> 
                                <td><?=$by_date['created_at']?></td> 
                            </tr>
                        <?php
                    }
                } else {
                    $select_stock = mysqli_query(
                        $conn, 
                        "SELECT * FROM stock"
                    );

                    if(mysqli_num_rows($select_stock) > 0) {
                        $_id = 1;
                        foreach($select_stock as $stock) {
                            ?>
                            <tr>
                                <td>
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$stock['stock_id']?>" data-name="<?=$stock['stock_name']?>" data-date="<?=$stock['date_created']?>"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('stockId').value='<?=$stock['stock_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td><?=$stock['stock_name']?></td> 
                                <td><?=$stock['date_created']?></td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No categories found.</td></tr>';
                    }
                }
                
            ?> 
            
            

        </tbody>
    </table>
</div>