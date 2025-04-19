<?php
include('Connection.php');
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}
$id = $_GET["id"];
$sqli = "SELECT * FROM product WHERE ProductId='$id'";
$run = mysqli_query($conn, $sqli);
$row = mysqli_num_rows($run);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Form//stockIn.css">
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
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
    <div class="heder">
        <div class="Stockin" style="margin-top: 50px;">
            <section>

                <?php
                if ($row > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                        <form action="#" method="post" style="margin-bottom: 15%;">
                            <label for="" style="font-weight: bold;"> Name of Product </label> <br><br>
                            <input type="text" placeholder="Name of product" name="product" required
                                value=" <?php echo $row['ProductName'] ?>"><br><br>
                            <button name="Update">Update</button><br><br>
                            <button class="Update"> <a href="../Pages/Products.php" style="text-decoration: none; color: white;">Back</a> </button>

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
include("Connection.php");
$id = $_GET['id'];
if (isset($_POST["Update"])) {
    $productName = $_POST['product'];
    // $productQuantity = $_POST['Quantity'];
    // $productprice = $_POST['price'];
    // $productTotal_price = $_POST['Total_price'];
    $productTotal_price = $productQuantity * $productprice;

    $sqli = "UPDATE product SET productName ='$productName' WHERE ProductId='$id';";
    $run = mysqli_query($conn, $sqli);


    if ($run == true) {
        echo "<script>alert('Product Updated ✔')</script>";
        // header("Location:Pages/Products.php");
    } else {
        echo "<script>alert('Product Not Updated ')<script/>";
        // echo 'not done';
    }
}

?>