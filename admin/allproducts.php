<?php
include_once("./header.php")
?>
<!-- Main Content -->
<div id="content">
    <?php include_once("./navbar.php") ?>
    <?php
    if (!isset($_GET['editId'])) {
        include_once("./allProTbl.php");
    } else {
        include_once("./editProduct.php");
    }
    ?>
</div>
<!-- End of Main Content -->

<?php
include_once("./footer.php");
?>