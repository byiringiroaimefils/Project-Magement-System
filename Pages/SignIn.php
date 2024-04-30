<?php
session_start();
include("Connection.php");

if(isset($_POST['signin'])){
    $mess='';
    $userName = $_POST['username'];
    $passWord = $_POST['password'];

    $sql="SELECT * FROM signup WHERE userName='$userName' AND password='$passWord' ";
    $run=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($run);
    // echo $row;
    

    if ($row){
        $_SESSION["userName"] = $row["userName"];
        $_SESSION["password"] = $row["password"];
        header("Location:index.php");
        $mess='Email $ Password correct!!';
        
    } else {
        $mess='Email $ Password Incorrect!!';
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../Style/StyeRes.css">
</head>

<body>
    <section>
        <div class="Container-Form">
            <div class="signIn">
                <h2>Welcome To  Stock  Management</h2><br><br><br>
                <button><a href="SIgnIn.html">SignUp</a></button>
            </div>
            <div class="signUp">
                <h2>SignIn Stock Management</h2> <br><br><br>
               <span style="color: red; font-weight: bolder;"><?php echo $mess ?></span><br>
                <form action="#" method="post">
                    <input type="text" id="" placeholder="John Doe" name="username" > <br><br>
                    <input type="password" placeholder="password" name="password" ><br><br>
                    <button name="signin">Sign In</button><br><br>
                    <label for="" class="createAccount">Create Account<a href="SIgnIn.html">SignUp</a></label>
                </form>
            </div>
        </div>
    </section>
</body>

</html>