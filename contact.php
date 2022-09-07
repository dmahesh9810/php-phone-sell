<?php
session_start();
include 'database_connection.php';
$logout = "";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
    <style>
        .form1 {
            display: inline;
        }
        .contact {
            background-image: url("image/login.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 600px;
            color: white
        }

        .contact p {
            margin: 100px;
            text-align: center;
        }

        .contact h2 {
            margin: 100px;
            text-align: center;
        }

        .contact_list {
            margin-left: 650px;
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
        <div class="contact">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, cum illo distinctio delectus atque quidem reprehenderit sed quas eaque fugit nobis vitae minima cumque. Impedit quo quibusdam natus voluptatem rem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente odio placeat debitis soluta atque aut officia exercitationem. Saepe in alias distinctio voluptate magni dolorem officiis nostrum obcaecati dolore reiciendis repudiandae numquam!</p>
            <div class="contact_list">
                <h4>Company : software</h4>
                <h4>Mobile : 0773232333</h4>
                <h4>E-mail : office@gmail.com</h4>
                <h4>Address : 245/2 jaya mawatha,Colombo 7</h4>
            </div>
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