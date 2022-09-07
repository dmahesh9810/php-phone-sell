<?php
session_start();
include 'database_connection.php';
$logout = "";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/project/phone/index.php");
    exit();
}

$result = $conn->query("SELECT * FROM addlist ORDER BY id DESC");

if (isset($_POST['filter_btn'])) {
    $brand = $_POST['brand'];
    $min_price = $_POST['min_price'];
    $search = $_POST['search_val'];
    header("Location: http://localhost/project/phone/search.php?brand=" . $brand . "&ram=" . $ram . "&price=" . $min_price . "&search=" . $search);
    exit();
}
if (isset($_POST['search_btn'])) {
    $brand = $_POST['brand'];
    $min_price = $_POST['min_price'];
    $search = $_POST['search_val'];
    header("Location: http://localhost/project/phone/search.php?search=" . $search . "&ram=" . $ram . "&price=" . $min_price . "&brand=" . $brand);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
    </style>
</head>

<body>
    <!-- main -->
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
        <!-- carosal -->
        <div class="carosal">
            <img src="image/phone.webp" alt="">
        </div>
        <div>
            <!-- select section -->
            <div class="select-section">
                <form action="" method="POST">
                    <label for="">Brand</label>
                    <select name="brand" id="brand" class="slectBox">
                        <option value="" id="brand">Select Brand</option>
                        <option value="samsung" id="brand">samsung</option>
                        <option value="iphone" id="brand">iphone</option>
                        <option value="redmi" id="brand">redmi</option>
                        <option value="pixel" id="brand">pixel</option>
                    </select>
                    <label for="">Min price</label>
                    <input type="number" class="min-price" name="min_price">
                    <input type="submit" value="Filter" class="filter-btn" name="filter_btn">
                    <input type="text" class="search" name="search_val">
                    <input type="submit" value="search" class="search-btn" name="search_btn">
                </form>
            </div>
            <!-- list section -->
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