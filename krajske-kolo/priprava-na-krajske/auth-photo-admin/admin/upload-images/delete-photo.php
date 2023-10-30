<?php
require "../auth.php";
require "../../assets/database.php";
require "../../assets/user.php";

session_start();

if (!isLoggedIn()) {
    die("nepovoleny pristup");
}

$user_id = $_GET["id"];
$image_name = $_GET["image_name"];

$path = "../uploads/" . $user_id . "/" . $image_name;



try {
    deletePhotoFromDirectory($path);

    // Mazanie z databázy
    deletePhotoFromDatabase($connection, $image_name);

    echo "<script>window.location.href = 'photos.php';</script>";
} catch (Exception $e) {
    echo "chybicka: " . $e->getMessage();
}
?>
