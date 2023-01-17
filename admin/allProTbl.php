<?php
$products = $conn->query("SELECT * FROM `products`");
if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];
    $checkdel = $conn->query("SELECT * FROM `products` WHERE `id` = $delId");
    $checkdel->num_rows == 0 && header("location: $pageName");
    $del = $conn->query("DELETE FROM `products` WHERE `id` = $delId");
    if ($del) {
        echo "<script>toastr.error('Product has been deleted')</script>";
        echo "<script>setTimeout(()=> location.href= 'allproducts.php', 1000)</script>";
    }
}
?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Regular Price</th>
                    <th>Discount Price</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php while ($data = $products->fetch_object()) { ?>
                    <tr>
                        <th><?= $data->name ?></th>
                        <th><img src="../images/products/<?= $data->img ?>" alt="" class="img-fluid" style="height:20px"></th>
                        <th><?= $data->rprice ?></th>
                        <th><?= $data->dprice ?></th>
                        <th>
                            <a href="<?= "./$pageName?editId=$data->id" ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= "./$pageName?delId=$data->id" ?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete the product?')">Delete</a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>