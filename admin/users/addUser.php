<?php
session_start();
if (!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
    // Redirect user to Login page
    header("location: ../login.php", true);
}
require "../../config.php";
$err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $name = $_POST['name'];

    if ($password !== $cpassword) {
        $err = "Password doesn't match";
    } else {
        $sql = "INSERT INTO users (name,email,password) VALUES (' $name ',' $email ',' $password')";
        $res = mysqli_query($conn, $sql);
        //Check added successfully
        if ($res) {
            echo 'Added successfully<br>';
            // Redirect user to Users page
            header("location: index.php", true);
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User | Admission</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@200;300;400;500;600;700;800&display=swap');

    * {
        font-family: 'Montserrat', sans-serif;
    }

    body {
        height: 100vh;
        width: 100vw;
    }

    section {
        display: grid;
        place-content: center;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        overflow: hidden;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form .error {
        color: red;

    }


    form .inputBox {
        width: 28vw;
        margin: 10px;
        border-radius: 15px;
        background-color: #F3F3F3;
    }

    @media screen and (max-width: 992px) {
        form .inputBox {
            width: 50vw;
        }
    }


    form .inputBox:hover {
        background-color: #e0e0e0;
    }

    form input {
        outline: none;
        border: none;
        width: 90%;
        padding: 10px;
        background-color: transparent;
        height: 100%;
    }

    form input:focus {
        background-color: none;
    }

    button {
        border: none;
        background-color: #2155CD;
        padding: 10px;
        color: white;
        margin: auto 10px;
        border-radius: 18px;
        font-size: 1.1rem;
    }

    button:hover {
        cursor: pointer;
        background-color: #0AA1DD;
    }
</style>

<body>
    <section>
        <h1>Add Admin User</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="inputBox">
                <input type="text" id="name" placeholder="Name" name="name" required />
            </div>
            <div class="inputBox">
                <input type="email" id="email" placeholder="Email" name="email" required />
            </div>
            <div class="inputBox">
                <input type="password" id="password" placeholder="Password" name="password" required />
            </div>
            <div class="inputBox">
                <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required />
            </div>
            <?php
            if (!empty($err)) {
                echo '<div class="error">' . $err . '</div>';
            }
            ?>
            <button id="login-btn" type="submit" value="">Add User</button>
        </form>
    </section>

</body>

</html>