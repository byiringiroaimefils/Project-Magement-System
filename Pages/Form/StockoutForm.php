<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}

if (isset($_POST['StockOut'])) {
    $productName = $_POST['product'];
    $productQuantity = $_POST['Quantity'];

    $sqli = "INSERT INTO stockout VALUES ('',(SELECT ProductId FROM Product WHERE ProductName = '$productName'),'$productQuantity',NOW())";
    $run = mysqli_query($conn, $sqli);



    if ($run == true) {
        header('Location:/Project-Magement-System/Pages/StockOut.php');
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
            <div class="Stockin" style="margin-top: 50px;">
                <section style="margin-bottom: 200px;">
                    <form action="#" method="post" style="margin-bottom: 15%;">
                        <label for="" style="font-weight: bold;">Name </label> <br><br>
                        <input type="text" placeholder="Name of product" name="product"><br><br>
                        <label for="" style="font-weight: bold;">Quantity</label><br><br>
                        <input type="text" placeholder="Kilograms" name="Quantity"><br><br>
                        <button name="StockOut" style="border-radius: 5px;"> StockOut</button>
                        <button class="StockOut"> <a href="../StockOut.php">Cancel</a> </button>
                        
                    </form>
                </section>
            </div>
    </div>
</body>

</html>