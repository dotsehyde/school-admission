<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="header">
        <div>
            <a href="./index.php"><span class="iconify" data-icon="eva:arrow-back-fill"></span> Go Back</a>
            <h1>Searched Enteries</h1>
        </div>
        <div class="sbox">
            <form action="./search.php" method="GET">
                <input type="search" placeholder="Search..." class="texrbox" name="search" id="sbox" value=<?php echo $_GET['s']; ?>>
            </form>
        </div>
    </div>
    <hr />
    <section>
        <table>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Actions</>
            </tr>
            <?php
            require '../../config.php';
            $query = $_GET['s'];
            $sql = "SELECT * FROM entries WHERE surname LIKE '%$query%' OR first_name LIKE '%$query%'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    // echo "Name: " . $row['name'];
                    echo '
            <tr>
                <td>
                <img src="../../' . $row['picture'] . '" width="50" height="50"/>
                </td>
                <td>
                <p>' . $row['surname'] . ' ' . $row['first_name'] . '</p>
                </td>
                <td>
                <p>' . $row['phone'] . '</p>
                </td>
                <td>
                <p>' . $row['email'] . '</p>
                </td>
                <td>
                <div class="action">
                <button class="view" onclick=""><span class="iconify" data-icon="carbon:data-view-alt"></span>View</a>
                <button class="del" onclick="deleteEntry(' . $row['id'] . ')"><span class="iconify" data-icon="fluent:delete-16-regular"></span>Delete</a>
                </div>
                </td>
            </tr>
            ';
                }
            } else {
                echo '<div class="error">Oops! Nothing found</div>';
            }
            mysqli_close($conn);
            ?>
        </table>

    </section>
    <script src="./js/main.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</body>

</html>