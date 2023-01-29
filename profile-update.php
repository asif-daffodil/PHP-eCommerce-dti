<?php
include_once("./header.php");
include_once("./navbar.php");
!isset($_SESSION['name']) && header("location: ./");
function updateData ($crrEmail, $crrName, $conn, $preEmail) {
    if (isset($crrEmail) && isset($crrName)) {
        $check = $conn->query("SELECT * FROM `users` WHERE `email` = '$preEmail'");
        $c = $check->fetch_object();
        $id = $c->id;
        $crrEmail = $conn->real_escape_string($crrEmail);
        $crrName = $conn->real_escape_string($crrName);
        $updateUser = $conn->query("UPDATE `users` SET `email` = '$crrEmail', `name` = '$crrName' WHERE `id` = $id");

        if ($updateUser) {
            echo "<script>toastr.success('User updated');</script>";
            $_SESSION['name'] = $crrName;
            $_SESSION['email'] = $crrEmail;
        }
    }
}
?>
<div class="container">
    <?php
    if (isset($_POST['pu123'])) {
        $puemail = $_POST['puemail'];
        $puname = $_POST['puname'];
        $preEmail = $_SESSION['email'];
        $preName = $_SESSION['name'];
        if ($preEmail === $puemail && $preName === $puname) {
                echo "<script>toastr.error('Please provide a new data');</script>";
        }else {
            if($preEmail !== $puemail){
                $check = $conn->query("SELECT * FROM `users` WHERE `email` = '$puemail'");
                if ($check->num_rows > 0) {
                    echo "<script>toastr.error('Email already exicts');</script>";
                }else{
                    $crrEmail = $puemail;
                    $crrName = $puname;
                    updateData ($crrEmail, $crrName, $conn, $preEmail);
                }
            }else{
                $crrEmail = $puemail;
                $crrName = $puname;
                updateData ($crrEmail, $crrName, $conn, $preEmail);
            }
        }
    }

    if (isset($_FILES['ppimg']['name'])) {
        $fname = $_FILES['ppimg']['name'];
        $tmp_fname = $_FILES['ppimg']['tmp_name'];

        $newImgName = date("FdYHisa") . uniqid() . random_int(1000, 9999) . "." . pathinfo($fname, PATHINFO_EXTENSION);
        $destination = "./images/$newImgName";
        $move = move_uploaded_file($tmp_fname, $destination);
        if (!$move) {
            echo "<script>toastr.error('Image upload problem');</script>";
        } else {
            $preEmail = $_SESSION['email'];
            $upImg = $conn->query("UPDATE users SET img = '$newImgName' WHERE email = '$preEmail'");
            if (!$upImg) {
                echo "<script>toastr.error('Database problem');</script>";
            } else {
                if ($_SESSION['img'] != "") {
                    $img = $_SESSION['img'];
                    unlink("./images/$img");
                }
                $_SESSION['img'] = $newImgName;
                echo "<script>toastr.success('Image uploaded successfully');</script>";
            }
        }
    }
    ?>
    <div class="row my-5">
        <div class="col">
            <div class="p-4 border rounded shadow">
                <h2 class="mb-3">Update Profile</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="email" placeholder="Email Address" name="puemail" class="form-control" value="<?= $_SESSION['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Name" name="puname" class="form-control" value="<?= $_SESSION['name'] ?>" required>
                    </div>
                    <button type="submit" name="pu123" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
        <div style="width: max-content;">
            <div class="p-4 border rounded shadow">
                <form action="" method="post" enctype="multipart/form-data" id="imgForm">
                    <label for="ppimg" class="text-center">
                        <img src='./images/<?= (!isset($_SESSION['img']) || $_SESSION['img'] == "") ? "profile.png":$_SESSION['img'] ?>' alt="" class="img-fluid"><br>
                        Click on image to upload/Change
                    </label>
                    <input type="file" id="ppimg" class="d-none" accept="image/*" name="ppimg">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#ppimg").on("change", () => $("#imgForm").submit())
</script>

<?php
include_once("./footer.php");
?>