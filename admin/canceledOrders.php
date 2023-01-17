<?php
include_once("./header.php");
$runOrderQuery = $conn->query("SELECT `orders`.`id` AS `id`, `orders`.`quantity` AS `quentity`, `orders`.`price` AS `tprice`, `orders`.`status` AS `status`, `orders`.`updated_at` AS `date`, `products`.`name` AS `product`, `products`.`dprice` AS `sprice`, `products`.`img` AS `proimg`, `users`.`name` AS `user` FROM `orders` INNER JOIN `products` INNER JOIN `users` ON `orders`.`product_id` = `products`.`id` AND `orders`.`user_id` = `users`.`id` WHERE `orders`.`status` = 'cancled' ORDER BY `orders`.`id` DESC;");
?>
<!-- Main Content -->
<div id="content">
    <?php include_once("./navbar.php") ?>
    <div class="container py-5">
        <div class="row py-5">
            <?php if ($runOrderQuery->num_rows == 0) { ?>
                <div class="col-md-6 alert alert-danger m-auto text-center p-5 display-6">
                    No canceled order now!
                </div>
            <?php } else { ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quentity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order By</th>
                            <th>Cancled Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quentity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order By</th>
                            <th>Cancled Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($data = $runOrderQuery->fetch_object()) { ?>
                            <tr>
                                <td><img src="../images/products/<?= $data->proimg ?>" alt="" class="img-fluid" style="height: 36px"></td>
                                <td><?= $data->product ?></td>
                                <td><?= $data->sprice ?></td>
                                <td><?= $data->quentity ?></td>
                                <td><?= $data->tprice ?></td>
                                <td><?= $data->status ?></td>
                                <td><?= $data->user ?></td>
                                <td><?= date("M-d-y H:i", strtotime($data->date))  ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<?php
include_once("./footer.php");
?>