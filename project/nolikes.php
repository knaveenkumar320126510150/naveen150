<?php
session_start();
$post_id = 123; // Hardcoded for simplicity

$sql = "SELECT COUNT(*) AS count FROM likes WHERE post_id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['count'] . " likes";
} else {
    echo "0 likes";
}
?>
