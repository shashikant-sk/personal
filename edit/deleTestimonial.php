<?php
session_start();
if (!isset($_SESSION["access"])) {
    header("location: login.php");
    die("Login first!!!");
}
$id = $_REQUEST["q"];
include('../db.php');
$sql = "SELECT image FROM testimonials WHERE id = $id";
$result = $con->query($sql);
$image = $result->fetch_assoc();
if (unlink("../Images/testimonials/" . $image['image'])) {
    $sql = "DELETE FROM testimonials WHERE id = $id";
    $result = $con->query($sql);
    if ($result == true) {
        echo "deleted Sucessfully";
    } else {
        echo "error";
    }
} else {
    die("Error");
}
