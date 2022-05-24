<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .texrbox {
        padding: 8px !important;
        height: auto;
        width: 95%;
        background: #f2f2f2;
        color: #333;
        border: none;
        border-bottom: 1px solid #999;
        border-radius: 1px;
        font-family: 'josefin_sansregular', sans-serif;
        font-size: 15px;
        outline: none;
        -webkit-transition: all 250ms ease-in;
        -moz-transition: all 250ms ease-in;
        -ms-transition: all 250ms ease-in;
        -o-transition: all 250ms ease-in;
        transition: all 250ms ease-in;
    }

    .texrbox:focus {
        background: #f9f9f9;
        border-bottom: 1px solid #333;
    }

    td {
        text-align: center;
    }
</style>

<body>
    <header>
        <p>Logo</p>
        <h3>Admission Form</h3>
        <?php
        session_start();
        if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
            echo '<a href="./admin/index.php" class="login"><span class="iconify" data-icon="simple-line-icons:login"></span>Admin</a>';
        } else {
            echo '<a href="./admin/login.php" class="login"><span class="iconify" data-icon="simple-line-icons:login"></span>Login</a>';
        }
        ?>
    </header>
    <div class="container">
        <section class="left-panel">
            <h2>Welcome!</h2>
            <h3>Apply for free</h3>
            <p>Fill in the form at the right side to apply now!</p></br>
            <p>The information on this form is to the best of my knowledge correct. I understand that any offer of a place to me as an undergraduate or diploma student will be based upon the information given on this form, and that if I am found to have given false information, the offer may be withdrawn. I understand that the information supplied on this form will be retained bt the University and will be used for the purpose of processing my application. If my application is accepted, the information will form part of my permanent student record. If I am admitted to the University. I promise to abide by all the policies and regulations of the University.</p>
        </section>
        <section class="right-panel">
            <form action="" method="post">
                <span>Passport Picture</span> <input type="file" />
                <label for="">Personal Information</label>
                <table>
                    <tr>
                        <td>
                            <input class="texrbox" type="text" name="firstName" placeholder="First Name">
                        </td>
                        <td>
                            <input class="texrbox" type="text" name="otherName" placeholder="Other Names">
                        </td>
                        <td>
                            <input class="texrbox" type="text" name="lastName" placeholder="Last Name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="texrbox" type="date" name="dob" placeholder="Other Names">
                        </td>
                    </tr>
                </table>
                <div class="buttons">
                    <button type="submit">Submit</button>
                    <button type="reset">Clear</button>

                </div>
            </form>
        </section>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>