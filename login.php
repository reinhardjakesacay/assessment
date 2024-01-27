<?php 
require "config.php";

    if (!empty($_SESSION['id'])) {
        header("Location: home.php");
    }

    if (isset($_POST["submit"])) {
        $usernameEmail = $_POST["usernameEmail"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameEmail' or email = '$usernameEmail'");

        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: home.php");
            }else {
                echo 
                "<script> alert('Wrong Password'); </script>";
            }
        }else {
            echo 
                "<script> alert('User Not Registered'); </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
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

    <div class="container">
        <form action="login.php" method="post">
            <div class="form_group">
                <input type="text" name="usernameEmail" placeholder="Username or Email:" class="form-control">
            </div>
            <div class="form_group">
                <input type="password" name="password" placeholder="Password:">
            </div>
            <div class="form_group">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        <a href="registration.php"><button>Register</button></a>
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