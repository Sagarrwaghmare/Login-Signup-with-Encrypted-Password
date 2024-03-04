<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    require("scripts/database.php");

    // $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    // print_r($hashed_password);
    // $verify = password_verify($_POST['password'], $hashed_password);
    // print_r($verify);



    $sql = "SELECT * FROM `users` WHERE `email`='$_POST[email]'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $hashed_password = $row['password'];

        // if($row['password'] == $_POST['password']){
        if(password_verify($_POST['password'],$hashed_password)){
            echo "Correct Login";
        }else{
            echo "Wrong Password";
        }
    }else{
        echo "Wrong Email";
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Signup</title>
    <link rel="stylesheet" href="http://localhost/main/Resources/css/water/water.css">
</head>
<body>

<h2>User Login</h2>
<form action="" method="post">
    <label for="email">Enter Email</label>
    <input type="text" name="email" id="" placeholder="">
    
    <label for="email">Enter Password</label>
    <input type="text" name="password" id="" placeholder="">
    
    <input type="submit" name="" id="" value="Login">

    <a href="scripts/register.php">New User</a>
</form>
    
</body>
</html>