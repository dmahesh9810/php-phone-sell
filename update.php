<?php
session_start();
include 'database_connection.php';
$logout = "";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}
if (!$_SESSION) {
    header("Location: http://localhost/project/phone/login.php");
    exit();
}
$id = "";
$ss = "";
$frist_name = "";
$last_name = "";
$email = "";
$phone_number = "";

$fNameErorr = "";
$lNameErorr = "";
$emailErorr = "";
$phoneErorr = "";

$result = $conn->query("SELECT * FROM register");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $frist_name = $row['frist_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone_number = $row['mobile'];
    }
}
if (isset($_POST['update'])) {
    $frist_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['mobile'];

    if ($frist_name) {
        if ($last_name) {
            if ($email) {
                if ($phone_number) {
                    $sql = "UPDATE register SET  
                                frist_name = '$frist_name',
                                last_name = '$last_name',
                                email = '$email',
                                mobile = '$phone_number'
                                WHERE id = '$id'
                                ";
                    $conn->query($sql) === TRUE;
                    header("Location: http://localhost/project/phone/profile.php");
                    exit();

                    $conn->close();
                } else {
                    $phoneErorr = "Phone number is not valid";
                }
            } else {
                $emailErorr = "Email is not valid";
            }
        } else {
            $lNameErorr = "Last Name Requred";
        }
    } else {
        $fNameErorr = "First Name Requred";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/update.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
    <style>
        .form1 {
            display: inline;
        }

        .logout {
            width: 80px;
            padding: 4px;
            border-style: none;
            border-radius: 50px;
            background-color: white;
            cursor: pointer;
        }

        .profile {
            width: 85%;
            margin-left: 100px;
            margin-top: 70px;
            background-color: blue;
            padding: 30px;
            text-align: center;
            color: white;
        }

        .profile a {
            margin: 200px;
            color: white;

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
        <div class="profile_ditails">
            <form action="" method="POST">

                <label for="">Fist Name :</label>
                <input type="text" class="box1" name="f_name" value="<?php echo $frist_name ?>"><label for="" style="color: red;"><?php echo $fNameErorr ?></label><br>
                <label for="">Last Name :</label>
                <input type="text" class="box2" name="l_name" value="<?php echo $last_name ?>"><label for="" style="color: red;"><?php echo $lNameErorr ?></label><br>
                <label for="">Email :</label>
                <input type="text" class="box3" name="email" value="<?php echo $email ?>"><label for="" style="color: red;"><?php echo $emailErorr ?></label><br>
                <label for="">Mobile :</label>
                <input type="text" class="box4" name="mobile" value="<?php echo $phone_number ?>"><label for="" style="color: red;"><?php echo $phoneErorr ?></label><br>
                <button class="btn" name="update">Update</button><br><br>
            </form>
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