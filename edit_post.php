<?php
$conn = new mysqli("localhost", "root", "", "blog");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
        $stmt->bind_param("ssi", $title, $content, $id);
        $stmt->execute();
        echo "Post updated!";
    }
}
?>
<form method="POST">
  Title: <input type="text" name="title" value="<?= $post['title'] ?>" required><br>
  Content: <textarea name="content" required><?= $post['content'] ?></textarea><br>
  <button type="submit">Update Post</button>
</form>