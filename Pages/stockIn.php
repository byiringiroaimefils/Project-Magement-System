<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}

if (isset($_GET['Search'])) {

$filter = mysqli_real_escape_string($conn, $_GET['Search']);

$sql = "SELECT * FROM `stockin_product`  WHERE CONCAT(product_name) LIKE '%$filter%'";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
    <script src="../Functionality/js.js" defer></script>
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
    <div class="continer">
        <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>
                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a href="./DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./Products.php">Products</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./stockIn.php">StockIn</a></li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a href="Stockout.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="Report.php">Report</a> </li>
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
                        <a href="./Logout.php">LogOut</a>
                    </button>
                    </div>
                </div> -->
            </nav>
        </header>
        <div class="user" id="user">
            <h4><?php echo  $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>

        </div>
        <section>
            <h2>Stock In Products </h2><br><br>
            <p class="stockinp" style="color: rgb(7, 7, 66);">Here is where you are going to add new product.</p>
            <div class="Section">
                <div class="Top">
                    <div class="search">
                        <form action="" method="get">
                            <img src="../Resources/search.png" alt="" class="icon">
                            <input type="text" placeholder="Search..." name="Search">
                            <button>Search</button>
                        </form>
                    </div>
                    <!-- <div class="NewButton">
                        <button><a href="./Form/StockIn.php" style="text-decoration: none; color: white; border-radius: 9px;">Add New</a></button>
                    </div> -->
                </div> <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME OF PRODUCT</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>TOTAL PRICE</th>
                            <th>DATE</th>
                            <!-- <th>ACTION</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($row > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                                <tr>

                                    <td data-label="S.No"><?php echo $row['product_id'] ?></td>
                                    <td data-label="Name"><?php echo $row['product_name'] ?></td>
                                    <td data-label="Marks%"><?php echo $row['product_Quantity'] ?></td>
                                    <td data-label="Marks%"><?php echo $row['price'] ?></td>
                                    <td data-label="Staus"><?php echo $row['total_price'] ?></td>
                                    <td data-label="Age"><?php echo $row['product_date'] ?></td>


                                </tr>
                        <?php
                            }
                        }else{
                            // echo " <script>alert('No products found matching the search criteria')</script>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <!-- <footer>
            &copy;2024 Stock Magement
        </footer> -->
</body>

</html>