<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}

if (isset($_POST['StockOut'])) {
    $productName = $_POST['product'];
    $productQuantity = $_POST['Quantity'];

    $sqli = "INSERT INTO stockout VALUES ('',(SELECT ProductId FROM Product WHERE ProductName = '$productName'),'$productQuantity',NOW())";
    $run = mysqli_query($conn, $sqli);



    if ($run == true) {
        header('Location:/project%20magement%20system/Pages/StockOut.php');
    } else {
        echo 'Product Not Stock out';
    }
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stockIn.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./StyeRes.css">
    <style>
        .account h5 {
            background: black;
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
    <div class="heder">

        <header>
            <!-- <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>
                        <ul>
                            <li><img src="//Resources//dashboard.png" alt="" class="icon"><a href="../DashBoard.php">DashBoard</a></li>
                            <li><img src="/Resources/./product.png" alt="" class="icon"><a href="../Products.php">Products</a></li>
                            <li><img src="/Resources//product.png" alt="" class="icon"><a href="../stockIn.php">StockIn</a></li>
                            <li><img src="//Resources//out-of-stock.png" alt="" class="icon"><a href="//StochOut.php">StochOut</a></li>
                            <li><img src="//Resources//report.png" alt="" class="icon"><a href="//Report.php">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div style="display: flex;">
                    <img src="../Resources//user.png" alt="" onclick="userFunction()" style="width: 35px; margin-right: 9px; cursor: pointer;">
                    <img src="../Resources//hamburger-menu.png" alt="" onclick="Bar()" id="Hidden" style="width: 35px; cursor: pointer;">
                </div> -->
                <!-- <div class="account">
                    <div style="text-align: center;margin-right: 50px;display: flex; gap: 2px;">
                        <h5> <?php echo substr($_SESSION["userName"], 0, 1) ?></h5>
                        <button style=" margin-left: 8px ; border: none; background-color: transparent;">
                            <a href="../Logout.php">LogOut</a>
                        </button>
                    </div>
                </div> -->
            <!-- </nav>
        </header>
        <div class="user" id="user">
            <h4><?php echo  $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>

        </div><br> -->
        <div class="Stockin" style="margin-top: 50px;">
            <button class="backbotton"> <a href="../StockOut.php">Back</a> </button>
            <section style="margin-bottom: 200px;">
                <form action="#" method="post" style="margin-bottom: 15%;">
                    <label for="" style="font-weight: bold;">Name </label> <br><br>
                    <input type="text" placeholder="Name of product" name="product"><br><br>
                    <label for="" style="font-weight: bold;">Quantity</label><br><br>
                    <input type="text" placeholder="Kilograms" name="Quantity"><br><br>
                    <button name="StockOut" style="border-radius: 5px;"> StockOut</button>

                </form>
            </section>
        </div>
    </div>
</body>

</html>