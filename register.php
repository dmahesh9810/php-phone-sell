<?php
session_start();
include 'database_connection.php';
$erorr = "";
$fNameErorr = "";
$lNameErorr = "";
$emailErorr = "";
$phoneErorr = "";
$passwordErorr = "";
$frist_name = "";
$last_name = "";
$email = "";
$phone_number = "";
$password = "";
$confirm_password = "";

if ($_SESSION) {
    header("Location: http://localhost/project/phone/index.php");
    exit();
}

if (isset($_POST['register'])) {

    $frist_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['c_password'];
    if ($frist_name) {
        if ($last_name) {
            if ($email) {
                $select = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");
                if (mysqli_num_rows($select)) {
                    $emailErorr = "This email address is already used!";
                } else {

                    if ($phone_number) {
                        if ($password) {
                            if ($password === $confirm_password) {
                                $newPass = md5($password);
                                $sql = "INSERT INTO register (frist_name, last_name, email, mobile, password, role) VALUES ('$frist_name', '$last_name', '$email', '$phone_number', '$newPass','user')";

                                if ($conn->query($sql) === TRUE) {
                                    header("Location: http://localhost/project/phone/login.php");
                                    exit();
                                } else {
                                    header("Location: http://localhost/project/phone/register.php");
                                }
                            } else {
                                $passwordErorr = "Password is incorrect";
                            }
                        } else {
                            $passwordErorr = "Password is Requred";
                        }
                    } else {
                        $phoneErorr = "Phone number is not valid";
                    }
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
$conn->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <div class="fPart">
            <img src="image/phonelogo.png" alt="" style="width: 100px;">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>

            <a href="register.php" class="section2">Register</a>
            <a href="login.php" class="section2">Login</a>
        </div>
    </div>
    <div class="register-form">
        <div class="form-content">
            <form action="" method="POST">
                <h2 for="">Register</h2><br><br>
                <h4 style="color: red;">
                    <?php

                    if ($fNameErorr) {
                        echo $fNameErorr;
                    }
                    ?>
                </h4>
                <label for="">First Name :</label>
                <input type="text" class="fName" name="f_name" value="<?php echo $frist_name ?>"><br><br>
                <h4 style="color: red;">
                    <?php

                    if ($lNameErorr) {
                        echo $lNameErorr;
                    }
                    ?>
                </h4>
                <label for="">Last Name :</label>
                <input type="text" class="lName" name="l_name" value="<?php echo $last_name ?>"><br><br>
                <h4 style="color: red;">
                    <?php

                    if ($emailErorr) {
                        echo $emailErorr;
                    }
                    ?>
                </h4>
                <label for="">E-mail :</label>
                <input type="email" class="email" name="email" value="<?php echo $email ?>"><br><br>
                <h4 style="color: red;">
                    <?php

                    if ($phoneErorr) {
                        echo $phoneErorr;
                    }
                    ?>
                </h4>
                <label for="">Mobile :</label>
                <input type="number" class="mobile" name="mobile" value="<?php echo $phone_number ?>"><br><br>
                <h4 style="color: red;">
                    <?php

                    if ($passwordErorr) {
                        echo $passwordErorr;
                    }
                    ?>
                </h4>
                <label for="">Password :</label>
                <input type="password" class="password" name="password"><br><br>
                <label for="">Confirm password :</label>
                <input type="password" class="confirm" name="c_password"><br><br>
                <button class="btn" name="register">Register</button>
            </form>
        </div>

        <div class="footer">
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