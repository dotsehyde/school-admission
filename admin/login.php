<?php
// Initialize the session
session_start();
//Check if user already logged in
if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
    // Redirect user to Admin page
    header("location: index.php", true);
}
require "../config.php";
$login_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '" . $email . "' AND PASSWORD = '" . $password . "'";

    $res = mysqli_query($conn, $sql);
    //Check login status
    if (mysqli_num_rows($res) > 0) {
        echo 'login successful<br>';

        while ($row = mysqli_fetch_assoc($res)) {
            echo "Name: " . $row['name'];
            // Store data in session variables
            $_SESSION["logged"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row['name'];
        }
        // Redirect user to Admin page
        header("location: index.php", true);
    } else {
        $login_err = "Incorrect email or password";
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
    <title>Admin Login | Admission</title>
</head>

<style>
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
        background-color: #2C9376;
        padding: 10px;
        color: white;
        margin: auto 10px;
        border-radius: 18px;
        font-size: 1.1rem;
    }

    button:hover {
        cursor: pointer;
        color: white;
        background-color: #46B39E;
    }
</style>

<body>
    <section>
        <h1>Admin Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="inputBox">
                <input type="email" id="email" placeholder="Email" name="email" required />
            </div>
            <div class="inputBox">
                <input type="password" id="password" placeholder="Password" name="password" required />
            </div>
            <?php
            if (!empty($login_err)) {
                echo '<div class="error">' . $login_err . '</div>';
            }
            ?>
            <button id="login-btn" type="submit" value="Login">Login</button>
        </form>
    </section>

</body>


</html>