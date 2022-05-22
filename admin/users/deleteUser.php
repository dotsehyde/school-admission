<?php
require '../../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if ($res) {
    echo '<script language="javascript">';
    echo 'alert("User deleted successfully")';
    echo '</script>';
    header("location:./index.php", true);
} else {
    echo '<script language="javascript">';
    echo 'alert("Could not delete user")';
    echo '</script>';
    header("location:./index.php", true);
}
