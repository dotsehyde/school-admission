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
    <title>Admin | Admission</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <h3>Admin Panel</h3>
        <?php echo '<p>Welcome back ' . $_SESSION["name"] . '</p>' ?>
        <a href="./logout.php" class="login" onclick="return confirm('Do you want to logout? ')"><span class="iconify" data-icon="simple-line-icons:login"></span>Logout</a>

    </header>
    <section>
        <a href="./entries/index.php">
            <div class="menu-item">
                <span class="iconify" data-icon="tabler:files"></span>
                Entries
            </div>
        </a>
        <a href="./users/index.php">
            <div class="menu-item">
                <span class="iconify" data-icon="wpf:administrator"></span>
                Users
            </div>
        </a>

    </section>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>