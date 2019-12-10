<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();

}
$options = array(
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    'cost' => 12,
);

$value = $_GET['name'];

$name = substr($value, 66);

if (!$name) {
    header ("location: ../landing/landing.php");
    exit;
};

if (isset($_POST['Update'])) {

    $usrpsw = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
 


    $stmt=$conn->prepare("UPDATE users SET `password`='$usrpsw' WHERE (`username` = '$name')"); 
    $stmt->execute();

    header ('location: ../landing/landing.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="oopsie.php?name=<?=$right?>?name=<?=$value?>">
<input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" name="password">
<input type="submit" value="Update" name="Update">
</form>
    
</body>
</html>