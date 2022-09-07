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

        .about {
            background-image: url("image/login.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 600px;
            color: white;
        }

        .about p {
            margin: 100px;
            text-align: center;
        }

        .about h2 {
            margin: 100px;
            text-align: center;
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
        <div class="about">
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, cum illo distinctio delectus atque quidem reprehenderit sed quas eaque fugit nobis vitae minima cumque. Impedit quo quibusdam natus voluptatem rem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente odio placeat debitis soluta atque aut officia exercitationem. Saepe in alias distinctio voluptate magni dolorem officiis nostrum obcaecati dolore reiciendis repudiandae numquam, omnis illum molestias consequuntur atque ratione recusandae ut eum beatae laboriosam voluptatibus eius. Quam unde aliquam, ratione repudiandae maxime, sapiente iure magnam eius cum, aperiam tenetur cumque sed dolor nemo illo eligendi dicta iusto consequuntur est quisquam vitae laudantium rem nam. Aliquam rem quis labore quaerat recusandae quibusdam ducimus et porro. Voluptate impedit voluptas ipsa dolorum nam ullam quae tempora saepe? Asperiores nam impedit perspiciatis libero animi quisquam neque aut quasi nulla, perferendis temporibus voluptate quod provident repellat dolor. Maiores, sed cum? Nulla suscipit aliquid distinctio non, aut exercitationem, culpa perferendis assumenda accusantium illo omnis commodi totam illum repellat magnam natus et sunt numquam nobis veritatis similique porro! Nihil soluta voluptas accusamus optio. Voluptatem commodi atque velit dicta laboriosam incidunt culpa odit sapiente iure, voluptas cumque quisquam molestiae debitis error! Repellat expedita illo consectetur excepturi! Quam excepturi amet quo ipsum harum veritatis accusamus laudantium, sapiente qui atque unde quidem recusandae. Labore, aliquam dolore. Commodi autem molestias assumenda eligendi quisquam aliquam consequatur corrupti dolores, excepturi architecto beatae optio nobis delectus hic omnis voluptatibus et dolore dicta vel eum illum expedita ullam? Officia molestiae pariatur nobis possimus deleniti odit, aut, omnis architecto optio tempore sed ab voluptate corrupti consequatur. Beatae incidunt earum enim aspernatur vero dolorum dolorem tempore ullam. Dolores, cupiditate dignissimos sequi nemo exercitationem rem maxime ut dolorem excepturi aut!</p>
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
</body>

</html>