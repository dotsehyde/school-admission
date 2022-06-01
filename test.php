<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="test.php" method="post" enctype="multipart/form-data">
        <table id="edu">
            <tr>

                <th>Qualification</th>
            </tr>

            <tr>

                <td>
                    <input required type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                </td>
            </tr>
            <tr>

                <td>
                    <input type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                </td>
            </tr>
            <tr>

                <td>
                    <input type="file" id="edu_cert" name="edu_cert[]" accept="image/*, application/pdf" />
                </td>
            </tr>
        </table>
        <button type="submit"> Submit</button>
    </form>
</body>

</html>

<?php
print_r($_FILES['edu_cert']);
$certLocs = array();
$certTmpPath = array();

foreach ($_FILES['edu_cert']['name'] as $name) {
    $certExt = explode('.', $name);
    $certActualExt = strtolower(end($certExt));
    $certNewName = uniqid('cert_', true) . "." . $certActualExt;
    $certLoc = 'uploads/' . $certNewName;
    array_push($certLocs, $certLoc);
}
foreach ($_FILES['edu_cert']['tmp_name'] as $i) {
    array_push($certTmpPath, $i);
}
for ($x = 0; $x < count($certLocs); $x++) {
    move_uploaded_file($certTmpPath[$x], $certLocs[$x]);
}
print_r(json_encode($certLocs));


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // foreach ($cert as $_FILES['edu_cert']) {
    //     if (isset($cert['name']) && $cert['name'] !== "") {
    //         $certName = $cert['name'];
    //         $certExt = explode('.', $certName);
    //         $certActualExt = strtolower(end($certExt));
    //         $certNewName = uniqid('cert_', true) . "." . $certActualExt;
    //         $certLoc = 'uploads/' . $certNewName;
    //         move_uploaded_file($cert['tmp_name'], $certLoc);
    //         array_push($array_cert, $certLoc);
    //     }
    // }
    // $enc_edu_cert = json_encode($array_cert);
}
