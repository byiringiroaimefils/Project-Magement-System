<?php
include('Connection.php');
session_start();

if (isset($_POST['StockIn'])) {
    $productName = $_POST['product'];
    $productQuantity = $_POST['Quantity'];
    $productprice = $_POST['price'];
    $productTotal_price = $_POST['Total_price'];

    $sqli = "INSERT INTO stockin_product VALUES ('','$productName',NOW(),'$productQuantity','$productprice','$productTotal_price')";
    $run = mysqli_query($conn, $sqli);
    // $row = mysqli_fetch_array($run);


    if ($run == true) {
        header('Location:/project%20magement%20system/Pages/Product.html');
    } else {
        echo 'Product Not Stock In';
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
                            <li><img src="/Resources/dashboard.png" alt="dashboard icon" class="icon"><a href="/index.html">DashBoard</a></li>
                            <li><img src="/Resources/product.png" alt=" product icon" class="icon"><a href="/Pages/Products.htm">Products</a></li>
                            <li><img src="/Resources/outstock (1).png" alt=" outstock icon" class="icon"><a href="/Pages/StochOut.html">StochOut</a></li>
                            <li><img src="/Resources/report.png" alt="report icon" class="icon"><a href="/Pages/Report.html">Report</a> </li>
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
            <button class="backbotton"> <a href="../Products.htm">Back</a> </button>
            <section>
                <form action="#" method="post">
                    <label for="" style="font-weight: bold;">Name </label> <br><br>
                    <input type="text" placeholder="Name of product" name="product" required><br><br>

                    <label for="" style="font-weight: bold;">Quntity</label><br><br>
                    <input type="text" placeholder="Kilograms" name="Quantity" required><br><br>


                    <label for="" style="font-weight: bold;">Pice</label><br><br>
                    <input type="number" placeholder="0.00FRw" name="price" required><br><br>


                    <label for="" style="font-weight: bold;" name="">Total Pice</label><br><br>
                    <input type="number" placeholder="0.00FRw" name="Total_price"><br><br>
                    <button name="StockIn">Add product </button>

                </form>
            </section>
        </div>
    </div>
</body>

</html>