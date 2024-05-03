<?php
include('Connection.php');
session_start();
$id = $_GET["id"];
$sqli = "SELECT * FROM stockin_product WHERE product_id='$id'";
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
            <button class="backbotton"> <a href="../Pages//Products.php">Back</a> </button>
            <section>

                <?php
                if ($row > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
                ?>


                        <form action="#" method="post">
                            <label for="" style="font-weight: bold;">Name </label> <br><br>
                            <input type="text" placeholder="Name of product" name="product" required value=" <?php echo $row['product_name'] ?>"><br><br>

                            <label for="" style="font-weight: bold;">Quntity</label><br><br>
                            <input type="text" placeholder="Kilograms" name="Quantity" required value="<?php echo $row['product_Quantity'] ?>"><br><br>


                            <label for="" style="font-weight: bold;">Pice</label><br><br>
                            <input type="number" placeholder="0.00FRw" name="price" required value="<?php echo $row['price'] ?>"><br><br>


                            <label for="" style="font-weight: bold;" name="">Total Pice</label><br><br>
                            <input type="text" placeholder="0.00FRw" name="Total_price" value="<?php echo $row['total_price'] ?>"><br><br>
                            <button name="Update">Update</button>

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
    $productQuantity = $_POST['Quantity'];
    $productprice = $_POST['price'];
    $productTotal_price = $_POST['Total_price'];

    $sqli = "UPDATE stockin_product SET product_name ='$productName', product_Quantity='$productQuantity' , price='$productprice', total_price='$productTotal_price' WHERE product_id='$id';";
    $run = mysqli_query($conn, $sqli);


    if ($run == true) {
        echo"<script>alert('Product Updated ✔')</script>";
        header("Location:/project%20magement%20system/Pages/Products.php");
    

    } else {
        echo"<script>alert('Product Not Updated ')<script/>";
        // echo 'not done';
    }
}

?>