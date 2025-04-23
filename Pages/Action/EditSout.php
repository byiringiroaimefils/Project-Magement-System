<?php
include('../Connection.php');
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}

$id = $_GET["id"];

// Fetch stockout product data
$sqli = "SELECT product.ProductId, product.ProductName, stockout.ProductQuantity, stockout.Price, stockout.TotalPrice 
         FROM product  
         INNER JOIN stockout ON stockout.ProductId = product.ProductId  
         WHERE StockOutId = '$id'";
$run = mysqli_query($conn, $sqli);
$data = mysqli_fetch_assoc($run);

// Handle form submission
if (isset($_POST["Update"])) {
    $productQuantity = $_POST['Quantity'];
    $price = $_POST['price'];
    $total = $productQuantity * $price;

    $update = "UPDATE stockout SET ProductQuantity = '$productQuantity', Price = '$price', TotalPrice = '$total' WHERE StockOutId = '$id'";
    $runUpdate = mysqli_query($conn, $update);

    if ($runUpdate) {
        echo "<script>alert('StockOut record updated successfully'); window.location.href='/Project-Magement-System/Pages/Products.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit StockOut</title>
    <link rel="stylesheet" href="stockIn.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./StyeRes.css">
    <style>
        body {
            overflow: hidden;
        }

        .form-container {
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form action="#" method="post">
            <input type="hidden" name="productid" value="<?php echo $data['ProductId']; ?>">

            <label>Name</label><br>
            <input type="text" name="product" value="<?php echo $data['ProductName']; ?>" readonly><br><br>

            <label>Quantity</label><br>
            <input type="number" name="Quantity" required value="<?php echo $data['ProductQuantity']; ?>"><br><br>

            <label>Price</label><br>
            <input type="number" name="price" step="0.01" required value="<?php echo $data['Price']; ?>"><br><br>

            <label>Total Price</label><br>
            <input type="text" name="total_price" readonly value="<?php echo $data['TotalPrice']; ?>"><br><br>

            <button type="submit" name="Update">Update</button>
            <a href="../Pages/Products.php"><button type="button">Back</button></a>
        </form>
    </div>

</body>

</html>