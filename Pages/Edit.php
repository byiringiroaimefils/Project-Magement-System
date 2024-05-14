<?php
include('Connection.php');
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}
$id = $_GET["id"];
$sqli = "SELECT * FROM product WHERE product_id='$id'";
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

        <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>

                        <ul>
                            <li><img src="../Resources/dashboard.png"  class="icon"><a href="/index.html">DashBoard</a></li>
                            <li><img src="../Resources/product.png" style="width: 20px;" ><a href="./Products.php">Product</a></li>
                            <li><img src="../Resources/product.png" style="width: 20px;"><a href="./stockIn.php">StockIn</a></li>
                            <li><img src="../Resources/outstock (1).png" class="icon"><a href="/Pages/StochOut.html">StochOut</a></li>
                            <li><img src="../Resources/report.png" class="icon"><a href="/Pages/Report.html">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div style="display: flex;">
                    <img src="../Resources//user.png" alt="" onclick="userFunction()" style="width: 35px; margin-right: 9px; cursor: pointer;">
                    <img src="../Resources//hamburger-menu.png" alt="" onclick="Bar()" id="Hidden" style="width: 35px; cursor: pointer;">
                </div>
                <!-- <div class="account">
                    <div style="text-align: center;margin-right: 50px; display: flex; gap: 2px;">
                    <h5><?php echo substr($_SESSION["userName"], 0, 1) ?></h5>
                    <button style=" margin-left: 8px ; border: none; background-color: transparent;">
                        <a href="../Logout.php">LogOut</a>
                    </button>
                    </div>
                </div> -->
            </nav>
        </header>
        <div class="user" id="user">
            <h4><?php echo  $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>

        </div><br>
        <div class="Stockin">
            <button class="backbotton"> <a href="../Pages//Products.php">Back</a> </button>
            <section>

                <?php
                if ($row > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
                ?>


                        <form action="#" method="post" style="margin-bottom: 15%;">
                            <label for="" style="font-weight: bold;">Name </label> <br><br>
                            <input type="text" placeholder="Name of product" name="product" required value=" <?php echo $row['product_name'] ?>"><br><br>

                            <!-- <label for="" style="font-weight: bold;">Quntity</label><br><br>
                            <input type="text" placeholder="Kilograms" name="Quantity" required value="<?php echo $row['product_Quantity'] ?>"><br><br>


                            <label for="" style="font-weight: bold;">Pice</label><br><br>
                            <input type="text" placeholder="0.00FRw" name="price" required value="<?php echo $row['price'] ?>"><br><br> -->
                            <!-- <label for="" style="font-weight: bold;" name="">Total Pice</label><br><br>
                            <input type="text" placeholder="0.00FRw" name="Total_price" value="<?php echo $row['total_price'] ?>"><br><br> -->
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
    // $productQuantity = $_POST['Quantity'];
    // $productprice = $_POST['price'];
    // $productTotal_price = $_POST['Total_price'];
    $productTotal_price =  $productQuantity * $productprice;

    $sqli = "UPDATE product SET product_name ='$productName' WHERE product_id='$id';";
    $run = mysqli_query($conn, $sqli);


    if ($run == true) {
        echo "<script>alert('Product Updated ✔')</script>";
        header("Location:/project%20magement%20system/Pages/Products.php");
    } else {
        echo "<script>alert('Product Not Updated ')<script/>";
        // echo 'not done';
    }
}

?>