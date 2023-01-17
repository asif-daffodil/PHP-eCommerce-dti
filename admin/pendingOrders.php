<?php
include_once("./header.php");
$runOrderQuery = $conn->query("SELECT `orders`.`id` AS `id`, `orders`.`quantity` AS `quentity`, `orders`.`price` AS `tprice`, `orders`.`status` AS `status`, `orders`.`updated_at` AS `date`, `products`.`name` AS `product`, `products`.`dprice` AS `sprice`, `products`.`img` AS `proimg`, `users`.`name` AS `user` FROM `orders` INNER JOIN `products` INNER JOIN `users` ON `orders`.`product_id` = `products`.`id` AND `orders`.`user_id` = `users`.`id` WHERE `orders`.`status` = 'pending' ORDER BY `orders`.`id` DESC;");
?>
<!-- Main Content -->
<div id="content">
    <?php
    include_once("./navbar.php");
    if (isset($_POST['oid'])) {
        $status = "shifted";
        $oid = $_POST['oid'];
        $upStatus = $conn->query("UPDATE `orders` SET `status` = '$status', `updated_at` = current_timestamp() WHERE `id` = $oid");
        if ($upStatus) {
            echo "<script>toastr.info('Status changed');</script>";
            $runOrderQuery = $conn->query("SELECT `orders`.`id` AS `id`, `orders`.`quantity` AS `quentity`, `orders`.`price` AS `tprice`, `orders`.`status` AS `status`, `orders`.`updated_at` AS `date`, `products`.`name` AS `product`, `products`.`dprice` AS `sprice`, `products`.`img` AS `proimg`, `users`.`name` AS `user` FROM `orders` INNER JOIN `products` INNER JOIN `users` ON `orders`.`product_id` = `products`.`id` AND `orders`.`user_id` = `users`.`id` WHERE `orders`.`status` = 'pending' ORDER BY `orders`.`id` DESC;");
        } else {
            echo "<script>toastr.error('Something went wrong');</script>";
        }
    }
    if (isset($_POST['cid'])) {
        $status = "cancled";
        $cid = $_POST['cid'];
        $upStatus = $conn->query("UPDATE `orders` SET `status` = '$status', `updated_at` = current_timestamp() WHERE `id` = $cid");
        if ($upStatus) {
            echo "<script>toastr.info('Status changed');</script>";
            $runOrderQuery = $conn->query("SELECT `orders`.`id` AS `id`, `orders`.`quantity` AS `quentity`, `orders`.`price` AS `tprice`, `orders`.`status` AS `status`, `orders`.`updated_at` AS `date`, `products`.`name` AS `product`, `products`.`dprice` AS `sprice`, `products`.`img` AS `proimg`, `users`.`name` AS `user` FROM `orders` INNER JOIN `products` INNER JOIN `users` ON `orders`.`product_id` = `products`.`id` AND `orders`.`user_id` = `users`.`id` WHERE `orders`.`status` = 'pending' ORDER BY `orders`.`id` DESC;");
        } else {
            echo "<script>toastr.error('Something went wrong');</script>";
        }
    }
    ?>
    <div class="container py-5">
        <div class="row py-5">
            <?php if ($runOrderQuery->num_rows == 0) { ?>
                <div class="col-md-6 alert alert-danger m-auto text-center p-5 display-6">
                    No pending orders!
                </div>
            <?php } else { ?>
                <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quentity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Order By</th>
                            <th>Change Status</th>
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
                            <th>Order Date</th>
                            <th>Order By</th>
                            <th>Change Status</th>
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
                                <td><?= date("M-d-y H:i", strtotime($data->date))  ?></td>
                                <td><?= $data->user ?></td>
                                <td style="width: 160px">
                                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Do you want to change the status to shifted?')">
                                        <input type="number" name="oid" value="<?= $data->id ?>" class="d-none">
                                        <button class="btn btn-sm btn-primary rounded-pill py-0" type="submit"><small>Shifted</small></button>
                                    </form>
                                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Do you want to change the status to cancled?')">
                                        <input type="number" name="cid" value="<?= $data->id ?>" class="d-none">
                                        <button class="btn btn-sm btn-danger rounded-pill py-0" type="submit"><small>Cancled</small></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<?php
include_once("./footer.php");
?>