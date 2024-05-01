<?php
include('./Pages/Connection.php');
session_start();


$sql = "SELECT * FROM `stockin_product`";
$run = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($run);



if ($rows >= 0 && $rows <= 5) {
    $borderMess='Low Product';
}elseif($rows >= 6 && $rows <= 15){
    $borderMess='Enough Product';
}else{
    $borderMess='Very Enough Product';

}


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
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/StyeRes.css">

    <link rel="stylesheet" href="css/rome.css">
    <link rel="stylesheet" href="css/style.css">
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
                            <li><img src="./Resources/dashboard.png" alt="" class="icon"><a href="">DashBoard</a></li>
                            <li><img src="./Resources/product.png" alt="" class="icon"><a href="./Pages/Products.php">Products</a></li>
                            <li><img src="./Resources/out-of-stock.png" alt="" class="icon"><a href="./Pages/StochOut.php">StochOut</a></li>
                            <li><img src="./Resources/report.png" alt="" class="icon"><a href="./Pages/Report.php">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                    <div style="text-align: center;margin-right: 50px;">
                        <h5><?php echo  $_SESSION["userName"] ?></h5>
                        <a href="./Pages/Logout.php" style="font-size: small; margin-left: 8px;">LogOut</a>
                    </div>
                </div>
                <!-- <div class="bar">
                    <button>LogOut</button>
                </div> -->
            </nav>
        </header>
        <div class="body">
            <div class="flex">
                <div class="div2">
                    <div class="Products">
                        <h2>TOTAL OF PRODACT</h2>
                        <span><?php echo $rows; ?></span>
                    </div>
                    <div class="Quantity">
                        <h2>STOCK OUT PRODUCT</h2>
                        <span><?php echo $row; ?></span>
                    </div>
                </div>
                <div class="div3">
                    <div class="flexborder">
                        <div class="border2">
                            <h3>TIME</h3>
                            <h5 class="Date" id="time"></h5>
                        </div>
                        <div class="border">
                            <div>
                                <h3><?php echo $borderMess?></h3>
                            </div>
                            <div class="Low">
                                <p><?php echo  $rows?></p>
                            </div>
                        </div>
                    </div>
                    <div class="cont">
                        <h2>CALENDER</h2>
                        <form action="#">
                            <div class="col-md-12">
                                <div id="inline_cal"></div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
        <footer>
            &copy;2024 Stock Magement
        </footer>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rome.js"></script>
    <script src="js/main.js"></script>
    <script src="./Functionality/js.js"></script>
</body>

</html>