<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();    
}

session_start();

$user = $_SESSION['username'];
$user_id = $session['id'];

if (isset($_GET['delete'])) {
     
        $stmt=$conn->prepare("DELETE FROM tbl_images WHERE (`id` = ".$_GET['delete'].")");
        $stmt->execute();
}

else if (isset($_GET['like'])) {
        $stmt=$conn->prepare("SELECT id FROM users WHERE(`id` = ".$_GET['like'].")");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $stmt=$conn->prepare("UPDATE tbl_images SET `likes` = (`likes` + 1) WHERE (`id` = ".$_GET['like'].")");
        $stmt->execute();
}

else if (isset($_GET['comment'])) {
        $file = $_GET['comment-txt'];
        echo($file);
        $stmt=$conn->prepare("UPDATE tbl_images SET `comment` = '$file' WHERE (`id` = ".$_GET['comment'].")");
        $stmt->execute(['file'=>$file]);
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="search.css">
        <script src="../JavaScript/background_main.js"></script>
    </head>
        <body>
            <div class="header">
                    
                <a href="../like/like.php"><img class="heart" src="../resources/add_circular_fav_favourites_like_modern_red_icon_512.png"></a>
                <a href="../home/main.php"><img class="home" src="../resources/circular_home_index_main_mainpage_modern_red_icon_512.png"></a>
                <a href="../camera/camera.php"><img class="icon" src="../resources/circular_gif_image_jpg_modern_photo_picture_png_red_scenery_snap_icon_512.png"></a>
                <a href="../profile/profile.php"><img class="profile" src="../resources/circular_modern_red_skype_icon_512.png"></a>
                <a href="../search/search.php"><img class="search" src="../resources/circular_modern_o_orkut_red_icon_512.png"></a>
            
            </div>
            
            <div class="popup">
                
                <div class="pictures">
                    <table class="table table-bordered">
                    <tr>
                            <th>Image</th>
                        </tr>
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM tbl_images ORDER BY id DESC");
                            $stmt->execute();
                            $row = $stmt->fetchAll();
                            
                            $image_lim = 4;
                            $pic = 0;
                            $image_count = count($row);
                            $page = ceil($image_count / $image_lim);
                            $count = 0;

                            while ($count <= $image_count){

                                $oops = $key['likes'];
                                $oopscomment = $row[$count]['comment'];
                                
                                    echo '<img src="' .$row[$count]['name'].'"style="width:450px;/>';
                                    if ($_SESSION['username']){
                                        echo '  <form method="get" action="search.php?comment=" enctype="multipart/form-data">
                                        <button>
                                        <input type="submit" value="'.$row[$count]["id"].'"name="comment">.
                                        </button>
                                        </form>';
                                        
                                        echo '  <form method="get" action="search.php?comment=" enctype="multipart/form-data">
                                                <input pattern = "/[\t\r\n]|(--[^\r\n]*)|(\/\*[\w\W]*?(?=\*)\*\/)/" type="text" name="comment-txt">
                                                    <button>
                                                        <input type="submit" value="'.$row[$count]["id"].'"name="comment">comment
                                                    </button>
                                            </form>';
                                            echo $oopscomment;
                                        echo '  <form method="get" action="search.php?like=" enctype="multipart/form-data">
                                                    <button>
                                                        <input class="oops"type="submit" value="'.$row[$count]["id"].'"name="like">Likes
                                                    </button>
                                            </form>';
                
                                        echo $oops;
                                    
                                        if ($row['id'] = $result); {
                                            echo '  <form method="get" action="search.php?delete=" enctype="multipart/form-data">
                                                        <button>
                                                            <input type="submit" value="'.$row[$count]["id"].'" name="delete">Delete
                                                        </button>
                                                    </form>';
                                    }
                                }
                                if($count == $image_lim)
                                    break;
                                $count++;
                            }
                            ?>
                        </table>
                </div>
                <div class="pages">
                .
                    <?php

                        $num = 1;
                        while($num <= $page)
                            echo '
                                    <form method="get" action="search.php?page=" enctype="multipart/form-data">
                                        <button>
                                            <input type="button" value="'.$page.'" name="page_num">'.$num++.'
                                        </button>
                                    </form>';
                    ?>
                    <a name="one"><button>1</button></a>
                </div>
            </div>            
        </body>
</html>