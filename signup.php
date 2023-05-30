<?php
include_once("./header.php");
include_once("./navbar.php");
isset($_SESSION['name']) && header("location: ./");
?>
<div class="container">
    <?php
    if (isset($_POST['su123'])) {
        $suname = $_POST['suname'];
        $suemail = $_POST['suemail'];
        $supass = $_POST['supass'];

        $checkEmail = $conn->query("SELECT * FROM users WHERE email = '$suemail'");

        if ($checkEmail->num_rows > 0) {
            echo "<script>toastr.error('Mobile number already exists')</script>";
        } else {
            $supass = md5($supass);
            $insert = $conn->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$suname', '$suemail', '$supass')");
            if ($insert) {
                echo "<script>toastr.success('Registration Successful');setTimeout(()=>location.href= './auth.php?token=123321&name=" . $suname . "&email=" . $suemail . "', 2000)</script>";
            }
        }
    }
    ?>
    <div class="row my-5">
        <div class="col-md-5 m-auto p-4 border rounded shadow">
            <h2 class="mb-3">Sign-Up Form</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" placeholder="Name" name="suname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="number" placeholder="Mobile Number" name="suemail" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" name="supass" class="form-control" required minlength="6">
                </div>
                <button type="submit" name="su123" class="btn btn-primary">Sign Up</button>
            </form>
            Already have account? <a href="./signin.php" class="btn btn-primary btn-sm rounded-pill">Sign in</a> here
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>