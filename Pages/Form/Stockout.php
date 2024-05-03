<?php
include('Connection.php');
session_start();

if (isset($_POST['StockOut'])) {
    $productName = $_POST['product'];
    $productQuantity = $_POST['Quantity'];

    $sqli = "INSERT INTO stockout_product VALUES ('','$productName',NOW(),'$productQuantity')";
    $run = mysqli_query($conn, $sqli);
    // $row = mysqli_fetch_array($run);


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
</head>

<body>
    <div class="heder">

        <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link">
                        <ul>
                            <li><img src="/Resources/dashboard.png" alt="" class="icon"><a href="../DashBoard.php">DashBoard</a></li>
                            <li><img src="/Resources/product.png" alt="" class="icon"><a href="/Pages/Products.php">Products</a></li>
                            <li><img src="/Resources/out-of-stock.png" alt="" class="icon"><a href="/Pages/StochOut.php">StochOut</a></li>
                            <li><img src="/Resources/report.png" alt="" class="icon"><a href="/Pages/Report.php">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                    <div style="text-align: center;margin-right: 50px;">
                        <h5><?php echo  $_SESSION["userName"] ?></h5>
                        <a href="../Logout.php" style="font-size: small; margin-left: 8px;">LogOut</a>
                    </div>
                </div>
            </nav>
        </header> <br>
        <div class="Stockin">
            <button class="backbotton"> <a href="../StochOut.html">Back</a> </button>
            <section style="margin-bottom: 200px;">
                <form action="#" method="post">
                    <label for="" style="font-weight: bold;">Name </label> <br><br>
                    <input type="text" placeholder="Name of product" name="product"><br><br>
                    <label for="" style="font-weight: bold;">Quantity</label><br><br>
                    <input type="text" placeholder="Kilograms" name="Quantity"><br><br>

                    <button name="StockOut">StockOut</button>

                </form>
            </section>
        </div>
    </div>
</body>

</html>