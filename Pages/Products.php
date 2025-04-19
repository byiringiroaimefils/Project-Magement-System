<?php
include('Connection.php');
session_start();
if (!isset($_SESSION["userName"]) || empty($_SESSION["userName"])) {
    header("Location:/Project-Magement-System/index.php");
    exit();
}

$sql = "SELECT * FROM `product`";
$run = mysqli_query($conn, $sql);
$row = mysqli_num_rows($run);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saint_Anne</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
    <!-- <script src="../Functionality/js.js" defer></script> -->
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
    <div class="continer">
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
                            <li><img src="../Resources/product.png" alt="" class="icon"><a
                                    href="./stockIn.php">StockIn</a>
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
        <section> <br>
            <div>
                <h2>Add New Products </h2><br><br>
                <p class="stockinp" style="color: rgb(7, 7, 66);">Here is where you are going to add new product.</p>
            </div>
            <div class="Section">
                <div class="Top">
                    <div  style=" margin-right: 8px;" class="NewButton">
                        <button><a href="./Form/product_form.php"
                                style="width: 50px; text-decoration: none; color: white; border-radius: 9px;">New
                                Product</a>
                        </button>
                    </div>
                </div>
                <table style="margin: 25px; width: 95%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME OF PRODUCT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($row > 0) {
                            $number = 1;
                            while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <tr>

                                    <td data-label="S.No"><?php echo $number ?></td>
                                    <td data-label="Name"><?php echo $row['ProductName'] ?></td>
                                    <td data-label="Staus">
                                        <button class="Edit" style="background-color: black;"><a
                                                style="color: white; text-decoration: none;"
                                                href="./Form/StockInForm.php ?id=<?php echo $row['ProductId'] ?>"> +
                                        </button>
                                        <button class="Edit"><a style="color: white; text-decoration: none;"
                                                href="Edit.php ?id=<?php echo $row['ProductId'] ?>"><img
                                                    src="../Resources/edit.png" alt="" style="width: 10px;"></button>
                                        <button class="Edit" style="background-color: red;"><a
                                                style="color: white; text-decoration: none;"
                                                href="Delete.php ?id=<?php echo $row['ProductId'] ?>"><img
                                                    src="../Resources/delete.png" alt="" style="width: 10px;">
                                        </button>


                                </tr>
                                <?php
                                $number++;
                            }
                        } else {
                            ?>
                            <td colspan="3" style="text-align: center;">No records</td>
                            </tr>
                            <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div style="position: absolute; top: 92%; left:50%; transform: translate(-50%,-50%);">
        <footer>
            &copy; 2024 Stock Management System - Ecole Primaire Sainte Anne
        </footer>
    </div>
</body>

</html>