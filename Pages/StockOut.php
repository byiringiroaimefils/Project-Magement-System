<?php
include('Connection.php');
session_start();

if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}

// if (isset($_GET['Search'])) {
// $filter = $_GET['Search'];
// $filter = mysqli_real_escape_string($conn, $_GET['Search']);

$sql = "SELECT * FROM  Product  
INNER JOIN Stockout  ON Stockout.ProductId = Product.ProductId";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saint_Anne</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
    <!-- <script src="../Functionality/js.js" ></script> -->
    <script src="../js/Functionality/js.js" defer></script>

    <style>
        .account h5 {
            background: black;
            color: white;
            padding: 9px;
            width: 60%;
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
                        <h2>Saint  Anne</h2>
                    </div>
                    <div class="link" id="link">
                        <button onclick="corss()" id="Hidden">Cross</button>
                        <ul>
                            <li><img src="../Resources/dashboard.png" alt="" class="icon"><a href="./DashBoard.php">DashBoard</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./Products.php">Product</a></li>
                            <li><img src="../Resources/product.png" alt="" class="icon"><a href="./stockIn.php">StockIn</a></li>
                            <li><img src="../Resources//out-of-stock.png" alt="" class="icon"><a href="../Pages/StockOut.php">StochOut</a></li>
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
            <h2>Stock Our Products </h2><br><br>
            <p class="stockinp" style="color:  rgb(7, 7, 66);">Here is where you are going to look product remains In Stock.</p>
            <div class="Section">
                <div class="Top">
                    <div class="search">
                        <form action="" method="get">

                            <img src="../Resources/search.png" alt="" class="icon">
                            <input type="text" placeholder="Search..." name="Search">
                            <!-- <button>Search</button> -->
                        </form>
                    </div>
                    <div class="NewButton">
                        <button style="margin-right: 20px;"><a href="./Form/StockoutForm.php" style="text-decoration: none; color: white; border-radius: 9px; ">STOCK OUT</a></button>
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
                            $number=1;
                            while ($row = mysqli_fetch_assoc($run)) {
                        ?>


                                <tr>
                                    <td><?php echo $number?></td>
                                    <td><?php echo $row['ProductName'] ?></td>
                                    <td><?php echo $row['ProductDate'] ?></td>
                                    <td><?php echo $row['ProductQuantity'] ?></td>
                                    <td>
                                        <button class="Edit" style="background-color: red;"><a style="color: white; text-decoration: none;" href="Action/DeleteSout.php ?id=<?php echo $row['StockOutId'] ?>"><img src="../Resources/delete.png" alt="" style="width: 15px;"></button>
                                        <!-- <button class="Edit"><a style="color: white; text-decoration: none;" href="Pages/Action/EditSout.php ?id=<?php echo $row['ProductId'] ?>">Edit</button> -->

                                    </td>

                                </tr>


                        <?php
                          $number++;
                            }
                        } else {
                            // echo " <script>alert('No products found matching the search criteria')</script>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div style="position: absolute; top: 92%; left:50%; transform: translate(-50%,-50%);">
        <footer>
            &copy;2024 Stock Magement
            <p>Ecole Primaire Sainte Anne</p>
        </footer>
    </div>
</body>

</html>

<?php




?>