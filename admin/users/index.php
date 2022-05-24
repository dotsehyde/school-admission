<?php
session_start();
if (!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
    // Redirect user to Login page
    header("location: ../login.php", true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Admission</title>
</head>

<style>
    * {
        box-sizing: border-box;
    }

    section {
        background-color: #CCE4C8;
    }

    section>ul {
        list-style: none;
    }

    .details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-right: 35px;
    }

    .details>.iconify {
        margin-right: 20px;
    }

    .action {
        display: flex;

    }

    .add {
        display: flex;
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #2C9376;
        margin-right: 10px;
    }

    .add:hover {
        background-color: #60B099;
    }

    .action>.del {
        display: flex;
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #DB3333;
        border: none;
    }

    .action>.del:hover {
        background-color: #D15858;
        cursor: pointer;
    }
</style>

<body>
    <div class="header">
        <h1>Users</h1>
        <a href="./addUser.php" class="add">Add User</a>
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
                     <div class="details">
                     <p>' . $row['name'] . '</p>
                     <p>' . $row['email'] . '</p>
                     <div class="action">
                     <button class="del" onclick="deleteUser(' . $row['id'] . ')">Delete</a>
                     </div>
                     </div>
                     <hr>
                     </li>';
                    //  <a href="" class="edit">Edit</a>
                }
            } else {
                $err = "Oops! No users";
            }
            mysqli_close($conn);
            ?>

        </ul>
    </section>
    <script src="./js/users.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>