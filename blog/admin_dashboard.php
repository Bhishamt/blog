<?php

    include('connection.php');

    session_start();

    if(!isset($_SESSION['email'])) {
        header('location: login.php');
    }

    if (isset($_POST['addBtn'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];        
            $fileSize = $_FILES['image']['size'];        
            $fileType = $_FILES['image']['type'];        
            $uploadDir = 'uploads/';                    
    
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
    
            $destPath = $uploadDir . basename($fileName);
    
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $content = $_POST['content'];
                $query = "insert into blogs(title, description, content, image) values('$title', '$description', '$content', '$destPath')";
                mysqli_query($conn, $query);
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "No file uploaded or there was an error.";
        }
    }

    if (isset($_POST['editBtn'])) {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $content = $_POST['content'];
      
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $uploadDir = 'uploads/';
        
        if (!is_dir($uploadDir)) {
          mkdir($uploadDir, 0755, true);
        }
        
        $destPath = $uploadDir . basename($fileName);
        
        if (move_uploaded_file($fileTmpPath, $destPath)) {
          $query = "UPDATE blogs SET title='$title', description='$description', content='$content', image='$destPath' WHERE id='$id'";
        } else {
          echo "Error moving the uploaded file.";
          exit;
        }
      } else {
        $query = "UPDATE blogs SET title='$title', description='$description', content='$content' WHERE id='$id'";
      }
      
      mysqli_query($conn, $query);
    }

    if (isset($_POST['deleteBtn'])) {
      $id = $_POST['id'];
      $query = "DELETE FROM blogs WHERE id=$id";
      mysqli_query($conn, $query);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="admin_dashboard.php">Manage Blogs</a></li>
        <li><a href="handleLogout.php">Logout</a></li>
      </ul>
    </aside>
    <main class="main-content">
      <h1>Manage Blogs</h1>
      <button id="newBlogBtn" class="btn">New Blog</button>
      
      <!-- Blog Table -->
      <table class="blogs-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          
            <?php
                $query = "select * from blogs";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>
                            <a href='blog.php?id={$row['id']}' target='_blank'>
                                {$row['title']}
                            </a>
                          </td>";
                    echo "<td>
                                {$row['description']}
                          </td>";
                    echo "<td>
                            <div style='width: 100px; height: 100px; overflow: hidden;'>
                                <img src='{$row['image']}' alt='{$row['title']}' style='width: 100%; height: auto;'>
                            </div>
                          </td>";
                    echo "<td>{$row['created_at']}</td>";
                    echo "<td>
                        <button class='btn edit-btn' onclick='openEditModal(
                            " . json_encode($row['id']) . ", 
                            " . json_encode($row['title']) . ", 
                            " . json_encode($row['description']) . ", 
                            " . json_encode($row['content']) . ", 
                            " . json_encode($row['image']) . "
                        )'>Edit</button>
                        <button class='btn delete-btn' onclick='openDeleteModal({$row['id']})'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
      </table>

      <!-- New Blog Modal -->
      <div id="newBlogModal" class="modal">
        <div class="modal-content">
          <h2>Add New Blog</h2>

          <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>


            <label for="image">Upload Blog Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit" name="addBtn" class="btn">Add Blog</button>
            <button type="button" class="btn close-btn" onclick="closeModal('newBlogModal')">Cancel</button>
          </form>

        </div>
      </div>

      <!-- Edit Modal -->
      <div id="editModal" class="modal">
        <div class="modal-content">
        
        <h2>Edit Blog</h2>

        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="idEdit">
            <label for="title">Title:</label>
            <input type="text" id="titleEdit" name="title" required>
            
            <label for="description">Description:</label>
            <input type="text" id="descriptionEdit" name="description" required>

            <label for="content">Content:</label>
            <textarea id="contentEdit" name="content" rows="4" required></textarea>


            <label for="image">Upload Blog Image:</label>
            <input type="file" id="imageEdit" name="image" accept="image/*" >

            <button type="submit" name="editBtn" class="btn">Edit Blog</button>
            <button type="button" class="btn close-btn" onclick="closeModal('editModal')">Cancel</button>
        </form>
        
        </div>
      </div>

      <!-- Delete Modal -->
      <div id="deleteModal" class="modal">
        <div class="modal-content">
            <form action="admin_dashboard.php" method="post">
                <h2>Confirm Delete</h2>
                <p>Are you sure you want to delete this blog?</p>
                <input type="hidden" name="id" id="idDelete">
                <button type="submit" name="deleteBtn" class="btn delete-btn">Delete</button>
                <button class="btn close-btn" onclick="closeModal('deleteModal')">Cancel</button>
            </form>
        </div>
      </div>
    </main>
  </div>

  <script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    document.getElementById('newBlogBtn').addEventListener('click', () => {
        openModal('newBlogModal');
    });

    function openEditModal(id, title, description, content, image) {
        idEdit.value = id;
        titleEdit.value = title;
        descriptionEdit.value = description;
        contentEdit.value = content;
        openModal('editModal');
    }

    function openDeleteModal(id) {
        idDelete.value = id;
        openModal('deleteModal');
    }

  </script>
</body>
</html>
