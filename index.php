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
                            <li><img src="./Resources/product.png" alt="" class="icon"><a
                                    href="./Pages/Products.htm">Products</a></li>
                            <li><img src="./Resources/out-of-stock.png" alt="" class="icon"><a
                                    href="./Pages/StochOut.html">StochOut</a></li>
                            <li><img src="./Resources/report.png" alt="" class="icon"><a
                                    href="./Pages/Report.html">Report</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="account">
                    <div>
                        <a href="">LogOut</a>
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
                        <span>09</span>
                    </div>
                    <div class="Quantity">
                        <h2>TOTAL QUANTITY</h2>
                        <span>20</span>
                    </div>
                </div>
                <div class="div3">
                    <div class="flexborder">
                        <div class="border2">
                            <h3>TIME</h3>
                            <h5 class="Date">13:39 p.m</h5>
                        </div>
                        <div class="border">
                            <div>
                                <h3>Low Product</h3>
                            </div>
                            <div class="Low">
                                <p>0</p>
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
</body>

</html>