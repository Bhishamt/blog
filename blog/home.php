<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My Blog</title>
    <style>
        /* General Reset and Base Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FAF3E0; /* Beige Background */
            color: #4E342E; /* Dark Brown Text */
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navigation Bar */
        nav {
            background-color: #8D6E63; /* Soft Brown */
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            padding: 10px 20px;
            display: inline-block;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #FFD54F; /* Warm Yellow on hover */
            border-radius: 5px;
        }

        nav a.active {
            background-color: #FF7043; /* Soft Orange for active link */
            color: white;
            border-radius: 5px;
        }

        /* Header Section */
        header {
            background-image: url('header-background.jpg'); /* Replace with your image */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            color: #4E342E; /* Dark Brown for heading */
        }

        header p {
            font-size: 1.2rem;
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto;
            color: #4E342E; /* Dark Brown for subheading */
        }

        /* Main Content Section */
        .content-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Blog Post Card Styling */
        .blog-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-card .blog-content {
            padding: 20px;
        }

        .blog-card h2 {
            font-size: 1.6rem;
            color: #4E342E; /* Dark Brown for card titles */
            margin-bottom: 15px;
        }

        .blog-card p {
            font-size: 1rem;
            color: #6d4c41; /* Medium Brown for card text */
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .blog-card .read-more {
            font-size: 1.1rem;
            font-weight: bold;
            color: #FF7043; /* Soft Orange for "Read More" */
            transition: color 0.3s ease;
        }

        .blog-card .read-more:hover {
            color: #333; /* Dark brown text on hover */
            text-decoration: underline;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Footer Styling */
        footer {
            background-color: #8D6E63; /* Soft Brown for footer */
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
        }

        footer p {
            font-size: large;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            header p {
                font-size: 1.1rem;
            }

            nav a {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 2rem;
            }

            header p {
                font-size: 1rem;
                max-width: 100%;
            }

            nav {
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav>
    <a href="home.php" class="active">Home</a>
    <a href="main.php" class="">Blog</a>
    <a href="about.html">About</a>
     <a href="login.php">Admin</a>
</nav>

<!-- Header Section -->
<header>
    <h1>Welcome to My Blog</h1>
    <p>Sharing ideas, stories, and inspiration with the world</p>
</header>

<!-- Main Content Section -->
<div class="content-container">
    <!-- Blog Post 1 -->
    <div class="blog-card">
        <img src="AI1.png" alt="Blog Post 1">
        <div class="blog-content">
            <h2>Exploring New Technologies</h2>
            <p>In this post, I dive into the latest trends in technology, exploring how they are shaping our world...</p>
            <a href="blog1.html" class="read-more">Read More &rarr;</a>
        </div>
    </div>

    <!-- Blog Post 2 -->
    <div class="blog-card">
        <img src="shimla.jpg" alt="Blog Post 2">
        <div class="blog-content">
            <h2>Top Travel Destinations for 2025</h2>
            <p>Planning your next vacation? Here are the top destinations you should visit in 2025...</p>
            <a href="blog2.html" class="read-more">Read More &rarr;</a>
        </div>
    </div>

    <!-- Blog Post 3 -->
    <div class="blog-card">
        <img src="run.jpg" alt="Blog Post 3">
        <div class="blog-content">
            <h2>How to Stay Productive at Home</h2>
            <p>Working from home can be challenging, but with the right tips and mindset, you can stay productive...</p>
            <a href="blog3.html" class="read-more">Read More &rarr;</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>Thank you for visiting !</p>
</footer>

</body>
</html>
