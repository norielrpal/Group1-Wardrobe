<?php
session_start();
include('php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['valid'])) {
    $comment_id = mysqli_real_escape_string($con, $_POST['comment_id']);
    $username = $_SESSION['username'];

    // Check if the comment belongs to the logged-in user
    $query = "SELECT * FROM comments WHERE id = '$comment_id' AND username = '$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $delete_query = "DELETE FROM comments WHERE id = '$comment_id'";
        if (mysqli_query($con, $delete_query)) {
            header("Location: index.php#comments-section");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "You do not have permission to delete this comment.";
    }
} else {
    header("Location: index.php#comments-section");
    exit();
}
