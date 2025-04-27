<?php
    include('connection.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM blogs WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $blog = mysqli_fetch_assoc($result);
    } else {
        echo "No blog id provided.";
        exit;
    }
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

        /* Blog Content */
        .blog-content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #FFFFFF; /* White background for blog content */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .blog-content img {
            width: 100%;
            border-radius: 8px;
        }

        .blog-content h3 {
            color: #4E342E; /* Dark Brown for blog titles */
            font-size: 2rem;
            margin-top: 15px;
        }

        .blog-content p {
            color: #6D4C41; /* Medium Brown for blog text */
            font-size: 1.2rem;
            line-height: 1.8;
            margin: 10px 0;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #8D6E63; /* Soft Brown for footer */
            color: white;
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

    <!-- Blog Post Section -->
    <div class="blog-content">
        <?php if ($blog): ?>
            <img src="<?php echo $blog['image']; ?>" alt="" style="width: 100%; height: auto;">
            <h3><?php echo $blog['title']; ?></h3>
            <p><?php echo $blog['description']; ?></p>
            <div><?php echo $blog['content']; ?></div>
        <?php else: ?>
            <p>Blog post not found.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>Thank you for visiting !</p>
    </footer>
</body>
</html>
