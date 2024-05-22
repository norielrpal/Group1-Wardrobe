<?php
session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $id = $_SESSION['id'];

    $query = "UPDATE users SET Username='$username', Email='$email', Password='$password' WHERE Id='$id'";
    mysqli_query($con, $query);

    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
}

$id = $_SESSION['id'];
$result = mysqli_query($con, "SELECT * FROM users WHERE Id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <div class="box login-box">
            <a href="index.php" class="close-btn"><i class="fa fa-times"></i></a>
            <header>Edit Profile</header>
            <form action="" method="post">
                <div class="inBox input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($row['Username']); ?>" required>
                </div>

                <div class="inBox input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['Email']); ?>" required>
                </div>

                <div class="inBox input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($row['Password']); ?>" required>
                    <span class="toggle-password" id="togglePassword">Show</span>
                </div>

                <div class="input">
                    <input type="submit" class="btn" name="update" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</body>

</html>