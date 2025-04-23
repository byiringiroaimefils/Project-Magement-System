<?php
include('Connection.php');
session_start();



if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}


$sql = "SELECT * FROM `product`";
$run = mysqli_query($conn, $sql);
$product = mysqli_num_rows($run);



if ($product >= 0 && $product <= 5) {
    $borderMess = 'Low Product';
} elseif ($product >= 6 && $product <= 15) {
    $borderMess = 'Enough Product';
} else {
    $borderMess = 'Very Enough Product';

}


$sql = "SELECT * FROM `stockout`";
$run = mysqli_query($conn, $sql);
$rowout = mysqli_num_rows($run);


$sql = "SELECT * FROM `stockin`";
$run = mysqli_query($conn, $sql);
$rowin = mysqli_num_rows($run);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saint_Anne</title>
    <link rel="stylesheet" href="../Style//style.css">
    <link rel="stylesheet" href="../Style//StyeRes.css">

    <link rel="stylesheet" href="../Style/css/style.css">
    <link rel="stylesheet" href="../Style/css/rome.css">
    <style>
        .account h5 {
            background: #00001a;
            color: white;
            padding: 9px;
            width: 50%;
            border-radius: 50%;
            margin-left: 12px;
            font-weight: bolder;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="continer">
        <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Saint Anne</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>
                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a
                                    href="./DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a
                                    href="./Products.php">Products</a>
                            </li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a
                                    href="./stockIn.php">StockIn</a>
                            </li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a
                                    href="Stockout.php">StochOut</a>
                            </li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="Report.php">Report</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div style="display: flex;">
                    <h4 style="margin-top: 10px; color:gray;"><?php echo htmlspecialchars($_SESSION["userName"]) ?></h4>
                    <img src="../Resources//dropdown.png" alt="" onclick="userFunction()"
                        style="width: 20px; margin-right: 12px; margin-top: 10px; cursor: pointer;">
                </div>
            </nav>
        </header>

        <!-- User dropdown -->

        <div class="user" id="user">
            <h4><?php echo $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>
        </div>
        <div class="body">
            <div class="flex">
                <div class="div2">
                    <div class="Products">
                        <h2>STOCK IN PRODUCTS</h2>
                        <span><?php echo $rowin; ?></span>
                    </div>
                    <div class="Quantity">
                        <h2>STOCK OUT PRODUCTS</h2>
                        <span><?php echo $rowout; ?></span>
                    </div>
                </div>
                <div class="div3">
                    <div class="flexborder">
                        <div class="border2">
                            <h3>Total Products</h3>
                            <!-- <p style="font-weight: bold; color: white;"><?php echo $product ?></p> -->
                            <h5 class="Date" id="time"></h5>
                        </div>
                        <div class="border">
                            <div>
                                <h3><?php echo $borderMess ?></h3>
                            </div>
                            <div>
                                <p style="font-weight: bold; color: white;"><?php echo $product ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="cont">
                        <h2>CALENDER</h2>
                        <form action="#">
                            <div class="col-md-12">
                                <div id="inline_cal"></div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div style="position: absolute; top: 92%; left:50%; transform: translate(-50%,-50%);">
            <footer>
                &copy; 2025 Stock Management System - Ecole Primaire Sainte Anne
            </footer>
        </div>

    </div>

    <!-- Bostrap for Handling Calender Function on DashBoard -->
    <script src="../js//jquery-3.3.1.min.js"></script>
    <script src="../js//popper.min.js"></script>
    <script src="../js//bootstrap.min.js"></script>
    <script src="../js//rome.js"></script>
    <script src="../js//main.js"></script>
    <script src="../js/Functionality/js.js"></script>
</body>

</html>