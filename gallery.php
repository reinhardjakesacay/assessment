<?php
    require "config.php";

    if (!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT concat(fname, ' ', lname) as full_name, number FROM users WHERE id = '$id'");
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
    <title>Gallery</title>
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
        <h1>Gallery</h1>
        <div class="project">
            <h2>Project 1</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa amet debitis, quas quaerat perspiciatis officiis fuga voluptatem officia ducimus eos accusamus laudantium temporibus eligendi neque itaque sit repellat modi nihil, totam ea blanditiis. Veniam nulla corporis quo amet tempora harum, vitae exercitationem dolorem labore dolores voluptatem ab, consequuntur voluptatibus quisquam?</p>
            <p><?php if (!empty($_SESSION['id'])) {
                        echo 'Created by:' . $row['full_name'];
                    }else {
                        echo "Created by our team";
                    }
        //echo $row['full_name']; ?></p>
        </div>
        <div class="project">
            <h2>Project 2</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa amet debitis, quas quaerat perspiciatis officiis fuga voluptatem officia ducimus eos accusamus laudantium temporibus eligendi neque itaque sit repellat modi nihil, totam ea blanditiis. Veniam nulla corporis quo amet tempora harum, vitae exercitationem dolorem labore dolores voluptatem ab, consequuntur voluptatibus quisquam?</p>
            <p><?php if (!empty($_SESSION['id'])) {
                        echo 'Created by:' . $row['full_name'];
                    }else {
                        echo "Created by our team";
                    }
        //echo $row['full_name']; ?></p>
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