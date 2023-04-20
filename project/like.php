<?php
session_start();

if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header('Location: login.html');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];

    // Insert a new like into the database
    $sql = "INSERT INTO likes (post_id, user_id) VALUES ($post_id, $user_id)";
    if ($conn->query($sql) === TRUE) {
        echo "Liked successfully";
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>