<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}

$id = $_GET["id"];
$sql_product = "SELECT * FROM product WHERE productId='$id'";
$run_product = mysqli_query($conn, $sql_product);
$row_product = mysqli_fetch_assoc($run_product);




if (isset($_POST['StockIn'])) {
    $productName = $_POST['product'];
    $productQuantity = $_POST['Quantity'];
    $productprice = $_POST['price'];
    $productTotal_price = $productQuantity * $productprice;

    $sqli = "INSERT INTO stockin VALUES ('',(SELECT ProductId FROM product WHERE ProductName = '$productName'),'$productQuantity',NOW(),'$productprice','$productTotal_price')";
    $run = mysqli_query($conn, $sqli);



    if ($run == true) {
        header('Location:/project%20magement%20system/Pages/Products.php');
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

        <!-- <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>
                        <ul>
                            <li><img src="/Resources//dashboard.png" class="icon"><a href="../DashBoard.php">DashBoard</a></li>
                            <li><img src="/Resources/./product.png"  class="icon"><a href="../Products.php">Products</a></li>
                            <li><img src="/Resources//product.png"  class="icon"><a href="../stockIn.php">StockIn</a></li>
                            <li><img src="/Resources//outstock (1).png" class="icon"><a href="../StockOut.php">StochOut</a></li>
                            <li><img src="/Resources//report.png" class="icon"><a href="../Report.php">Report</a> </li>
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
            <h4><?php echo  $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>

        </div><br> -->
        <div class="Stockin" style="margin-top: 50px;">
            <button class="backbotton"> <a href="../Products.php">Back</a> </button>
            <section>
                <form action="#" method="post" style="margin-bottom: 15%;">
                    <label for="" style="font-weight: bold;">Name </label> <br><br>
                    <input type="text" placeholder="Name of product" name="product" value="<?php echo  $row_product['ProductName'] ?>" required><br><br>

                    <label for="" style="font-weight: bold;">Quntity</label><br><br>
                    <input type="text" placeholder="Kilograms" name="Quantity" required><br><br>


                    <label for="" style="font-weight: bold;">Pice</label><br><br>
                    <input type="text" placeholder="0.00FRw" name="price" required><br><br><br>
                    <!-- <label for="" style="font-weight: bold;" name="">Total Pice</label><br><br>
                    <input type="number" placeholder="0.00FRw" name="Total_price"><br><br> -->
                    <button name="StockIn" style="border-radius: 5px;">Add product </button>

                </form>
            </section>
        </div>
    </div>
</body>

</html>