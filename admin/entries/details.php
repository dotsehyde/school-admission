<?php
require '../../config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM entries WHERE id = " . $id;
$res = mysqli_query($conn, $sql);
if ($res) {
    header("HTTP/1.1 200 OK");
} else {
    echo 'Error';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Details</title>
    <link rel="stylesheet" href="../../style.css?v=<?php echo time(); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
    .del {
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #DB3333;
        border: none;
        margin-left: 1%;
    }

    .view {
        border: none;
        text-decoration: none;
        color: white;
        padding: 8px;
        text-align: center;
        border-radius: 10px;
        background-color: #2155CD;
    }

    .view:hover {
        background-color: #0AA1DD;
        cursor: pointer;
    }

    .iconify {
        font-size: 16px;
    }

    .del:hover {
        background-color: #D15858;
        cursor: pointer;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #print #back {
            visibility: hidden;
        }

        #print .iconify {
            visibility: hidden;
        }

        #print button {
            visibility: hidden;
        }

        #print,
        #print * {
            visibility: visible;
        }


    }
</style>

<body>
    <section id="print">

        <a id="back" href="./index.php"><span class="iconify" data-icon="eva:arrow-back-fill"></span> Go Back</a>
        <?php
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $progs = json_decode($row['progs']);
                $edu_school = json_decode($row['edu_school']);
                $edu_to = json_decode($row['edu_to']);
                $edu_from = json_decode($row['edu_from']);
                $edu_cert = json_decode($row['edu_cert']);
                echo
                '<div style="display:flex; justify-content: center;">
            <tr style="text-align:center;">
                <td>
                    <div class="row" style="margin:1%">
                        <p style="font-weight: 600;">
                            Mode of Application: <span style="font-weight: normal;">' . $row['application_mode'] . '</span>
                        </p>
                    </div>
                </td>
                <td>
                    <div class="row" style="margin:1%">
                        <p style="font-weight: 600;">
                            Mature Student: <span style="font-weight: normal;">' . $row['mature_student'] . '</span>
                        </p>
                    </div>
                </td>
            </tr>
        </div>
        <div class="title">
            <p><span class="iconify" data-icon="bi:person-fill"></span>PERSONAL INFORMATION</p>
        </div>
        <div style="width:100%;text-align: center; margin-top: 1%;">
            <img src="../../' . $row['picture'] . '" alt="' . $row['surname'] . '" width="140" height="140">
        </div>

        <table style="width:100%;">
            <tr>
                <th>Surname</th>
                <th>First Name</th>
                <th>Other Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
            </tr>
            <tr style="border: 1px solid black;">
                <td>' . $row['surname'] . '</td>
                <td>' . $row['first_name'] . '</td>
                <td>' . $row['other_name'] . '</td>
                <td>' . $row['dob'] . '</td>
                <td>' . $row['gender'] . '</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Matrial Status</th>
                <th>Nationality</th>
                <th>Country of Residence</th>
            </tr>
            <tr>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['marital_status'] . '</td>
                <td>' . $row['nationality'] . '</td>
                <td>' . $row['country'] . '</td>
            </tr>
        </table>
        <br>
        <div style="text-align:center; margin-bottom: 2%;">
            <p style="font-weight: 600; ">
                Mailing Address:
            </p>
            <span style="font-weight: normal;">' . $row['mailing_address'] . '</span>
        </div>
        <div class="title">
            <p><span class="iconify" data-icon="map:school"></span>PROGRAMME OF STUDY</p>
        </div>
        <div style="text-align:center; margin: 1% 0; display:flex; justify-content: space-around; ">
            <div>
                <p style="font-weight: 600; ">
                    Programme Type:
                </p>
                <span style="font-weight: normal; ">' . $row['prog_type'] . '</span>
            </div>
            <div>
                <p style="font-weight: 600; ">
                    Enroll Period:
                </p>
                <span style="font-weight: normal; ">' . $row['prog_enroll'] . '</span>
            </div>
        </div>
        <table style="display: flex; justify-content: space-around; width:100%; margin-bottom: 1%;">';
                for ($i = 0; $i < count($progs); $i++) {
                    if ($progs[$i] !== "") {

                        echo '  <tr>
    <th>
        ' . $i + 1 . ' Choice
    </th>
    <td>
        <p>' . $progs[$i] . '</p>
    </td>
    </tr>';
                    }
                }
                echo '</table>
                <div class="title">
            <p><span class="iconify" data-icon="dashicons:welcome-learn-more"></span>EDUCATION AND QUALIFICATION</p>
        </div>
        <table style="width:100%; padding: 0 8%; margin: 1.5% 0">
            <tr>
                <th>
                    Schoool/Institution/College
                </th>
                <th>Date admitted</th>
                <th>Date completed</th>
                <th>Qualification</th>
            </tr>
                ';
                echo '';
                for ($i = 0; $i < count($edu_cert); $i++) {
                    if ($edu_school[$i] !== "") {
                        echo '<tr>
                         <td>
                            ' . $edu_school[$i] . '
                        </td>
                        <td>
                        ' . $edu_from[$i] . '
                    </td>
                    <td>
                            ' . $edu_to[$i] . '
                        </td>
                        <td>
                        <a href="../../' . $edu_cert[$i] . '" download> Download Certificate</a>
                    </td>
                    </tr>
                        ';
                    }
                }
                echo '
                </table>
                <div class="title">
                <p><span class="iconify" data-icon="ri:parent-fill"></span>DETAILS OF GUARDIAN/SPONSOR/NEXT OF KIN</p>
            </div>
            <table style=" width:100%; margin: 1.5% 0;">
            <tr>
                <th>
                    Name
                </th>
                <th>Relationship to Applicant</th>
                <th>Occupation</th>
                <th>Phone Number</th>
                <th>Email Address</th>

            </tr>
            <tr>
                <td>' . $row['sp_name'] . '</td>
                <td>' . $row['sp_relation'] . '</td>
                <td>' . $row['sp_occupation'] . '</td>
                <td>' . $row['sp_phone'] . '</td>
                <td>' . $row['sp_email'] . '</td>
            </tr>
        </table>
        <div style="text-align:center; margin-bottom: 2%;">
            <p style="font-weight: 600; ">
                Mailing Address:
            </p>
            <span style="font-weight: normal;">' . $row['sp_address'] . '</span>
        </div>
        <div class="title">
            <p><span class="iconify" data-icon="fa-solid:church"></span>RELEGIOUS AFFILATION</p>
        </div>
        <div style="text-align:center; margin: 1.5% 0; display:flex; justify-content: space-around; ">
            <div>
                <p style="font-weight: 600; ">
                    Relegious Type:
                </p>
                <span style="font-weight: normal; ">' . $row['rel_type'] . '</span>
            </div>
            <div style=" margin-bottom:2% !important;">
                <p style="font-weight: 600; ">
                    Denominataion:
                </p>
                <span style="font-weight: normal;">' . $row['rel_deno'] . '</span>
            </div>
        </div>
        <div style="display:float; position:sticky; bottom:10px; left:2px; margin-left:10px;">
         <button class="view" onclick="window.print()"><span class="iconify" data-icon="carbon:data-view-alt"></span>Download PDF</a>
            <button class="del" onclick="deleteEntry(' . $row['id'] . ')"><span class="iconify" data-icon="fluent:delete-16-regular"></span>Delete</a>
     </div>
                ';
            }
        } else {
            echo 'Nothing here!';
        }
        ?>

    </section>
    <!-- <script>
        function downloadPDF() {
            const doc = document.getElementById("doc");
            var opt = {
                margin: 1,
                filename: 'file.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().from(doc).save();
        }
    </script> -->
    <script type="text/javascript" src="./js/main.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</body>

</html>