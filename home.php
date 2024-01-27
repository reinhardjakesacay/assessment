<?php
    require "config.php";

    if (!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT concat(fname, ' ', lname) as full_name FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
    }else {
        //header("Location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <header>
        <div class="header">
        <div class="logo">Logo</div>
        <nav class="head">
            <ul>
                <li>
                    <?php if (!empty($_SESSION['id'])) {
                            echo '<a href="logout.php">Log out</a>';
                        }else {
                            echo '<a href="login.php">Log in</a>';
                        }
                    ?>
                </li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
    </div>
    </header>

    <div class="container">
        <h1>Assessment</h1>
        <h2><?php if (!empty($_SESSION['id'])) {
            echo $row['full_name'];
        }else {
            echo "Welcome";
        }
        
        //echo $row['full_name']; ?></h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet, voluptate vel? Non ipsa sed, impedit amet similique ipsum eius! Molestias mollitia quia dolor iste magni autem, incidunt fugiat perferendis nulla nemo odio atque aperiam vero impedit voluptatibus, nisi possimus in voluptate non ipsam. Animi non molestias iure quos cum, quis aut et velit nostrum. Non et doloremque, saepe perspiciatis voluptas repellat veritatis sit autem asperiores eos modi iure quaerat quia accusantium eius velit animi dolor eveniet esse. Ad aliquid minus, libero eius officia impedit ut sunt dolores id, corporis natus vitae, minima necessitatibus voluptas itaque officiis voluptatum laboriosam perspiciatis. Ipsam!</p>
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