<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Category Name</th>
                <th>Description</th> 
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
                    $select_product_categories = mysqli_query(
                        $conn, 
                        "SELECT * FROM categories"
                    );

                    if(mysqli_num_rows($select_product_categories) > 0) {
                        $_id = 1;
                        foreach($select_product_categories as $category) {
                            ?>
                            <tr>
                                <td>
                                        <a href="" class="mx-1" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?=$category['category_id']?>" data-name="<?=$category['name']?>" data-description="<?=$category['description']?>" data-date="<?=$category['created_at']?>"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('categoryId').value='<?=$category['category_id']?>'"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                                <td>
                                    <input type="checkbox">
                                    <?=$_id++?>
                                </td>
                                <td><?=$category['name']?></td>
                                <td><?=$category['description']?></td> 
                                <td><?=$category['created_at']?></td> 
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