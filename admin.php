<?php
include_once("./header.php");
include_once("./navbar.php");
(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') && header("location: index.php");
?>
<div class="container-fluid">
    <div class="row">
        
    </div>
</div>

<?php
include_once("./footer.php");
?>