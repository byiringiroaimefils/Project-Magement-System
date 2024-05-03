<?php
session_start();
$conn =mysqli_connect("localhost","root","","saint_anne");


if (isset($_POST['signin'])) {
    $mess = '';
    $userName = $_POST['username'];
    $passWord = $_POST['password'];

    $sql = "SELECT * FROM users WHERE userName='$userName' AND password='$passWord' ";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
    



    if ($row) {
        $_SESSION["userName"] = $row["userName"];
        $_SESSION["password"] = $row["password"];
        header("Location:/project magement system/Pages/DashBoard.php");
        $mess = 'Email $ Password Correct!!';
        echo"<script>alert('Email $ Password Correct!!')</script>";
    } else {
        $mess = 'UserName $ Password Incorrect!!';
        echo"<script>alert('UserName $ Password Incorrect!!')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style//style.css">
    <link rel="stylesheet" href="Style//StyeRes.css">
</head>

<body>
    <section>
        <div class="Container-Form">
            <div class="signIn">
                <h2>Welcome To Stock Management</h2><br><br><br>
                <button><a href="./Pages//SignUp.php">SignUp</a></button>
            </div>
            <div class="signUp">
                <h1>SIGN IN</h1> <br>
                <!-- <span style="color: red; font-weight: bolder;"><?php echo $mess ?></span><br> -->
                <form action="#" method="post">
                    <input type="text" id="" placeholder="John Doe" name="username" required> <br><br>
                    <input type="password" placeholder="password" name="password" required><br><br>
                    <button name="signin">Sign In</button><br><br>
                    <label for="" class="createAccount">Create Account<a href="SIgnIn.php">SignUp</a></label>
                </form>
            </div>
        </div>
    </section>
</body>

</html>