<?php
require '../../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM entries WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if ($res) {
    echo '<script> alert("Entry deleted successfully")</script>';
    header("location:./index.php", true);
} else {
    echo '<script> alert("Failed to delete entry");</script>';
    header("location:./index.php", true);
}
mysqli_close($conn);
