<?php
include_once("./header.php");
include_once("./navbar.php");
!isset($_SESSION['name']) && header("location: ./");

if (isset($_POST['cpassbtn'])) {
    $opass = md5($_POST['opass']);
    $npass = md5($_POST['npass']);
    $cnpass = md5($_POST['cnpass']);
    $email = $_SESSION['email'];

    $getPreData = $conn->query("SELECT  * FROM users WHERE email = '$email'");
    $getData = $getPreData->fetch_object();
    $getpreePass = $getData->pass;

    if ($opass != $getpreePass) {
        echo "<script>toastr.error('Wrong old password');</script>";
    } else {
        if ($npass != $cnpass) {
            echo "<script>toastr.error('Password didnot matched');</script>";
        } else {
            $changePass = $conn->query("UPDATE users SET pass = '$cnpass' WHERE email = '$email'");
            if (!$changePass) {
                echo "<script>toastr.error('Database Problem');</script>";
            } else {
                echo "<script>toastr.success('Password changed successfully');</script>";
            }
        }
    }
}
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 shadow border rounded p-4 m-auto">
            <h3>Change Password</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Old Password" required name="opass">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="New Password" required name="npass" minlength="6">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Confirm New Password" required name="cnpass">
                </div>
                <input type="submit" value="Change Password" class="btn btn-primary" name="cpassbtn">
            </form>
        </div>
    </div>
</div>

<?php
include_once("./footer.php");
?>