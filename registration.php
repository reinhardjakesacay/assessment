<?php 
require "config.php";

    if (!empty($_SESSION['id'])) {
        header("Location: home.php");
    }

    if (isset($_POST["submit"])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' or email = '$email'");

        if (mysqli_num_rows($duplicate) > 0) {
            echo 
            "<script> alert('Username or Email already taken'); </script>";
        }else {
            if ($password == $repeat_password) {
                $query = "INSERT INTO users VALUES ('','$fullname', '$username', '$email', '$password')";
                mysqli_query($conn, $query);
                echo 
                "<script> alert('Registered Successfully'); </script>";
            }else {
                echo 
                "<script> alert('Password does not match'); </script>";
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <header>
        <div class="header">
        <div class="logo">Logo</div>
        <!-- <nav class="head">
            <ul>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav> -->
    </div>
    </header>

    <!-- can use bootstrap -->
    <div class="container">
        <form action="" method="post">
            <div class="form_group">
                <input type="text" name="fullname" id="fullname" required placeholder="Fullname:">
            </div>
            <div class="form_group">
                <input type="text" name="username" placeholder="Username:">
            </div>
            <div class="form_group">
                <input type="email" name="email" placeholder="Email:">
            </div>
            <div class="form_group">
                <input type="password" name="password" placeholder="Password:">
            </div>
            <div class="form_group">
                <input type="password" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form_group">
                <input type="submit" name="submit" placeholder="Submit">
            </div>
        </form>
        <a href="login.php"><button>Log in</button></a>
    </div>

    <footer>
        <nav class="footer">
            <ul>
                <li><a href="#">Github</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>