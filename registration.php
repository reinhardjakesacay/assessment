<?php 
require "config.php";

    if (!empty($_SESSION['id'])) {
        header("Location: home.php");
    }

    if (isset($_POST["submit"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $number = $_POST["number"];
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
                $query = "INSERT INTO users VALUES ('','$fname', '$lname', '$age', '$gender','$number', '$username', '$email', '$password')";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <header>
        <div class="header">
        <div class="logo">Logo</div>
        <nav class="head">
            <ul>
                <!-- <li><a href="contact.php">Contact</a></li> -->
                <li><a href="gallery.php">Gallery</a></li>
                <!-- <li><a href="profile.php">Profile</a></li> -->
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </div>
    </header>

    <!-- can use bootstrap -->
    <div class="container, register">
        <form action="" method="post">
            <!-- <div class="form-group">
                <input type="text" name="fullname" id="fullname" required placeholder="Fullname:">
            </div> -->
            <div class="form-group">
                <input type="text" name="fname" placeholder="First Name:" maxlength="50">
            </div>
            <div class="form-group">
                <input type="text" name="lname" placeholder="Last Name:">
            </div maxlength="50">
            <div class="form-group">
                <input type="number" name="age" placeholder="Age:">
            </div>
            <div class="form-group">
                <input type="text" name="gender" placeholder="Gender:">
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username:">
            </div>
            <div class="form-group">
                <input type="tel" name="number" placeholder="Number:" maxlength="11" pattern="0[0-9]{10}">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email:" maxlength="50">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password:" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_]).{6,}">
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" placeholder="Repeat Password:" pattern=".{6,}">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" placeholder="Submit">
            </div>
        </form>
        <a href="login.php"><button class="btn btn-primary">Log in</button></a>
    </div>

    <footer>
        <nav class="footer">
            <ul>
                <li><a href="#">Github</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </nav>
        <p class="p_footer">@ All Copyright Reserved</p>
    </footer>
</body>
</html>