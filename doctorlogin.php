<style>
    <?php include 'adminlogin.css'; ?>
</style>
<?php
include("include/header.php");
?>
<?php
session_start();
include("./include/connection.php");
include("./include/functions.php");
$passwordErr = $emailErr = $phone_noErr = $usernameErr = "";

$password = $username = $phone_no = $email = "";

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>MedCare-Doctor Login</title>
</head>

<body>
<section class="book" id="book" style="margin-top:7%">

    <div class="container">
  

    <h1 class="heading"> <span>Doctor</span> Login </h1>    

    <div class="row">

        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>

        <form method="post" action="./include/validate_doctor.php">
        <div>
        <span class="error" style="text-align:center;color:red"><?php echo $usernameErr; ?></span>

        <span class="error" style="text-align:center;color:red"><?php echo $usernameErr; ?></span>
                        <input id="text1" type="text" name="username" class="box" placeholder="Enter Your UserName" value="<?php if (isset($_COOKIE["username"])) {
                                                                                                                echo $_COOKIE["username"];
                                                                                                            } ?>">
                        <br><br>
                        <span class="error" style="text-align:center;color:red"><?php echo $emailErr; ?></span>
                        <input id="text3" type="email" name="email" class="box" placeholder="Enter Your Email" value="<?php if (isset($_COOKIE["email"])) {
                                                                                                                echo $_COOKIE["email"];
                                                                                                            } ?>">

                        <br><br>
                        <span class="error" style="text-align:center;color:red"><?php echo $passwordErr; ?></span>
                        <input id="text2" type="password" name="password" class="box" placeholder="Enter Your Password(atleast 8 chars)" value="<?php if (isset($_COOKIE["password"])) {
                                                                                                                                        echo $_COOKIE["password"];
                                                                                                                                    } ?>">
                        <br><br>
                        <input type="checkbox" name="remember" value="1">Remember Me
                        <br><br>
                        <input id="button" type="submit" value="Login" class="btn" >
                        <br><br>

                        <p>I don't have an account <a href="apply.php">Apply Now!</a></p>
                        <br><br>


        </form>
      

    </div>

</section>
</body>

</html>