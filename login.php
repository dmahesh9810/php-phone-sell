<?php
session_start();
include 'database_connection.php';
$error = "";
$email = "";
$password = "";
if ($_SESSION) {
    header("Location: http://localhost/project/phone/index.php");
    exit();
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email) {
        if ($password) {
            $newPassword = md5($password);
            $sql = "SELECT * FROM register WHERE email = '$email' and password = '$newPassword'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $_SESSION["name"] = $row["frist_name"];
                $_SESSION["role "] = $row["role"];
                if ($_SESSION["role "] === "admin") {
                    header("Location: http://localhost/project/phone/index.php");
                    exit();
                } else {
                    header("Location: http://localhost/project/phone/index.php");
                    exit();
                }
            } else {
                $error = "Login failed. Invalid username or password.";
            }
        } else {
            $error = "Password is Requred";
        }
    } else {
        $error = "Email is Requred";
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
    <link rel="stylesheet" href="css/login.css">
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
                <h2 for="">Login</h2><br><br>
                <h4 style="color: red;">

                    <?php
                    echo $error;
                    ?>
                </h4>
                <label for="">E-mail :</label>
                <input type="text" class="email" name="email"><br><br>
                <label for="">Password :</label>
                <input type="password" class="password" name="password"><br><br>
                <button class="btn" name="login">Login</button>
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