<?php
include_once("./header.php");
include_once("./navbar.php");
isset($_SESSION['name']) && header("location: ./");
?>
<div class="container">
    <?php
    include_once("./classes/signIn.php");
    ?>
    <div class="row my-5">
        <div class="col-md-5 m-auto p-4 border rounded shadow">
            <h2 class="mb-3">Sign-In Form</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="number" placeholder="Mobile Number" name="siemail" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" name="sipass" class="form-control" required>
                </div>
                <button type="submit" name="si123" class="btn btn-primary">Sign In</button>
            </form>
            Dont have account? <a href="./signup.php" class="btn btn-primary btn-sm rounded-pill">Sign up</a> here
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>