<?php
$conn = new mysqli("localhost", "root", "", "blog");
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p>" . $row['content'] . "</p>";
    echo "<a href='edit_post.php?id=" . $row['id'] . "'>Edit</a> | ";
    echo "<a href='delete_post.php?id=" . $row['id'] . "'>Delete</a><hr>";
}
?>