<?php
session_start();
if (!isset($_SESSION["access"])) {
    header("location: login.php");
    die("Login first!!!");
}
$id = $_REQUEST["q"];
include('../db.php');
$sql = "DELETE FROM skills WHERE id = $id";
$result = $con->query($sql);
if ($result == true) {
    echo "deleted Sucessfully";
} else {
    echo "error";
}
