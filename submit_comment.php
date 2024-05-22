<?php
session_start();
include('php/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['valid'])) {
    $username = $_SESSION['username'];
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
    if (mysqli_query($con, $sql)) {
        header("Location: index.php#comments-section");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    header("Location: index.php#comments-section");
    exit();
}
