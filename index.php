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
        <img src="./img/logo.png" alt="Logo" height="100%">
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
            <form action="submit.php" method="post" enctype="multipart/form-data">
                <!-- Mode of application -->
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Mode of Application:
                    </p>
                    <div>
                        <input required type="radio" id="regular" name="application_mode" value="Regular">
                        <label for="regular">Regular</label>
                    </div>
                    <div>
                        <input required type="radio" id="distance" name="application_mode" value="Distance">
                        <label for="distance">Distance</label>
                    </div>
                    <div>
                        <input required type="radio" id="sandwich" name="application_mode" value="Sandwich">
                        <label for="sandwich">Sandwich</label>
                    </div>
                    <div>
                        <input required type="radio" id="evening" name="application_mode" value="Evening">
                        <label for="evening">Evening</label>
                    </div>
                    <div>
                        <input required type="radio" id="summer" name="application_mode" value="Summer">
                        <label for="summer">Summer</label>
                    </div>
                </div>
                <!-- Mature Student -->
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Mature Student:
                    </p>
                    <div>
                        <input required type="radio" id="m-yes" name="mature_student" value="Yes">
                        <label for="m-yes">Yes</label>
                    </div>
                    <div>
                        <input required type="radio" id="m-no" name="mature_student" value="No">
                        <label for="m-no">No</label>
                    </div>
                    <div>
                        <p style="font-size:0.8rem;"><em>(Note: Mature Applicants must be 25 years and above)</em></p>
                    </div>
                </div>
                <!-- Personal Information -->
                <div class="title">
                    <p><span class="iconify" data-icon="bi:person-fill"></span>PERSONAL INFORMATION</p>
                </div>
                <div class="imageBox">
                    <p>Picture</p>
                    <img id="uploadPreview" style="width: 150px; height: 150px;" />
                    <input required type="file" id="uploadImage" name="picture" onchange="previewImage()" accept="image/*" />
                </div>
                <table id="personal">
                    <tr>

                    </tr>
                    <tr>
                        <td>
                            <input required class="texrbox" type="text" name="lastName" placeholder="Last Name">
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="firstName" placeholder="First Name">
                        </td>
                        <td>
                            <input class="texrbox" type="text" name="otherName" placeholder="Other Names">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select required name="gender" class="texrbox">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </td>
                        <td>
                            <input required class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="dob" placeholder="Date of Birth">
                        </td>
                        <td>
                            <input required class="texrbox" type="email" name="email" placeholder="Email Address">
                        </td>
                    </tr>
                    <tr>

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
                    <tr>
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
                </table>

                <div class="text-area-box">
                    <textarea required class="texrbox" name="mailing_address" placeholder="Mailing Address"></textarea>
                </div>

                <!-- Programme Information -->
                <div class="title">
                    <p><span class="iconify" data-icon="map:school"></span>PROGRAMME OF STUDY</p>
                </div>
                <div class="row" style="margin:1%">
                    <p style="font-weight: 600;">
                        Programme Type:
                    </p>
                    <div>
                        <input required type="radio" id="a-degree" name="prog_type" value="Degree">
                        <label for="a-degree">Degree</label>
                    </div>
                    <div>
                        <input required type="radio" id="a-diploma" name="prog_type" value="Diploma">
                        <label for="a-diploma">Diploma</label>
                    </div>

                </div>
                <p style="font-size: 0.8rem; margin-left: 1%;"><em>Please indicate in order of preferece your proposed programme
                        of study(refer to the enclosed list of programmes)</em></p>
                <table id="choice">
                    <th>
                        CHOICE
                    </th>
                    <th>UNDERGRADUATE & DIPLOMA PROGRAMMES</th>
                    <tr>
                        <td>
                            1st Choice
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="progs[]" placeholder="1st Choice">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2nd Choice
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="progs[]" placeholder="2nd Choice">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3rd Choice
                        </td>
                        <td>
                            <input required class="texrbox" type="text" name="progs[]" placeholder="3rd Choice">
                        </td>
                    </tr>
                </table>
                <p style="font-weight: 600; margin-left: 1%;">
                    When Do You Intend To Enroll?
                </p>
                <div class="row" style="margin:1%; text-align: center;">
                    <div>
                        <input required type="radio" id="prog-fir" name="prog_enroll" value="First Semester">
                        <label for="prog-fir">First Semester(August/September)</label>
                    </div>
                    <div>
                        <input required type="radio" id="prog-sec" name="prog_enroll" value="Second Semester">
                        <label for="prog-sec">Second Semester(January)</label>
                    </div>
                    <div>
                        <input required type="radio" id="prog-summer" name="prog_enroll" value="Sandwitch/Summer">
                        <label for="prog-summer">Sandwitch/Summer</label>
                    </div>
                </div>

                <div class="title">
                    <p><span class="iconify" data-icon="dashicons:welcome-learn-more"></span>EDUCATION AND QUALIFICATION</p>
                </div>
                <p style="font-size: 0.8rem; margin: 1%; margin-bottom: 0 !important;"><em>Please attach certified copy of results slip or certificate (pdf or image)</em></p>
                <table id="edu">
                    <tr>
                        <th>
                            Schoool/Institution/College
                        </th>
                        <th>Date admitted</th>
                        <th>Date completed</th>
                        <th>Qualification</th>
                    </tr>

                    <tr>
                        <td>
                            <input required class="texrbox" type="text" name="edu_school[]" placeholder="School Name">
                        </td>
                        <td>
                            <input required class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_from[]" placeholder="Date Admitted">
                        </td>
                        <td>
                            <input required class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_to[]" placeholder="Date Completed">
                        </td>
                        <td>
                            <input required type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="texrbox" type="text" name="edu_school[]" placeholder="School Name">
                        </td>
                        <td>
                            <input class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_from[]" placeholder="Date Admitted">
                        </td>
                        <td>
                            <input class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_to[]" placeholder="Date Completed">
                        </td>
                        <td>
                            <input type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="texrbox" type="text" name="edu_school[]" placeholder="School Name">
                        </td>
                        <td>
                            <input class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_from[]" placeholder="Date Admitted">
                        </td>
                        <td>
                            <input class="texrbox" onfocus="(this.type='date')" onblur="(this.type='text')" type="text" name="edu_to[]" placeholder="Date Completed">
                        </td>
                        <td>
                            <input type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                        </td>
                    </tr>
                </table>
                <!-- DETAILS OF GUARDIAN/SPONSOR/NEXT OF KIN -->
                <div class="title">
                    <p><span class="iconify" data-icon="ri:parent-fill"></span>DETAILS OF GUARDIAN/SPONSOR/NEXT OF KIN</p>
                </div>
                <table style="margin-top: 1%;" id="personal">
                    <tr>
                        <td>
                            <select required name="sp_title" class="texrbox">
                                <option value="" disabled selected>Select title</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Pr.">Pr.</option>
                                <option value="Nana">Nana</option>
                            </select>
                        </td>
                        <td><input required class="texrbox" type="text" name="sp_name" placeholder="Name"></td>
                        <td><input required class="texrbox" type="text" name="sp_relation" placeholder="Relationship to Applicant"></td>
                    </tr>
                    <tr>
                        <td><input required class="texrbox" type="text" name="sp_occupation" placeholder="Occupation"></td>
                        <td><input required class="texrbox" type="tel" name="sp_phone" placeholder="Phone Number"></td>
                        <td><input class="texrbox" type="email" name="sp_email" placeholder="Email"></td>

                    </tr>
                </table>
                <div class="text-area-box">
                    <textarea required class="texrbox" name="sp_address" placeholder="Mailing Address"></textarea>
                </div>
                <!-- RELEGIOUS AFFILATION  -->
                <div class="title">
                    <p><span class="iconify" data-icon="fa-solid:church"></span>RELEGIOUS AFFILATION</p>
                </div>
                <div class="row" style="margin:1%">

                    <div>
                        <input required type="radio" id="r-type" name="rel_type" value="Christian">
                        <label for="r-type">Christian</label>
                    </div>
                    <div>
                        <input required type="radio" id="r-type2" name="rel_type" value="Muslim">
                        <label for="r-type2">Muslim</label>
                    </div>
                    <div>
                        <input required type="radio" id="r-type3" name="rel_type" value="Others">
                        <label for="r-type3">Others</label>
                    </div>
                </div>
                <div class="text-area-box" style="margin: 0 1%;">
                    <input class="texrbox" type="text" name="rel_deno" placeholder="if Christian Specify denominataion" />
                </div>
                <hr style="margin-bottom:1%;" />
                <!-- Terms & Condition  -->
                <p><span class="iconify" data-icon="bi:arrow-left-square" style="margin: 0 0.8%; vertical-align: top; font-size:1.2rem;"></span>Please read the declaration at left side and check the box below.</p>
                <div class="row" style="margin:1%;">
                    <input required type="checkbox" name="tc" id="tc">
                    <p>I accept.</p>
                </div>
                <!-- Buttons -->
                <div class="buttons">
                    <button type="submit"><span class="iconify" data-icon="ic:twotone-done-all"></span> Submit</button>
                    <button type="reset"><span class="iconify" data-icon="fluent:text-clear-formatting-16-filled"></span> Clear</button>

                </div>
            </form>
        </section>
    </div>
    <script src="./main.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>