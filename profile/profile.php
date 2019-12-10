<?php
$image = 'Hello';
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "camagru";

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
$options = array(
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    'cost' => 12,
  );
$username = $_SESSION['username'];

if(isset($_POST['insert'])){

    $file = file_get_contents($_FILES['image']['tmp_name']);
    $bfile = base64_encode($file);
    $need = 'data:image/png;base64,';
    $final = $need.$bfile;

    $stmt=$conn->prepare("INSERT INTO tbl_images (`name`, `username`, `likes`)VALUES(:file, (SELECT id FROM users WHERE username = '$username'), 1)");
    $stmt->execute(['file'=>$final]); 
}

// if(isset($_POST['insert'])){
 
//     // $image = $_REQUEST['name'];
    
//     // $new_img = preg_replace('/ /', '+', $image);
//     $stmt=$conn->prepare("INSERT INTO tbl_images (`name`, `username`, `likes`)VALUES(:file, (SELECT id FROM users WHERE username = '$username'), 1)");
//     $stmt->execute(['file'=>$_REQUEST['name']]);
//     // $stmt->execute(['file'=>$new_img]);
// }
if(isset($_REQUEST['name'])){
    $image = $_REQUEST['name'];
    
    $new_img = preg_replace('/ /', '+', $image);
    $stmt=$conn->prepare("INSERT INTO tbl_images (`name`, `username`, `likes`)VALUES(:file, (SELECT id FROM users WHERE username = '$username'), 1)");
    $stmt->execute(['file'=>$new_img]);
    
}


if(isset($_POST['updateusr'])) {
    $usrname = $_POST['usrname'];
   
    $stmt=$conn->prepare("UPDATE users SET `username`='$usrname' WHERE (`username` = '$username')"); 
    $stmt->execute(['usrname'=>$usrname]);
    header("location: ../landing/landing.php");
}
if(isset($_POST['updatepsw'])) {
    $usrpsw = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    $stmt=$conn->prepare("UPDATE users SET `password`='$usrpsw' WHERE (`username` = '$username')"); 
    $stmt->execute(['usrpsw'=>$usrpsw]);
}
if(isset($_POST['Select'])) {
    $checkboxY = $_POST['Yes'];
    $checkboxN = $_POST['No'];

    // print_r($checkboxY);
    // print_r($checkboxN);
    
    if ($checkboxY === 'yes') {
        $stmt=$conn->prepare("UPDATE users SET `ACTIVATION` = '2' WHERE (`username` = '$username')");
        $stmt->execute();
 
    }
    if ($checkboxN === 'no') {
        $stmt=$conn->prepare("UPDATE users SET `ACTIVATION` = '1' WHERE (`username` = '$username')");
        $stmt->execute();
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="profile.css">
        <title></title>
        <script src="../JavaScript/background_main.js"></script>
            </head>
                <body>
                
                <div class="header">
                    <a href="../like/like.html"><img class="heart" src="../resources/add_circular_fav_favourites_like_modern_red_icon_512.png"></a>
                    <a href="../home/main.php"><img class="home" src="../resources/circular_home_index_main_mainpage_modern_red_icon_512.png"></a>
                    <a href="../camera/camera.php"><img class="icon" src="../resources/circular_gif_image_jpg_modern_photo_picture_png_red_scenery_snap_icon_512.png"></a>
                    <a href="../profile/profile.php"><img class="profile" src="../resources/circular_modern_red_skype_icon_512.png"></a>
                    <a href="../search/search.php"><img class="search" src="../resources/circular_modern_o_orkut_red_icon_512.png"></a>

                </div>
                
                <div class="popup">
                    <div class="pictures">
                        
                        <form method="post" action="profile.php" enctype='multipart/form-data'>
                            <input type='file' name='image'/>
                            <input type='submit' value='insert' name='insert'>
                        </form>
                        
                        <!-- <p>Update Username<p> -->
                        <form method="post" action="profile.php">
                            <label for="usrname">Username:</label>
                            <input type='text' name='usrname'>
                            <input type='submit' value='Update' name='updateusr'>
                        </form>

                        <!-- <p>Update Password<p> -->
                        <form method="post" action="profile.php">
                            <label for="password">Password :</label>
                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{16,}" type='text' name='password'>
                            <input type='submit' value='Update' name='updatepsw'>
                        </form>
                        
                        <div class="emails">
                        <p>Email notifications :<p>
                        <form method="post" action="profile.php">
                            <p>Yes<p>
                            <input type="checkbox" value="yes" name="Yes">
                            <p>No<p>
                            <input type="checkbox" value="no" name="No">

                            <input type="submit" value="submit" name="Select">
                        </form>
                        </div>
                        <table class="table">
                            <tr>
                                <th></th>
                            </tr>
                    </div>
                
                </div>
                <?php 
                            // $stmt = $conn->prepare("SELECT * FROM tbl_images WHERE username = 1");
                            // $stmt->execute();
                            // $row = $stmt->fetchAll();
                            // foreach($row as $key => $values) {
                            //     for ($i = 0; $i < 4; $i++){
                            //         echo '<img src="' .$values['name'].'"/>';
                            //     }

                            // }
                        ?>
                
                
                </body>
</html>