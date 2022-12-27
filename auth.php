<?php
session_start();
if (isset($_GET['token']) && isset($_GET['name']) && isset($_GET['email'])) {
    if ($_GET['token'] == 123321) {
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['email'] = $_GET['email'];
        $_SESSION['role'] = $_GET['role'] ?? 'user';
        $_SESSION['img'] = $_GET['img'] ?? null;
        header("location: ./");
    } else {
        header("location: ./logout.php");
    }
} else {
    header("location: ./logout.php");
}
