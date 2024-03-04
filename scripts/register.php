<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    require("database.php");

    if(strlen($_POST['name']) >= 5){

        if($_POST['password'] == $_POST['conform-password']){

        $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`email`, `password`)
        VALUES ('$_POST[email]', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "User created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        }else{
            echo "Password does not match";
        }

    }else{
        echo "Name should be longer than 5 characters";
    }




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="http://localhost/main/Resources/css/water/water.css">
</head>
<body>
    

<h2>Sign Up</h2>
<form action="" method="post">

    <label for="name">Enter Name</label>
    <input type="text" name="name" id="">

    <label for="">Enter Email</label>
    <input type="email" name="email" id="">

    <label for="">Enter Password</label>
    <input type="password" name="password" id="">
    
    <label for="">Conform Password</label>
    <input type="password" name="conform-password" id="">

    <input type="submit" value="Sign up">
    <a href="../index.php">Login</a>
</form>

</body>
</html>