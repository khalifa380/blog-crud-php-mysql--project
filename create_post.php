<?php
session_start();
$conn = new mysqli("localhost", "root", "", "blog");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    echo "Post added successfully!";
}
?>
<form method="POST">
  Title: <input type="text" name="title" required><br>
  Content: <textarea name="content" required></textarea><br>
  <button type="submit">Create Post</button>
</form>