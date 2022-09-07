<?php
session_start();
include 'database_connection.php';
$logout = "";
$statusMsg = "";


if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}
if (!$_SESSION) {
    header("Location: http://localhost/project/phone/login.php");
    exit();
}
// add
if (isset($_POST['submit'])) {

    $targetDir = "uploads/";
    $allowTypes = array('jpg', 'png', 'jpeg');
    $a = array();
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames) && $_POST['model'] && $_POST['mobile'] && $_POST['locations'] && $_POST['brand'] && $_POST['ram'] && $_POST['price'] && $_POST['fCamera'] && $_POST['bCamera'] && $_POST['description']) {
        foreach ($fileNames as $key => $val) {
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    $insertValuesSQL .= "$fileName";
                    array_push($a, $fileName);
                }
            }
        }


        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $ram = $_POST['ram'];
            $price = $_POST['price'];
            $fCamera = $_POST['fCamera'];
            $bCamera = $_POST['bCamera'];
            $description = $_POST['description'];
            $mobile = $_POST['mobile'];
            $locations = $_POST['locations'];
            $sql = "INSERT INTO addlist (brand, model, ram, price, fcamera, bcamera, image1, image2, image3, discription, mobile, locations) VALUES ('$brand', '$model', '$ram', '$price', '$fCamera', '$bCamera', '$a[0]', '$a[1]', '$a[2]', '$description', '$mobile', '$locations')";

            if ($conn->query($sql) === TRUE) {
                header("Location: http://localhost/project/phone/addlist.php");
                exit();
            }
            if ($insert) {
                $statusMsg = "File are successfuly upload" . $errorMsg;
            } else {
                $statusMsg = "Sory Upload Error";
            }
        } else {
            $statusMsg = "Upload Faild";
        }
    } else {
        $statusMsg = "All file requred";
    }
}
// add
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/addlist.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
    <style>
        .form1 {
            display: inline;
        }

        .logout {
            width: 80px;
            border-radius: 50px;
        }

        .profile {
            width: 85%;
            margin-left: 100px;
            margin-top: 70px;
            background-color: blue;
            padding: 30px;
            align-items: center;
            text-align: center;
            color: white;
        }

        .profile a {
            margin: 200px;
            color: white;

        }
        .logout {
            width: 80px;
            padding: 4px;
            border-style: none;
            border-radius: 50px;
            background-color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div>
        <!-- nav -->
        <div class="nav">
            <div class="fPart">
                <img src="image/phonelogo.png" alt="" style="width: 100px;">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <?php
                if ($_SESSION) {
                    echo "<form method='POST' class='form1'>";
                    echo "<button class='logout section2' name='logout'>Logout</button>";
                    echo "<a href='profile.php' class='section2'>" . $_SESSION['name'] . "</a>";
                    echo "</form>";
                } else {
                    echo "<a href='register.php' class='section2'>" . "Register" . "</a>";
                    echo "<a href='login.php' class='section2'>" . "Login" . "</a>";
                }
                ?>
            </div>
        </div>
        <div class="profile">
            <a href="profile.php">About</a>
            <a href="addlist.php">Add list</a>
        </div>
        <div>
            <div class="addlist">
                <?php echo $statusMsg; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Brand :</label>
                    <select name="brand" id="1">
                        <option value="" id="1">Select Brand</option>
                        <option value="samsung" id="1">samsung</option>
                        <option value="iphone" id="1">iphone</option>
                        <option value="redmi" id="1">redmi</option>
                        <option value="pixel" id="1">pixel</option>
                    </select><br><br>
                    <label for="">Model :</label>
                    <input name="model" type="text"><br><br>
                    <label for="">Ram :</label>
                    <select name="ram" id="2">
                        <option value="">Select Ram</option>
                        <option value="2" id="2">2</option>
                        <option value="4" id="2">4</option>
                        <option value="6" id="2">6</option>
                        <option value="8" id="2">8</option>
                    </select><br><br>
                    <label for="">Price :</label>
                    <input name="price" type="number"><br><br>
                    <label for="">Front camera:</label>
                    <input name="fCamera" type="number"><br><br>
                    <label for="">Back camera:</label>
                    <input name="bCamera" type="number"><br><br>
                    <label for="">Image :</label>
                    <input type="file" name="files[]" multiple><br><br>
                    <label for="">Discription :</label>
                    <textarea name="description" id="" cols="60" rows="10"></textarea><br><br>
                    <label for="">Mobile :</label>
                    <input name="mobile" type="number"><br><br>
                    <label for="">Location :</label>
                    <textarea name="locations" id="" cols="60" rows="10"></textarea><br><br>
                    <input type="submit" name="submit">
                </form>
            </div>
        </div>
        <div class="footer" style="margin-top: 100px;">
            <a href="about.php" class="footer-content">About</a>
            <a href="contact.php" class="footer-content">Contact</a>
            <a href="#" class="footer-content">F&Q</a>
            <br>
            <br>
            <p style="margin: 10px 100px 0px 100px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est molestias architecto eum repellat! In, nemo ad soluta expedita repudiandae harum alias aliquid eius velit dolore sit, nam quos inventore incidunt quis facilis rerum quibusdam veniam excepturi nulla illo necessitatibus. Iure aut accusantium voluptas impedit non quasi culpa vitae. Aspernatur, vero.</p>
            <br>
            <br>

            <p>Copyright &copy; 2022</p>

        </div>
    </div>
</body>

</html>