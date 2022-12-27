<?php
include_once("./header.php");
include_once("./navbar.php");
isset($_SESSION['name']) && header("location: ./");
?>
<div class="container">
    <?php
    if (isset($_POST['si123'])) {
        $siemail = $_POST['siemail'];
        $sipass = $_POST['sipass'];
        $sipass = md5($sipass);
        $check = $conn->query("SELECT * FROM users WHERE email = '$siemail' AND pass = '$sipass'");
        if ($check->num_rows == 1) {
            $data = $check->fetch_object();
            echo "<script>toastr.success('Sign-in Successful');setTimeout(()=>location.href= './auth.php?token=123321&name=" . $data->name . "&email=" . $data->email . "&role=" . $data->role . "&img=" . $data->img . "', 2000)</script>";
        } else {
            $data = $check->fetch_object();
            echo "<script>toastr.error('Username or password error');</script>";
        }
    }
    ?>
    <div class="row my-5">
        <div class="col-md-5 m-auto p-4 border rounded shadow">
            <h2 class="mb-3">Sign-In Form</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="email" placeholder="Email Address" name="siemail" class="form-control" required>
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