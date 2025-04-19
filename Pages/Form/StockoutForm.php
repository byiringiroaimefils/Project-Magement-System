<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}



if (isset($_POST['StockOut'])) {
    $product_id = $_POST['productid'];
    $productName = $_POST['product'];
    $available = $_POST['available'];
    $productQuantity = $_POST['Quantity'];
    $productprice = $_POST['price'];
    $productTotal_price = $productprice * $productQuantity  ;
    $remaining_quantity = $available - $productQuantity;


    $sqli = "INSERT INTO stockout (ProductId, ProductQuantity,Price,TotalPrice) VALUES ($product_id, $productQuantity, $productprice,$productTotal_price)";
    $run = mysqli_query($conn, $sqli);

    if ($run) {
 
        $updateQuery = "UPDATE stockin SET ProductQuantity = $remaining_quantity WHERE ProductId = $product_id";
        $updateRun = mysqli_query($conn, $updateQuery);

        if ($updateRun) {
            header('Location:/Project-Magement-System/Pages/StockOut.php');
        } else {
            echo "Stock updated failed!";
        }
    } else {
        echo 'Product Not Stock out';
    }
}



$StockInId = $_GET['id'];
$query = mysqli_query($conn,"SELECT product.ProductId,product.ProductName, stockin.ProductQuantity, stockin.price FROM product,stockin where product.ProductId = stockin.ProductId and stockin.StockinId='$StockInId'");

while($products = mysqli_fetch_assoc($query)){

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
                        <input type="hidden" name="productid" value="<?php echo $products['ProductId']; ?>">
                        <label for="" style="font-weight: bold;">Name </label> <br><br>
                        <input type="text" placeholder="Name of product" name="product" value="<?php echo $products['ProductName'] ?>"><br><br>
                        <label for="" style="font-weight: bold;">Available Quantity</label><br><br>
                        <input type="text" placeholder="Kilograms" name="available" value="<?php echo $products['ProductQuantity'] ?>"><br><br>
                        <label for="" style="font-weight: bold;">Quantity</label><br><br>
                        <input type="text" placeholder="Kilograms" name="Quantity"><br>
                        <label for="" style="font-weight: bold;">Pice</label><br><br>
                        <input type="text" placeholder="0.00FRw" name="price" required><br><br><br>
                        <button name="StockOut" style="border-radius: 5px;"> StockOut</button> <br><br>
                        <button class="StockOut"> <a href="../StockOut.php" style="text-decoration: none; color: white;" >Cancel</a> </button>
                      
                    </form>
                </section>
            </div>
    </div>
</body>
<?php } ?>
</html>