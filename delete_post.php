<?php
$conn = new mysqli("localhost", "root", "", "blog");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>