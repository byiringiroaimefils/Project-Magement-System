<?php
session_start();



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
                            <li><img src="../Resources/product.png" alt="" class="icon"><a
                                    href="../Pages/Products.php">Products</a></li>
                            <li><img src="../Resources/out-of-stock.png" alt="" class="icon"><a
                                    href="../Pages/StockOut.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a
                                    href="../Pages/Report.php">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                <div style="text-align: center;margin-right: 50px;">
                        <h5><?php echo  $_SESSION["userName"] ?></h5>
                        <a href="./Pages/Logout.php" style="font-size: small; margin-left: 8px;">LogOut</a>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</body>

</html>