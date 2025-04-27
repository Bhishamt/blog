<?php
    include('connection.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* General Body Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #faf3e0; /* Primary Background: Beige */
            color: #4E342E; /* Text: Dark Brown */
        }

        /* Navigation Bar */
        nav {
            background-color: #8D6E63; /* Soft Brown for header/navigation */
            overflow: hidden;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            float: left;
            display: block;
            text-align: center;
            font-size: 18px;
        }

        nav a:hover {
            background-color: #FFD54F; /* Warm Yellow for hover links */
            color: white;
        }

        nav a.active {
            background-color: #FF7043; /* Soft Orange for active link */
            color: white;
        }

        /* Header Section */
        h1 {
            text-align: center;
            color: #4E342E; /* Dark Brown for header */
            padding: 20px 0;
        }

        h2 {
            text-align: center;
            color: #4E342E; /* Dark Brown for subheader */
            padding-bottom: 20px;
        }

        /* Card Container */
        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: space-around;
        }

        /* Card Styles */
        .card {
            background-color: #FFFFFF; /* White background for cards */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px); /* Card hover effect */
        }

        .card img {
            width: 100%;
            border-radius: 8px;
        }

        .card h3 {
            color: #4E342E; /* Dark Brown for card titles */
            font-size: 1.5rem;
            margin-top: 15px;
        }

        .card p {
            color: #6D4C41; /* Medium Brown for card text */
            font-size: 1rem;
            line-height: 1.6;
            margin: 10px 0;
        }

        .card .btn {
            background-color: #FF7043; /* Soft Orange for buttons */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #ff7c3f; /* Warm Yellow on button hover */
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #8D6E63; /* Soft Brown for footer */
            color: white;
            /* position: fixed; */
            width: 100%;
            bottom: 0;
        }

        footer p {
            margin: 0;
            font-size: larger;
        }
    </style>
    <link rel="stylesheet" href="card.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <a href="home.php" class="">Home</a>
        <a href="main.php" class="active">Blog</a>
        <a href="about.html">About</a>
        <a href="login.php">Admin</a>
    </nav>

    <!-- Welcome Section -->
    <div style="padding: 20px;">
        <h1>Welcome, It's Glad You Are Here...</h1>
    </div>

    <!-- Recent Blogs Section -->
    <div style="display: flex; justify-content: center;">
        <h2>Recent Blogs</h2>
    </div>

    <!-- Cards for Blog Posts -->
    <div class="card-container">
        
        <?php
            $query = "SELECT * FROM blogs ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['image'] . '" alt="">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>' . $row['description'] . '...</p>';
                    echo '<a href="blog.php?id=' . $row['id'] . '" class="btn">Read More</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No recent blogs available.</p>';
            }
        ?>

    </div>

    <!-- Footer -->
    <footer>
        <p>Thank you for visiting !</p>
    </footer>
</body>
</html>

