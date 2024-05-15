<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saint_Anne</title>
    <link rel="stylesheet" href=".//Form//style.css">
    <link rel="stylesheet" href="./Form//StyeRes.css">
</head>

<body>
    <section>
        <div class="Container-Form">
            <div class="signUp">
                <?php
                include("Connection.php");

                // Declaration of variables
                $usernameErr = $passwordErr = $confPasswordErr = '';
                $username = $password = $confPassword = '';
                $message;

                if (isset($_POST["SignUp"])) {
                    $userName = $_POST['username'];
                    $passWord = $_POST['password'];
                    $confPassword = $_POST['Confpassword'];

                    // Verification
                    if (empty($userName)) {
                        $usernameErr = 'Username Required';
                    } else {
                        $username = $userName;
                    }

                    if (empty($passWord)) {
                        $passwordErr = 'password Required';
                    } else {
                        $password = $passWord;
                    }

                    if (empty($confPassword)) {
                        $confPasswordErr = 'Confpassword Required';
                    } else {
                        if ($confPassword !== $passWord) {
                            $confPasswordErr = 'Password not match';
                        } else {

                            $confPassword = $confPassword;
                        }
                    }


                    if ($usernameErr == "" && $passwordErr == "" && $confPasswordErr == "") {
                        $sql = "INSERT INTO users VALUES ('','$userName', '$password', '$confPassword')";
                        $run = mysqli_query($conn, $sql);
                        if ($run) {
                            $message = 'User Registered';
                            echo "<script>alert('User Registered')</script>";
                        } else {
                            $message = 'User Not registered';
                            echo "<script>alert('User Not registered')</script>";
                        }
                    } else {
                        // echo "error";
                    }
                }
                ?>
                <h3>SIGNUP</h3> <br>
                <!-- <?php echo $message ?> -->
                <form action="" method="post">
                    <label for="" style="font-weight: bolder;">UserName</label><span style="color: red;">*</span><br>
                    <input type="text" id="" placeholder="John Doe" name="username"><br>
                    <span style="color: red;"><?php echo $usernameErr  ?></span><br><br>

                    <label for="" style="font-weight: bolder;">Password</label><span style="color: red;">*</span><br>
                    <input type="password" placeholder="Password" name="password"><br>
                    <span style="color: red;"><?php echo $passwordErr ?></span><br><br>

                    <label for="" style="font-weight: bolder;">Confirm Password</label><span style="color: red;">*</span><br>
                    <input type="password" placeholder="Confirm Password" name="Confpassword"><br>
                    <span style="color: red;"><?php echo $confPasswordErr ?></span><br>

                    <button name="SignUp"  style="width: 25%;" >Sign Up</a></button><br><br>
                    <label for="" class="createAccount">Already have account<a href="/project%20magement%20system/index.php">  SignIn</a></label><br> <br>
            </div>
            <div class="signIn">
                <h3>WELCOME TO STOCK MANAGEMENT</h3> <br>
                <button> <a href="/project%20magement%20system/index.php">SignIn</a></button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>