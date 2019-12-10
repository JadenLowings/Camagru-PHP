<?php

session_start();

if (!$_SESSION['username']) {
    header ("location: ../landing/landing.php");
    exit;
};

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();

    header('location: ../landing/landing.php');
}
$welcome = $_SESSION['username'];
?>
<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="heading">
            <h1>Welcome  <?= $welcome ?></h1>
        </div>
        <div class="header">

            <a href="../like/like.php"  title="likes"><img class="heart" src="../resources/add_circular_fav_favourites_like_modern_red_icon_512.png"></a>
            <a href="../home/main.php" title="likes"><img class="home" src="../resources/circular_home_index_main_mainpage_modern_red_icon_512.png"></a>
            <a href="../camera/camera.php" title="likes"><img class="icon" src="../resources/circular_gif_image_jpg_modern_photo_picture_png_red_scenery_snap_icon_512.png"></a>
            <a href="../profile/profile.php" title="likes"><img class="profile" src="../resources/circular_modern_red_skype_icon_512.png"></a>
            <a href="../search/search.php"><img id="myBtn" class="search" src="../resources/circular_modern_o_orkut_red_icon_512.png"></a>
                        
</div>
        
        <form method="post" name="logout">
        <input type="submit" class="logout" name="logout" value="log out">
        </form>
        <script src="../JavaScript/background.js"></script>
    </body>
</html>