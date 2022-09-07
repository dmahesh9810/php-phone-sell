<?php
session_start();
include 'database_connection.php';
$logout = "";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}
$brand = $_GET['brand'];
$price = $_GET['price'];
$search = $_GET['search'];
$result = "";

if ($brand && $price) {
    $result = $conn->query("SELECT * FROM addlist WHERE brand = '$brand' AND price <= '$price'");
} else if ($brand) {
    $result = $conn->query("SELECT * FROM addlist WHERE brand = '$brand'");
} else if ($price) {
    $result = $conn->query("SELECT * FROM addlist WHERE price = '$price'");
} else if ($search) {
    $result = $conn->query("SELECT * FROM addlist WHERE brand LIKE '$search%' OR model LIKE '$search%'");
} else {
    $result = $conn->query("SELECT * FROM addlist");
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

        .logout {
            width: 80px;
            padding: 4px;
            border-style: none;
            border-radius: 50px;
            background-color: white;
            cursor: pointer;
        }

        .product-ditails {
            margin-left: 800px;
            font-size: x-large;
            margin-top: 50px;
        }

        .s-img img {
            width: 100%;
            height: 90%;
        }

        .all-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            margin: 30px;
            width: 300px;
            height: 400px;
            background-color: rgb(217, 217, 217);
            overflow-y: hidden;
        }

        .card img {
            width: 100%;
            height: 300px;
        }

        .card-ditail {
            margin: 30px;
        }

        .card-ditail a {
            text-decoration: none;
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
        <div class="all-list">
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="card">
                        <a href="product.php?id=<?php echo $row['id'] ?>">
                            <img src="uploads/<?php echo $row['image1']; ?>" alt="">
                        </a>
                        <div class="card-ditail">
                            <a href="product.php?id=<?php echo $row['id'] ?>">
                                <label for="">Price : R.s <?php echo $row['price'] ?></label><br><br>
                                <label for="">Brand : <?php echo $row['brand'] ?></label>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="status error">Item(s) not found...</p>
            <?php } ?>
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