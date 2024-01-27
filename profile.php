<?php
    require "config.php";

    if (!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT concat(fname, ' ', lname) as full_name FROM users WHERE id = '$id'");
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
    <title>Profile</title>
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

    <div class="container">
        <h2 class="name">Hi! I am <?php echo $row['full_name']; ?></h2>
        <p class="profDefinition">I am a full stack developer. <br>
            I provide clients with wonderful and 
            interactive websites for their companies and businesses.
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sequi praesentium illo magni dolore sed quas possimus eos facilis blanditiis unde quia alias reiciendis totam, obcaecati sunt quisquam quaerat voluptas modi incidunt ex exercitationem aliquam aut ab. Natus nulla, amet nostrum obcaecati id error? Magnam accusantium necessitatibus ut fugiat laudantium aliquid rem consectetur aspernatur in nesciunt cumque porro tempore minima aperiam pariatur, autem blanditiis reiciendis optio atque. Deserunt, error animi aliquam veritatis laboriosam tempora ea praesentium, aspernatur culpa corporis velit quod dolor eveniet, similique nostrum. Aliquid dolorum alias asperiores illo non maiores cum quibusdam rem, tenetur commodi officia. Sit, quisquam?</p>
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