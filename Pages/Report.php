<?php
include("Connection.php");
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}

$sql = "
SELECT 
    Product.ProductName,
    IFNULL(SUM(StockIn.ProductQuantity), 0) AS StockInQuantity,
    IFNULL(SUM(StockOut.ProductQuantity), 0) AS StockOutQuantity,
    (IFNULL(SUM(StockIn.ProductQuantity), 0) - IFNULL(SUM(StockOut.ProductQuantity), 0)) AS NetStock
FROM Product
LEFT JOIN StockIn ON Product.ProductId = StockIn.ProductId
LEFT JOIN StockOut ON Product.ProductId = StockOut.ProductId
GROUP BY Product.ProductId;

";



$run = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stock Report - Saint Anne</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
    <script src="../js/Functionality/js.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .print {
            display: flex;
            flex-direction: column;
        }

        .print-display {
            display: none;

        }


        @media print {

            .print {
                display: flex;
                flex-direction: column;
            }

            .print-display {
                display: flex;

            }

            header,
            .printButton {
                display: none;
            }

            .print {
                display: block;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .printButton {
            margin: 20px;
            padding: 10px 20px;
            background: rgb(7, 7, 66);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #555;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <div class="logos">
                    <h2>Saint Anne</h2>
                </div>
                <div class="link" id="link">
                    <button onclick="corss()" id="Hidden">Cross</button>
                    <ul>
                        <li><img src="../Resources/dashboard.png" alt="" class="icon"><a
                                href="./DashBoard.php">DashBoard</a></li>
                        <li><img src="../Resources/product.png" alt="" class="icon"><a
                                href="./Products.php">Products</a>
                        </li>
                        <li><img src="../Resources/product.png" alt="" class="icon"><a href="./stockIn.php">StockIn</a>
                        </li>
                        <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a
                                href="Stockout.php">StochOut</a>
                        </li>
                        <li><img src="../Resources/report.png" alt="" class="icon"><a href="Report.php">Report</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div style="display: flex;">
                <h4 style="margin-top: 10px; color:gray;"><?php echo $_SESSION["userName"] ?></h4>
                <img src="../Resources//dropdown.png" alt="" onclick="userFunction()"
                    style="width: 20px; margin-right: 12px; margin-top: 10px; cursor: pointer;">
            </div>
        </nav>
    </header>

    <div class="user" id="user">
        <h4><?php echo $_SESSION["userName"] ?></h4>
        <p> <a href="./Logout.php">LogOut</a></p>

    </div>

    <br><br>
    <div class="container" style="margin: 20px;">

        <div class="print">
            <div style="text-align: center;" class="print-display">
                <h1>Ecole Primaire Sainte Anne</h1>
                <p>Contact: +250 0790154696 | Email: saint_anne@gmail.com</p>
                <p class="date"><?php echo date("Y-m-d h:i:sa") ?></p>
                <h3>STOCK MANAGEMENT REPORT</h3>
            </div>
            <div>
                <h2>Report </h2>
                <p style="color: rgb(7, 7, 66);">Here is where you are going to add new product.</p>
            </div>
            <br />
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <!-- <th>Stock-In Date</th> -->
                        <th>Stock-In Quantity</th>
                        <!-- <th>Stock-Out Date</th> -->
                        <th>Stock-Out Quantity</th>
                        <!-- <th>Price</th>
                        <th>Total Price</th> -->
                        <th>Net Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($run) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($run)) {
                            $net_stock = $row['StockInQuantity'] + $row['StockOutQuantity'];
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['ProductName'] ?></td>
                                <!-- <td><?php echo $row['LastStockInDate'] ?></td> -->
                                <td><?php echo $row['StockInQuantity'] ?></td>
                                <!-- <td><?php echo $row['LastStockOutDate'] ?></td> -->
                                <td><?php echo $row['StockOutQuantity'] ?></td>
                                <!-- <td><?php echo $row['Price'] ?></td> -->
                                <!-- <td><?php echo $row['TotalPrice'] ?></td> -->
                                <td><?php echo $net_stock ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="9" style="text-align: center;">No records found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <div style="margin-top: 20px;" class="print-display">
                <p>Generated by: <?php echo $_SESSION["userName"] ?></p>
                <p>Date: <?php echo date("Y-m-d") ?></p>
            </div>
        </div>

        <div>
            <button class="printButton" onclick="window.print()" style="margin-left: 6px;">Print Report</button>
        </div>

        <div style="position: absolute; top: 92%; left:50%; transform: translate(-50%,-50%);">
            <footer>
                &copy; 2025 Stock Management System - Ecole Primaire Sainte Anne
            </footer>
        </div>

    </div>
</body>

</html>