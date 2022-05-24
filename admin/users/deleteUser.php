<?php
require '../../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if ($res) {
    header("HTTP/1.1 200 OK");
    header("location:./index.php", true);
} else {
    header("HTTP/1.1 500 Error");
    header("location:./index.php", true);
}
mysqli_close($conn);
