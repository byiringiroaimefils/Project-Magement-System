<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}




if (isset($_POST['StockIn'])) {
    $productName = $_POST['product'];

    $sqli = "INSERT INTO product VALUES ('','$productName')";
    $run = mysqli_query($conn, $sqli);

    if ($run == true) {
        header('Location:/Project-Magement-System/Pages/Products.php');
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
        <div class="Stockin" style="margin-top: 50px;">
            <section>
                <form action="#" method="post" style="margin-bottom: 15%;">
                    <label for="" style="font-weight: bold;">Name of Product</label> <br><br>
                    <input type="text" placeholder="Name of product" name="product" required><br><br>

                    <button name="StockIn" >Add product </button> <br><br>
                    <button class="StockIn"> <a href="../Products.php" style="text-decoration: none; color: white;">Back</a> </button>

                </form>
            </section>
        </div>
    </div>
</body>

</html>