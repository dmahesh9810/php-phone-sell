<?php
session_start();
include 'database_connection.php';
$logout = "";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * FROM addlist WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/product.css">
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
        <div>
            <div class="image-section">
                <div class="s-img img1" style="z-index: 3;"><img src="uploads/<?php echo $row['image1']; ?>" /></div>
                <div class="s-img img2" style="z-index: 1;"><img src="uploads/<?php echo $row['image2']; ?>" /></div>
                <div class="s-img img3" style="z-index: 2;"><img src="uploads/<?php echo $row['image3']; ?>" /></div>
            </div>
            <button class="next" style="z-index: 6;">></button>
            <button class="prev" style="z-index: 7;">
                < </button>
                    <div class="product-ditails">
                        <h3 style="margin-top: 20px;">Details</h3>

                        <label for="">Brand :- </label><label for=""><?php echo $row['brand']; ?></label><br>
                        <label for="">Model :- </label><label for=""><?php echo $row['model']; ?></label><br>
                        <label for="">Ram :- </label><label for=""><?php echo $row['ram']; ?></label><br>
                        <label for="">Front camera :- </label><label for=""><?php echo $row['fcamera']; ?> MP</label><br>
                        <label for="">Back Camera :- </label><label for=""><?php echo $row['bcamera']; ?> MP</label><br>
                        <label for="">Discription :- </label><label for=""><?php echo $row['discription']; ?></label><br>

                        <h3 style="margin-top: 20px;">Contact</h3>
                        <label for="">Mobile :- </label><label for=""><?php echo $row['mobile']; ?></label><br>
                        <label for="">Address :- </label><label for=""><?php echo $row['locations']; ?></label><br>
                        <h3 style="margin-top: 20px;">Price</h3>
                        <h4 for="" style="margin-top: 20px;">R.s 15000</h4>

                    </div>

        </div>
    </div>
    <div class="footer" style="margin-top: 300px;">
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
    <script src="javascript/productScript.js"></script>

</body>

</html>