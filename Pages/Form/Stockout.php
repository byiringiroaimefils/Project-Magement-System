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
     header('Location:/project%20magement%20system/Pages/StockOut.html');
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
                            <li><img src="/Resources/dashboard.png" alt="" class="icon"><a href="/index.html">DashBoard</a></li>
                            <li><img src="/Resources/product.png" alt="" class="icon"><a href="/Pages/Products.htm">Products</a></li>
                            <li><img src="/Resources/out-of-stock.png" alt="" class="icon"><a href="/Pages/StochOut.html">StochOut</a></li>
                            <li><img src="/Resources/report.png" alt="" class="icon"><a href="/Pages/Report.html">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                  
                    <a href="">LogOut</a>
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