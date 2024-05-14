<?php
include("Connection.php");
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}


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
            width: 100%;
            padding: 9px;
            text-align: left;
            margin-right: 20px;


        }

        .print {
            display: none;
        }

        .account h5 {
            background: black;
            color: white;
            padding: 5px;
            width: 50%;
            border-radius: 50%;
            margin-left: 12px;
            font-weight: bolder;
            text-transform: uppercase;
        }

        @media print {
            header {
                display: none;
            }

            .print {
                display: block;
            }

            .printButton {
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
                    <div class="link" id="link">
                    <button onclick="corss()"  id="Hidden">Cross</button>

                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a href="./DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./Products.php">Product</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./stockIn.php">StockIn</a></li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a href="../Pages/StockOut.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="../Pages/Report.php">Report</a> </li>
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
            <div class="print">

                <h1 style="text-align: center;">Ecole Primaire Sainte Anne</h1>
                <p style="text-align: center;">+250 0790154696</p>
                <p style="text-align: center;">Email:saint_anne@gmail.com</p> <br>
                <p style="text-align: center;"><?php echo date("Y-m-d h:i:sa") ?> </p><br><br>
                <h3 style="text-align: center ; text-decoration: underline;">STOCK MAGEMENT REPORT </h3> <br>

            </div>
            <div style="display: flex; justify-content: space-between;">
                <div>
                    <h2>Total Product in Stock </h2><br><br>
                    <p class="stockinp">Here is where you are going to add new product.</p>
                </div>
                <div>
                    <button onclick=" button() " class="printButton" style="margin: 50px; padding: 5px; width:150px; background:  rgb(7, 7, 66); color: white; font-weight: bolder; border-radius: 5px;">PRINT REPORT</button>
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
                                <th>STOCK CHIEF</th>
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
                                        <td>Admin</td>

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
    <!-- <footer>
        &copy;2024 Stock Magement
    </footer> -->
    </div>
    <script>
        function button() {
            window.print()
            console.log("button is clicked");
        }
    </script>
</body>

</html>