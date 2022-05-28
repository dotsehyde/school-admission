<?php
session_start();
if (!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
    // Redirect user to Login page
    header("location: login.php", true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enteries | Admission</title>

</head>

<body>

</body>

</html>