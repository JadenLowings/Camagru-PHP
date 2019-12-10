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

?>
<html>
    <head>
        <link rel="stylesheet" href="camera.css">
        <title></title>
    </head>
    <body>

            <div class="popup">
                <div class="booth">
                    <video id="video" width="400" height="300"></video>
                    <a id="capture" class="booth-button">Capture</a>
                    <canvas id="canvas" width="400" height="300"></canvas>
                    <a type='button' id="blue-button" class="blue-button">Upload</a>
                    <a id="green-button" class="green-button">Customize!</a>
                    <form method="post" action="camera.php">
                    <input type='submit' id="up-button" class="blue-button">
                    <input type='file' id="yellow" Value="Select Image">
                    </form>
                </div>
            </div>
            <div class="header">
                <a href="../like/like.html"><img class="heart" src="../resources/add_circular_fav_favourites_like_modern_red_icon_512.png"></a>
                <a href="../home/main.php"><img class="home" src="../resources/circular_home_index_main_mainpage_modern_red_icon_512.png"></a>
                <a href="../camera/camera.html"><img class="icon" src="../resources/circular_gif_image_jpg_modern_photo_picture_png_red_scenery_snap_icon_512.png"></a>
                <a href="../profile/profile.php"><img class="profile" src="../resources/circular_modern_red_skype_icon_512.png"></a>
                <a href="../search/search.php"><img class="search" src="../resources/circular_modern_o_orkut_red_icon_512.png"></a>
            </div>
            <script src="../JavaScript/random.js"></script>
            <script src="../JavaScript/picture.js"></script>
            <script src="../JavaScript/background_main.js"></script>
            <input type="submit" class="logout" name="logout" value="Log out">
    
    </body>
</html>