<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <div class="box login-box">
            <a href="index.php" class="close-btn"><i class="fa fa-times"></i></a>
            <?php

            include("php/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                //verifying the unique email

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                      <p>This email is used. Try another one!</p>
                  </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {

                    mysqli_query($con, "INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occured");

                    echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                }
            } else {

            ?>


                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="inBox input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="inBox input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="on">
                    </div>

                    <div class="inBox input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                        <span class="toggle-password" id="togglePassword">Show</span>
                    </div>

                    <div class="input">
                        <input type="submit" class="btn" name="submit" value="Sign Up" required>
                    </div>

                    <div class="login">
                        Already has an account? <a href="login.php">Log in</a>
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
<?php } ?>
</body>

</html>