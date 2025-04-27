<?php

include 'connection.php'

if (isset($_POST(''))){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = "INSERT INTO `user` (`id`, `Name`, `Email`, `Password`) VALUES (NULL, 'Ankush', 'abc@email', '123abc');"
    mysql_quary($conn,$sql);
    echo "data submited"



}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
</head>
<body>

    <div class="form-container">
        <h2>Sign Up</h2>
        <form action="/submit" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">
            
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
            <input type="insertbtn">
            
            <button type="submit">Sign Up</button>
        </form>
    </div>

</body>
</html>
