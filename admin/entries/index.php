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

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@200;300;400;500;600;700;800&display=swap');

    * {
        font-family: 'Montserrat', sans-serif;
        box-sizing: border-box;
    }

    section {
        background-color: #E8F9FD;
    }

    section>ul {
        list-style: none;
    }

    .list {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-right: 35px;
    }

    .action {
        display: flex;
        gap: 2px;
    }

    .action>.del {
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #DB3333;
        border: none;
    }

    .action>.view {
        border: none;
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #2155CD;
    }

    .action>.view:hover {
        background-color: #0AA1DD;
        cursor: pointer;
    }

    .action>.iconify {
        font-size: 16px;
    }

    .action>.del:hover {
        background-color: #D15858;
        cursor: pointer;
    }
</style>

<body>
    <div class="header">
        <h1>Admission Enteries</h1>
    </div>
    <hr />
    <section>
        <?php
        if (!empty($login_err)) {
            echo '<div class="error">' . $err . '</div>';
        }
        ?>
        <ul>
            <?php
            require '../../config.php';
            $err = "";
            $sql = "SELECT * FROM users";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    // echo "Name: " . $row['name'];
                    echo '<li>
                     <div class="list">
                     <p>' . $row['name'] . '</p>
                     <p>' . $row['email'] . '</p>
                     <div class="action">
                     <button class="view" onclick=""><span class="iconify" data-icon="carbon:data-view-alt"></span>View</a>
                     <button class="del" onclick="deleteUser(' . $row['id'] . ')"><span class="iconify" data-icon="fluent:delete-16-regular"></span>Delete</a>
                     </div>
                     </div>
                     <hr>
                     </li>';
                    //  <a href="" class="edit">Edit</a>
                }
            } else {
                $err = "Oops! No Enteries yet";
            }
            mysqli_close($conn);
            ?>

        </ul>
    </section>
    <script src="./js/users.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>