<?php
class signInClass extends dbConnect
{
    private function __construct()
    {
    }
    private static function safuda($data): string | int
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    public static function check(): void
    {
        if (isset($_POST['si123'])) {
            $siemail = signInClass::safuda($_POST['siemail']);
            $sipass = signInClass::safuda($_POST['sipass']);
            $sipass = md5($sipass);
            $check = dbConnect::$conn->query("SELECT * FROM users WHERE email = '$siemail' AND pass = '$sipass'");
            if ($check->num_rows == 1) {
                $data = $check->fetch_object();
                echo "<script>toastr.success('Sign-in Successful');setTimeout(()=>location.href= './auth.php?token=123321&name=" . $data->name . "&email=" . $data->email . "&role=" . $data->role . "&img=" . $data->img . "', 2000)</script>";
            } else {
                $data = $check->fetch_object();
                echo "<script>toastr.error('Username or password error');</script>";
            }
        }
    }
}
signInClass::check();
