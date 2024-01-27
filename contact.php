<?php
    require "config.php";

    if (!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT concat(fname, ' ', lname) as full_name, number FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }else {
        header("Location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>
<body>
    <header>
        <div class="header">
        <div class="logo">Logo</div>
        <nav class="head">
            <ul>
                <li><a href="logout.php">Log out</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </div>
    </header>

    <div class="container contact">
        <h2>Contact Us</h2>
        <p>Name: <?php echo $row['full_name']; ?></p>
        <p>Phone Number: <?php echo $row['number']; ?></p>
        <p>Address: San Jose, 1st Street</p>
        <div class="form">
            <form>
                <h2>Reach us here:</h2>
                <label class="email">Email:</label>
                <input type="text"><br>
                <label class="suggest">Suggesttion</label>
                <textarea name="" id="" cols="30" rows="10"></textarea> <br>
                <input type="submit" name="" id="">
            </form>
        </div>
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