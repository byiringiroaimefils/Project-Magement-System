<?php
include('Connection.php');

$sql = "SELECT * FROM `stockout_product`";
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
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="../Pages/Products.php">Product</a></li>
                            <li><img src="../Resources//out-of-stock.png" alt="" class="icon"><a href="../Pages/StockOut.php">StochOut</a></li>
                            <li><img src="../Resources/report.png" alt="" class="icon"><a href="../Pages/Report.html">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                    <!-- <p class="accounth2">aimefils@gmail.com</p> -->
                    <a href="">LogOut</a>
                </div>
            </nav>
        </header>
        <section>
            <h2>Stock Our Products </h2><br><br>
            <p class="stockinp">Here is where you are going to look product remains In Stock.</p>
            <div class="Section">
                <div class="Top">
                    <div class="search">
                        <img src="../Resources/search.png" alt="" class="icon">
                        <input type="text" placeholder="Search...">
                    </div>
                    <div class="NewButton">
                        <button><a href="./Form/Stockout.php">Stock out</a></button>
                    </div>
                </div> <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME OF PRODUCT</th>
                            <th>DATE</th>
                            <th>QUANTITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($row > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                        ?>


                                <tr>
                                    <td><?php echo $row['product_id'] ?></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['product_date'] ?></td>
                                    <td><?php echo $row['product_Quantity'] ?></td>
                                    
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