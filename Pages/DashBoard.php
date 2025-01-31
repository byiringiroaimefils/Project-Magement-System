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
    $borderMess='Low Product';
}elseif($product >= 6 && $product <= 15){
    $borderMess='Enough Product';
}else{
    $borderMess='Very Enough Product';

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
        .account h5{
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
                        <h2 style="color:  rgb(7, 7, 66);">Saint  Anne</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()"  id="Hidden">Cross</button>
                        <ul>
                            <li><img src="../Resources//dashboard.png" alt="" class="icon"><a href=".//DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources//product.png" alt="" class="icon"><a href="./Products.php">Products</a></li>
                            <li><img src="../Resources//product.png" alt="" class="icon"><a href="./stockIn.php">stockIn</a></li>
                            <li><img src="../Resources//out-of-stock.png" alt="" class="icon"><a href="./StockOut.php">StochOut</a></li>
                            <li><img src="../Resources//report.png" alt="" class="icon"><a href="./Report.php">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div style="display: flex;">
                <img src="../Resources//user.png" alt="" onclick="userFunction()" style="width: 35px; margin-right: 9px; cursor: pointer;">
                <img src="../Resources//hamburger-menu.png" alt="" onclick="Bar()" id="Hidden" style="width: 35px; cursor: pointer;">
                </div>
           
            </nav>
        </header>
        <div class="user" id="user">
            <h4><?php echo  $_SESSION["userName"]?></h4>
            <p> <a href="./Logout.php" >LogOut</a></p>

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
                            <h3>CURRENT TIME</h3>
                            <h5 class="Date" id="time"></h5>
                        </div>
                        <div class="border">
                            <div>
                                <h3><?php echo $borderMess?></h3>
                            </div>
                            <div class="Low">
                                <p><?php echo $product?></p>
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
        <footer >
            &copy;2024 Stock Magement
        </footer>
    </div>


    <script src="../js//jquery-3.3.1.min.js"></script>
    <script src="../js//popper.min.js"></script>
    <script src="../js//bootstrap.min.js"></script>
    <script src="../js//rome.js"></script>
    <script src="../js//main.js"></script>
    <script src="../js/Functionality/js.js"></script>
</body>

</html>