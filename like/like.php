<?php
try {

    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
    
}
session_start();

if (!$_SESSION['username']) {
    header ("location: ../landing/landing.php");
    exit;
};
?>
<html>
    <head>
        <link rel="stylesheet" href="like.css">
        <title></title>
        <script src="../JavaScript/background_main.js"></script>
    </head>
    <body>

        <div class="popup">
            
            
            <div class="pictures">
                <table class="table table-bordered">
                    <tr>
                        <th>Image</th>
                    </tr>
                    <?php
                            //$query = "SELECT * FROM tbl_images ORDER BY id DESC";
                            $stmt = $conn->prepare("SELECT * FROM tbl_images ORDER BY id DESC");
                            $stmt->execute();
                            //$results = $stmt->fetchAll();
                            // print_r ($results);
                            //echo($results[0].name);
                            
                            
                            while($row = $stmt->fetch()) 
                            {
                                echo '  
                                <tr>  
                                <td>  
                                <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                                </td>  
                                </tr>  
                                '; 
                            }
                            ?>
                    </table>
                </div>
            </div>
            <div class="header">
                <img class="heart" src="../resources/add_circular_fav_favourites_like_modern_red_icon_512.png">
                <a href="../home/main.php"><img class="home" src="../resources/circular_home_index_main_mainpage_modern_red_icon_512.png"></a>
                <a href="../camera/camera.php"><img class="icon" src="../resources/circular_gif_image_jpg_modern_photo_picture_png_red_scenery_snap_icon_512.png"></a>
                <a href="../profile/profile.php"><img class="profile" src="../resources/circular_modern_red_skype_icon_512.png"></a>
                <a href="../search/search.php"><img class="search" src="../resources/circular_modern_o_orkut_red_icon_512.png"></a>
            </div>
    </body>
</html>