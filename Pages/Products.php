<?php
include('Connection.php');
session_start();


$sql = "SELECT * FROM `stockin_product`";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);

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
</head>

<body>
    <div class="continer">
        <header>
            <nav>
                <div class="logo">
                    <div class="logos">
                        <h2>Stock Management</h2>
                    </div>
                    <div class="link">
                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a href="../index.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="Products.php">Products</a></li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a href="Stockout.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="Report.html">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                    <div style="text-align: center;margin-right: 50px;">
                        <h5><?php echo  $_SESSION["userName"] ?></h5>
                        <a href="./Logout.php" style="font-size: small; margin-left: 8px;">LogOut</a>
                    </div>
                </div>
            </nav>
        </header>
        <section>
            <h2>Stock In New Products </h2><br><br>
            <p class="stockinp">Here is where you are going to add new product.</p>
            <div class="Section">
                <div class="Top">
                    <div class="search">
                        <img src="../Resources/search.png" alt="" class="icon">
                        <input type="text" placeholder="Search...">
                    </div>
                    <div class="NewButton">
                        <button><a href="./Form/StockIn.php">Add New</a></button>
                    </div>
                </div> <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME OF PRODUCT</th>
                            <th>Date</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>TOTAL PRICE</th>
                            <th>ACTION</th>
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
                                    <td data-label="Age"><?php echo $row['product_date'] ?></td>
                                    <td data-label="Marks%"><?php echo $row['product_Quantity'] ?></td>
                                    <td data-label="Marks%"><?php echo $row['price'] ?></td>
                                    <td data-label="Staus"><?php echo $row['total_price'] ?></td>
                                    <td data-label="Staus">
                                        <button class="Delete"><a href="Edit.php ?id=<?php echo $row['product_id'] ?>"><img src="../Resources/edit.png" alt="" class="deleteIcon"></a></button>
                                        <button class="Edit"><a href="Delete.php ?id=<?php echo $row['product_id'] ?>"><img src="../Resources/delete.png" alt="" class="editIcon"></a></button>
                                    </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>