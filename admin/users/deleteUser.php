<?php
require '../../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if ($res) {
    echo '<script> alert("User deleted successfully")</script>';
    header("location:./index.php", true);
} else {
    echo '<script> alert("Failed to delete user");</script>';
    header("location:./index.php", true);
}
mysqli_close($conn);
