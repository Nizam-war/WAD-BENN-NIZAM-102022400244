<?php
include 'connect.php';

if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $categoryId = $_POST['categoryId'];
    $author = $_POST['author'];
    $stock = $_POST['stock'];

    $query = "INSERT INTO books (title, category_id, author, stock) 
              VALUES ('$title', '$categoryId', '$author', '$stock')";

    if (mysqli_query($conn, $query)) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "<script>alert('Gagal menambah data: " . mysqli_error($conn) . "');</script>";
    }
}
?>
