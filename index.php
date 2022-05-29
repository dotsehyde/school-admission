<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

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
            <div>
                <h2>Welcome!</h2>
                <h3>Apply for free</h3>
                <p>Fill in the form at the right side to apply now!</p>
            </div>
            <p style="font-size:0.9rem; text-align: left;">The information on this form is to the best of my knowledge correct. I understand that any offer of a place to me as an undergraduate or diploma student will be based upon the information given on this form, and that if I am found to have given false information, the offer may be withdrawn. I understand that the information supplied on this form will be retained bt the University and will be used for the purpose of processing my application. If my application is accepted, the information will form part of my permanent student record. If I am admitted to the University. I promise to abide by all the policies and regulations of the University.</p>
        </section>
        <section class="right-panel">
            <form action="" method="post">
                <!-- Mode of application -->
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Mode of Application:
                    </p>
                    <div>
                        <input required type="radio" id="regular" name="application_mode" value="HTML">
                        <label for="regular">Regular</label>
                    </div>
                    <div>
                        <input required type="radio" id="distance" name="application_mode" value="CSS">
                        <label for="distance">Distance</label>
                    </div>
                    <div>
                        <input required type="radio" id="sandwich" name="application_mode" value="JavaScript">
                        <label for="sandwich">Sandwich</label>
                    </div>
                    <div>
                        <input required type="radio" id="evening" name="application_mode" value="JavaScript">
                        <label for="evening">Evening</label>
                    </div>
                    <div>
                        <input required type="radio" id="summer" name="application_mode" value="JavaScript">
                        <label for="summer">Summer</label>
                    </div>
                </div>
                <!-- Mature Student -->
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Mature Student:
                    </p>
                    <div>
                        <input required type="radio" id="m-yes" name="mature_student" value="HTML">
                        <label for="m-yes">Yes</label>
                    </div>
                    <div>
                        <input required type="radio" id="m-no" name="mature_student" value="CSS">
                        <label for="m-no">No</label>
                    </div>
                    <div>
                        <p style="font-size:0.8rem;"><em>(Note: Mature Applicants must be 25 years and above)</em></p>
                    </div>
                </div>
                <!-- Personal Information -->
                <div class="title">
                    <p>Personal Information</p>
                </div>
                <table>
                    <tr>
                        <div class="imageBox">
                            <p>Picture</p>
                            <img id="uploadPreview" style="width: 150px; height: 150px;" />
                            <input required type="file" id="uploadImage" name="picture" onchange="previewImage()" accept="image/*" />
                        </div>

                    </tr>
                    <tr>
                        <td>
                            <input required class="texrbox" type="text" name="lastName" placeholder="Last Name">
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="firstName" placeholder="First Name">
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="otherName" placeholder="Other Names">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input required class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="dob" placeholder="Date of Birth">
                        </td>
                        <td>
                            <select required name="nationality" class="texrbox">
                                <option value="" disabled selected>Select Nationality</option>
                                <option value="ghanaian">Ghanaian</option>
                                <option value="nigerian">Nigerian</option>
                                <option value="togolese">Togolese</option>
                            </select>
                        </td>
                        <td>
                            <select required name="country" class="texrbox">
                                <option value="" disabled selected>Country of Residence</option>
                                <option value="ghana">Ghana</option>
                                <option value="nigeria">Nigeria</option>
                                <option value="togo">Togo</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input required class="texrbox" type="email" name="email" placeholder="Email Address">
                        </td>
                        <td>
                            <input required class="texrbox" type="tel" name="phone" placeholder="Phone Number">
                        </td>
                        <td>
                            <select required name="marital_status" class="texrbox">
                                <option value="" disabled selected>Marital Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="text-area-box">
                    <textarea required class="texrbox" name="mailing_address" placeholder="Mailing Address"></textarea>
                </div>
                <div class="title">
                    <p>Academic Information</p>
                </div>
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Programme Type:
                    </p>
                    <div>
                        <input required type="radio" id="a-degree" name="prog_type" value="HTML">
                        <label for="a-degree">Degree</label>
                    </div>
                    <div>
                        <input required type="radio" id="a-diploma" name="prog_type" value="CSS">
                        <label for="a-diploma">Diploma</label>
                    </div>

                </div>
                <div class="buttons">
                    <button type="submit">Submit</button>
                    <button type="reset">Clear</button>

                </div>
            </form>
        </section>
    </div>
    <script src="./main.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>