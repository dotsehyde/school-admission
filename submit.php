<?php
require "./config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_mode = $_POST['application_mode'];
    $mature_student = $_POST['mature_student'];
    //Personal Info
    $surname = $_POST['lastName'];
    $first_name = $_POST['firstName'];
    $other_name = $_POST['otherName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $mailing_address = $_POST['mailing_address'];
    $phone = $_POST['phone'];

    //Programme of study
    $prog_type = $_POST['prog_type'];
    $progs = $_POST['progs']; //[] //["IT","Maths","English"]
    $enc_progs = json_encode($progs);
    $prog_enroll = $_POST['prog_enroll'];

    //EDUCATION
    $edu_school = $_POST['edu_school']; //[]
    $enc_edu_school = json_encode($edu_school);
    $edu_from = $_POST['edu_from']; //[]
    $enc_edu_from = json_encode($edu_from);
    $edu_to =  $_POST['edu_to']; //[]
    $enc_edu_to = json_encode($edu_to);

    //SPONSOR
    $sp_title = $_POST['sp_title'];
    $sp_name = $sp_title . ' ' . $_POST['sp_name'];
    $sp_relation = $_POST['sp_relation'];
    $sp_occupation = $_POST['sp_occupation'];
    $sp_phone = $_POST['sp_phone'];
    $sp_email = $_POST['sp_email'];
    $sp_address = $_POST['sp_address'];

    //RELEGION
    $rel_type = $_POST['rel_type'];
    $rel_deno = $_POST['rel_deno'];

    //Files
    $pictureName = $_FILES['picture']['name'];
    $pictureExt = explode('.', $pictureName); //Get extension eg. jpg
    $pictureActualExt = strtolower(end($pictureExt)); //Convert to lowercase 
    $pictureNewName = uniqid('', true) . "." . $pictureActualExt;
    $pictureLoc = 'uploads/' . $pictureNewName;

    move_uploaded_file($_FILES['picture']['tmp_name'], $pictureLoc);
    //Get and save the cert file into an array
    $certLocs = array();
    $certTmpPath = array();
    foreach ($_FILES['edu_cert']['name'] as $name) {
        if (isset($name) || $name !== "") {
            $certExt = explode('.', $name);
            $certActualExt = strtolower(end($certExt)) ?? "";
            $certNewName = uniqid('cert_', true) . "." . $certActualExt;
            $certLoc = 'uploads/' . $certNewName;
            if ($certActualExt !== "") {
                array_push($certLocs, $certLoc);
            }
        }
    }
    foreach ($_FILES['edu_cert']['tmp_name'] as $i) {
        if (isset($i) || $i !== "") {
            array_push($certTmpPath, $i);
        }
    }
    for ($x = 0; $x < count($certLocs); $x++) {
        move_uploaded_file($certTmpPath[$x], $certLocs[$x]);
    }
    $enc_edu_cert = json_encode($certLocs);

    $sql = "INSERT INTO entries (application_mode,mature_student,surname,first_name,other_name,gender,dob,nationality,marital_status,mailing_address,email,country,phone,prog_type,prog_enroll,picture,sp_title,sp_name,sp_relation,sp_occupation,sp_address,sp_email,sp_phone,rel_type,rel_deno,progs,edu_school,edu_to,edu_from,edu_cert) VALUES ('$application_mode','$mature_student','$surname','$first_name','$other_name','$gender','$dob','$nationality','$marital_status','$mailing_address','$email','$country','$phone','$prog_type','$prog_enroll','$pictureLoc','$sp_title','$sp_name','$sp_relation','$sp_occupation','$sp_address','$sp_email','$sp_phone','$rel_type','$rel_deno','$enc_progs','$enc_edu_school','$enc_edu_to','$enc_edu_from','$enc_edu_cert')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: ./views/success.html', true);
    } else {
        header('Location: ./views/failed.html', true);
    }
}
mysqli_close($conn);
