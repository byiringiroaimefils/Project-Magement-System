<?php
include('../Connection.php');
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}
$id = $_GET["id"];

$sqli = "SELECT * FROM product  INNER JOIN StockIn  ON StockIn.ProductId = Product.ProductId  WHERE StockInId='$id'";
$run = mysqli_query($conn, $sqli);
$row = mysqli_num_rows($run);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Form/stockIn.css">
    <link rel="stylesheet" href="/Style/style.css">
    <link rel="stylesheet" href="/Style/StyeRes.css">
    <script src="../Functionality//js.js" defer></script>

    <style>
        body {
            overflow: hidden;
        }

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
    <div class="Stockin" style="margin-top: 50px;">
        <section>

            <?php
            if ($row > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
                    ?>


                    <form action="#" method="post" style="margin-bottom: 15%;">
                        <label for="" style="font-weight: bold;">Name </label> <br><br>
                        <input type="text" placeholder="Name of product" name="product" required
                            value=" <?php echo $row['ProductName'] ?>"><br><br>

                        <label for="" style="font-weight: bold;">Quntity</label><br><br>
                        <input type="text" placeholder="Kilograms" name="Quantity" required
                            value="<?php echo $row['ProductQuantity'] ?>"><br><br>


                        <label for="" style="font-weight: bold;">Pice</label><br><br>
                        <input type="text" placeholder="0.00FRw" name="price" required
                            value="<?php echo $row['Price'] ?>"><br><br>
                        <label for="" style="font-weight: bold;" name="">Total Pice</label><br><br>
                        <input type="text" placeholder="0.00FRw" name="Total_price"
                            value="<?php echo $row['TotalPrice'] ?>"><br><br>
                        <button name="Update">Update</button>
                        <button class="Update"> <a href="/ProjectMatem/Pages/Stockin.php">Back</a> </button>


                    </form>
                </section>
                <?php
                }
            }

            ?>
    </div>
    </div>
</body>

</html>


<?php
include("../Connection.php");
$id = $_GET['id'];
if (isset($_POST["Update"])) {
    $productQuantity = $_POST['Quantity'];
    $productprice = $_POST['price'];
    $productTotal_price = $productQuantity * $productprice;

    $sqli = "UPDATE stockin SET ProductQuantity =' $productQuantity',Price ='$productprice',TotalPrice ='$productTotal_price' WHERE StockInId='$id';";
    $run = mysqli_query($conn, $sqli);


    if ($run == true) {
        echo "<script>alert('Product Updated ✔')</script>";
        // header("Location:/project%20magement%20system/Pages/Products.php");
    } else {
        echo "<script>alert('Product Not Updated ')<script/>";
        // echo 'not done';
    }
}

?>