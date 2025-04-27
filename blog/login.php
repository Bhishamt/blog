<?php
    include('connection.php');

    session_start();

    if(isset($_SESSION['email'])) {
        header('location: admin_dashboard.php');
    }

    if(isset($_POST['loginBtn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from admin_data where email='$email' and password='$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email;
            header('location: admin_dashboard.php');
        } else {
            echo "Invalid email or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <style>
       body {
           background-image: url('ab.jpg');
           background-size: cover;
           background-position: center;
           margin: 0;
           font-family: Arial, sans-serif;
       }
       .formcontainer {
           background-color: rgba(235, 206, 227, 0.9); /* Slight transparency */
           padding: 30px;
           width: 100%;
           max-width: 400px; /* Limit max width */
           margin: auto;
           border-radius: 10px;
           display: flex;
           flex-direction: column;
           gap: 15px;
           margin-top: 10%;
           align-items: center;
           height: auto;
       }
       .logo {
           width: 40%;
       }
       .formitem {
           display: flex;
           flex-direction: column;
           width: 100%;
       }
       .formitem label {
           font-size: 1.1rem;
           font-weight: bold;
           margin-bottom: 5px;
       }
       .formitem input {
           padding: 10px;
           font-size: 1rem;
           border: 1px solid #ddd;
           border-radius: 5px;
           width: 100%;
           box-sizing: border-box;
           margin-bottom: 15px;
       }
      .button{
        background-color: #4CAF50;
           color: white;
           border: none;
           cursor: pointer;
           width:100%;
           display: flex;
           justify-content: center;
           align-items: center;
           height: 40px;
           border-radius: 10px;
           font-size: 1.1rem;
           transition: background-color 0.3s ease;
      }
       .butoon:hover {
           background-color: #45a049;
       }
       h1 {
           font-size: 2rem;
           font-weight: 600;
           text-align: center;
           margin-bottom: 15px;
       }
       .formcontainer img {
           width: 80px;
           margin-bottom: 15px;
       }
   </style>
</head>
<body>

<form action="login.php" method="post" class="formcontainer">
    <h1>Login Page</h1>
    <img src="user1.png" alt="User Logo">
    <div class="formitem">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" >
    </div>
    <div class="formitem">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" >
    </div>
        <button type="submit" name="loginBtn" class="button">Login</a>
</form>

</body>
</html>
