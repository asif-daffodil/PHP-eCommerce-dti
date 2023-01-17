<?php
include_once("./header.php");
?>
<!-- Main Content -->
<div id="content">
    <?php include_once("./navbar.php") ?>
    <?php
    if (isset($_POST['addpro123'])) {
        $name = $_POST['name'];
        $rprice = $_POST['rprice'];
        $dprice = $_POST['dprice'];
        $description = $conn->real_escape_string($_POST['description']);

        $imgName = $_FILES['img']['name'];
        $imgTmpName = $_FILES['img']['tmp_name'];

        $newImgName = date("FdYHisa") . uniqid() . random_int(1000, 9999) . "." . pathinfo($imgName, PATHINFO_EXTENSION);
        $destination = "../images/products/$newImgName";
        $move = move_uploaded_file($imgTmpName, $destination);
        if (!$move) {
            echo "<script>toastr.error('Image upload problem');</script>";
        } else {
            $insert = $conn->query("INSERT INTO `products` (`name`, `rprice`, `dprice`, `description`, `img`) VALUES('$name', '$rprice', '$dprice', '$description', '$newImgName') ");
            if (!$insert) {
                echo "<script>toastr.error('Database problem');</script>";
            } else {
                echo
                "<script>toastr.success('Product added successfully');</script>";
            }
        }
    }
    ?>
    <div class="row">
        <div class="col-md-6 p-4">
            <h2 class="mb-3">Add New Products</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Product Name" required name="name">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" placeholder="Regular Price" required name="rprice">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" placeholder="Discount Price" required name="dprice">
                </div>
                <div class="mb-3">
                    <textarea name="description" id="editor" placeholder="Short Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="img">Featured Image
                        <input type="file" id="img" name="img" accept="image/*">
                    </label>
                </div>
                <input type="submit" name="addpro123" value="Add Product" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php
include_once("./footer.php");
?>