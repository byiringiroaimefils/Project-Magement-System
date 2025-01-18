<?php
include("Connection.php");
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/project%20magement%20system/index.php");
    exit();
}

$sql = "SELECT  
    Product.ProductId,
    Product.ProductName,
    Stockin.ProductQuantity AS StockInQuantity,
    Stockin.ProductDate AS StockInDate,
    Stockin.Price,
    Stockin.TotalPrice AS TotalPrice,
    Stockout.ProductQuantity AS StockOutQuantity,
    Stockout.ProductDate AS StockOutDate
FROM product 
INNER JOIN Stockin ON Stockin.ProductId = Product.ProductId
INNER JOIN Stockout ON Stockout.ProductId = Product.ProductId";

$run = mysqli_query($conn, $sql);

// Check if query returned any results before processing
if (mysqli_num_rows($run) > 0) {
    $row = mysqli_fetch_assoc($run);
    
    $productname = $row['ProductName'];
    $Remain_Product = $row['StockInQuantity'] - $row['StockOutQuantity'];
    
    // Update query
    $update = mysqli_query($conn, "UPDATE stockin SET ProductQuantity='$Remain_Product' WHERE ProductName='$productname'");
    
    // Reset the result pointer to beginning for the table display loop
    mysqli_data_seek($run, 0);
} else {
    // Handle case when no results found
    $row = null;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saint_Anne</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
    <script src="../js/Functionality/js.js" defer></script>

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
                        <h2>Saint  Anne</h2>

                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>

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
            </nav>
        </header>

        <div class="user" id="user">
            <h4><?php echo  $_SESSION["userName"] ?></h4>
            <p> <a href="./Logout.php">LogOut</a></p>

        </div>

        <section>
            <div class="print">
                <div class="print-header">
                    <h1>Ecole Primaire Sainte Anne</h1>
                    <p>Contact: +250 0790154696</p>
                    <p>Email: saint_anne@gmail.com</p>
                    <p class="date"><?php echo date("Y-m-d h:i:sa") ?></p>
                    <h3>STOCK MANAGEMENT REPORT</h3>
                </div>
                
                <div class="print-content">
                    <table class="print-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name of Product</th>
                                <th>Date</th>
                                <th>Quantuty</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>DateOUT</th>
                                <th>QuantityOUT</th>
                                <th>Total Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($run && mysqli_num_rows($run) > 0) {
                                $number = 1;
                                while ($row = mysqli_fetch_assoc($run)) {
                                    ?>
                                    <tr>
                                        <td data-label="S.No"><?php echo $number ?></td>
                                        <td data-label="Name"><?php echo htmlspecialchars($row['ProductName']) ?></td>
                                        <td data-label="Age"><?php echo htmlspecialchars($row['StockInDate']) ?></td>
                                        <td data-label="Marks%"><?php echo $Rem = $row['StockInQuantity'] - $row['StockOutQuantity'] ?></td>
                                        <td data-label="Marks%"><?php echo htmlspecialchars($row['Price']) ?></td>
                                        <td data-label="Staus"><?php echo htmlspecialchars($row['TotalPrice']) ?></td>
                                        <td data-label="Age"><?php echo htmlspecialchars($row['StockOutDate']) ?></td>
                                        <td data-label="Marks%"><?php echo htmlspecialchars($row['StockOutQuantity']) ?></td>
                                        <td data-label="Marks%"><?php echo $Rem + $row['StockOutQuantity'] ?></td>
                                    </tr>
                                    <?php
                                    $number++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" style="text-align: center;">No records found</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="print-footer">
                    <p>Generated by: <?php echo htmlspecialchars($_SESSION["userName"]) ?></p>
                    <p>Date: <?php echo date("Y-m-d") ?></p>
                </div>
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
                            <th>Name of Product</th>
                            <th>Date</th>
                            <th>Quantuty</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>DateOUT</th>
                            <th>QuantityOUT</th>
                            <th>Total Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($run && mysqli_num_rows($run) > 0) {
                            $number = 1;
                            while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <tr>
                                    <td data-label="S.No"><?php echo $number ?></td>
                                    <td data-label="Name"><?php echo htmlspecialchars($row['ProductName']) ?></td>
                                    <td data-label="Age"><?php echo htmlspecialchars($row['StockInDate']) ?></td>
                                    <td data-label="Marks%"><?php echo $Rem = $row['StockInQuantity'] - $row['StockOutQuantity'] ?></td>
                                    <td data-label="Marks%"><?php echo htmlspecialchars($row['Price']) ?></td>
                                    <td data-label="Staus"><?php echo htmlspecialchars($row['TotalPrice']) ?></td>
                                    <td data-label="Age"><?php echo htmlspecialchars($row['StockOutDate']) ?></td>
                                    <td data-label="Marks%"><?php echo htmlspecialchars($row['StockOutQuantity']) ?></td>
                                    <td data-label="Marks%"><?php echo $Rem + $row['StockOutQuantity'] ?></td>
                                </tr>
                                <?php
                                $number++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">No records found</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <h4>Total Of Amount</h4> -->
                <!-- <button onclick="button()">Print</button> -->
            </div>
        </section>

        <!-- <div>
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
                                        <td><?php echo $row_out['producId'] ?></td>
                                        <td><?php echo $row_out['productName'] ?></td>
                                        <td><?php echo $row_out['productDate'] ?></td>
                                        <td><?php echo $row_out['productQuantity'] ?></td>
                                        <td>Admin</td>

                                    </tr>


                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div> -->
        </section>

    </div>
    <div style="position: absolute; top: 92%; left:50%; transform: translate(-50%,-50%);">
        <footer>
            &copy;2024 Stock Magement
            <p>Ecole Primaire Sainte Anne</p>

        </footer>
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