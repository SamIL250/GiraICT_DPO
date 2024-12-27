<div class="table-responsive" id="table_view">
    <table class="table table-striped">
        <thead >
            <tr>
                <th></th>
                <th>#</th>
                <th>Image</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th> 
                <th>Status</th>
                <th>Customer names</th>
                <th>Customer email</th> 
                <th>Country</th> 
                <th>City legion</th> 
                <th>Delivery address</th> 
                <th>Phone number</th> 
                <th>In Stock?</th> 
                <th>Order date</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
                $select_orders = mysqli_query(
                    $conn, 
                    "SELECT 
                        order_items.*,
                        orders.order_id,
                        orders.user_id,
                        orders.total,
                        orders.status,
                        orders.created_at AS order_date, 
                        users.*,
                        products.*
                    FROM 
                        order_items 
                    INNER JOIN orders ON order_items.order_id = orders.order_id 
                    INNER JOIN users ON orders.user_id = users.user_id 
                    INNER JOIN products ON order_items.product_id = products.product_id
                    ORDER BY order_date DESC
                    "
                );

                if($select_orders) {
                    if(mysqli_num_rows($select_orders) > 0) {
                        $_id = 1;
                        foreach($select_orders as $products) {
                            ?>
                               <tr>
                                    <td>
                                        <a class="btn rounded-0 text-white bg-black">Approve</a>
                                    </td>
                                    <td><?=$_id++?></td>
                                    <td><img src="./data/images/<?=$products['image_url']?>" class="rounded shadow" alt="" srcset=""  onclick="showImage(this)"></td>
                                    <td><?=$products['product_name']?></td>
                                    <td><?=$products['quantity']?></td>
                                    <td><?=$products['price']?></td>
                                    <td><?=$products['status']?></td>
                                    <td><?=$products['name']?></td>
                                    <td><?=$products['email']?></td>
                                    <td><?=$products['country']?></td>
                                    <td><?=$products['city_legion']?></td>
                                    <td><?=$products['address']?></td>
                                    <td><?=$products['phone']?></td> 
                                    <td><?=$products['in_stock']?></td>
                                    <td><?=$products['order_date']?></td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="8">No orders found.</td></tr>';
                    }
                } else {
                    echo "Error: ". mysqli_error($conn);
                } 
            ?>  

        </tbody>
    </table>
</div>

<!-- //////enlarged image view//// -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Product Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" class="img-fluid" alt="Enlarged Image">
      </div>
    </div>
  </div>
</div>

<script>
      function showImage(imageElement) {
    // Set the clicked image source in the modal
    document.getElementById('modalImage').src = imageElement.src;
    // Show the modal
    $('#imageModal').modal('show');
  }
</script>