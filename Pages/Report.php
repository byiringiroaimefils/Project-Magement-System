<?php
include("Connection.php");
session_start();
$sql = "SELECT * FROM `stockin_product`";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);

$sql_out = "SELECT * FROM `stockout_product`";
$run_out = mysqli_query($conn, $sql_out);
$row_out = mysqli_num_rows($run_out);

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
        .section {
            background-color: #f1f1f1;
            border: 0.5px solid #ccc;
            width: 96%;
            padding: 9px;
            text-align: left;
            margin-right: 20px;

        }

        .print {
            display: none;
        }

        @media print {
            header {
                display: none;
            }

            .print {
                display: block;
            }
            .printButton{
                display: none;
            }
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
                    <div class="link">
                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a href="./DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="../Pages/Products.php">Products</a></li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a href="../Pages/StockOut.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="../Pages/Report.php">Report</a> </li>
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
            <div class="print">

                <h1 style="text-align: center;">Ecole Primaire Sainte Anne</h1>
                <p style="text-align: center;">+250 0790154696</p>
                <p style="text-align: center;">Email:saint_anne@gmail.com</p> <br>
                <p style="text-align: center;">Mon,02/05/2024</p><br><br>
                <h3 style="text-align: center ; text-decoration: underline;">STOCK MAGEMENT REPORT </h3> <br>

            </div>
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <h2>Total Product in Stock </h2><br><br>
                    <p class="stockinp">Here is where you are going to add new product.</p>
                </div>
                <div>
                    <button onclick=" button() " class="printButton" style="margin: 50px; padding: 5px; width: 90px; background: #000; color: white; font-weight: bolder;">Print</button>
                </div>
            </div>
            <div class="Section ">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME OF PRODUCT</th>
                            <th>Date</th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>TOTAL PRICE</th>
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
                                </tr>
                        <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>
                <!-- <h4>Total Of Amount</h4> -->
                <!-- <button onclick="button()">Print</button> -->
            </div>
        </section>

        <div>
            <div style="position: absolute; top: 70%;left: 2%;">
                <h2>Total Product in Stock </h2>
                <p>Here is where you are going to add new product.</p> <br><br><br>
            </div>
            <section style="position: absolute; top: 80%;left: 2%; width: 78%;">
                <div class="section">

                    <table class="table B">
                        <thead>
                            <tr style="text-align: left;">
                                <th>#</th>
                                <th>NAME OF PRODUCT</th>
                                <th>DATE</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($row_out > 0) {
                                while ($row_out = mysqli_fetch_assoc($run_out)) {
                            ?>


                                    <tr>
                                        <td><?php echo $row_out['product_id'] ?></td>
                                        <td><?php echo $row_out['product_name'] ?></td>
                                        <td><?php echo $row_out['product_date'] ?></td>
                                        <td><?php echo $row_out['product_Quantity'] ?></td>

                                    </tr>


                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </section>

    </div>

    </div>
    <script>
        function button() {
            window.print()
            console.log("button is clicked");
        }
    </script>
</body>

</html>