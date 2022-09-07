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
$frist_name = "";
$last_name = "";
$email = "";
$phone_number = "";
$result = $conn->query("SELECT * FROM register");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $frist_name = $row['frist_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone_number = $row['mobile'];
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

                <label for="">Fist Name :</label>
                <label for=""><?php echo $frist_name ?></label><br><br>
                <label for="">Last Name :</label>
                <label for=""><?php echo $last_name ?></label><br><br>
                <label for="">Email :</label>
                <label for=""><?php echo $email ?></label><br><br>
                <label for="">Mobile :</label>
                <label for=""><?php echo $phone_number ?></label><br><br>
                <a href="update.php" class="btn"> Update</a>
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