<?php
session_start();

include("connection.php");
include("functions.php");
$passwordErr = $emailErr = $phone_noErr = $usernameErr = "";
// $remember = "";
$password = $username = $phone_no = $email = "";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
   
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a valid user name";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-']*$/", $username)) {
            $usernameErr = "Only letters and whitespaces allowed";
        }
    }


    if (empty($_POST["email"])) {
        $emailErr = "Please enter a email address";
    } 
    else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "The email address is incorrect";
        }
    }

	

    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a valid password";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = 'Password should be at least 8 characters in length.';
        }
    }
		if(!empty($username) && !empty($password)  && !empty($email) && !is_numeric($username))
		{

			//read from database
			$query = "select * from doctor where username = '$username' and email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						if (isset($_POST['remember'])) {
							/* Set cookie to last 1 week */
							setcookie("username",$user_data['username'],time()+60*60,"/");
										setcookie ("password",$user_data['password'],time()+ (3600),"/");
										setcookie ("email",$user_data['email'],time()+ (3600),"/");
							// setcookie('passwordCookie', md5($_POST['password']), time()+60*60*24*7);
						} else {
							/* Cookie expires when browser closes */
							if(isset($_COOKIE["username"]))   
							{  
								setcookie ("username","");  
							}  
							if(isset($_COOKIE["password"]))   
							{  
								setcookie ("password","");  
							}  
							if(isset($_COOKIE["email"]))   
							{  
								setcookie ("email","");  
							} 
							// setcookie('passwordCookie', md5($_POST['password']), false);
						}
                        $_SESSION['doctor']=$username;
						header("Location:../doctor/index.php");
						die();
					}
				}
			}
	} 
	
 

    
}


?>

