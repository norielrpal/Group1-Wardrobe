<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Form</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <div class="box login-box">
            <a href="index.php" class="close-btn"><i class="fa fa-times"></i></a>
            <?php
            session_start();
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['id'] = $row['Id'];
                } else {
                    echo "<div class='message'>
                     <p>Wrong Email or Password</p>
                      </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button>";
                }
                if (isset($_SESSION['valid'])) {
                    header("Location: index.php");
                }
            } else {


            ?>

                <header>Login</header>
                <form action="" method="post">
                    <div class="inBox input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="on" required>
                    </div>

                    <div class="inBox input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                        <span class="toggle-password" id="togglePassword">Show</span>
                    </div>

                    <div class="input">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="signup">
                        Don't have an account yet? <a href="register.php">Sign up</a>
                    </div>
                </form>
        </div>
    <?php } ?>
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