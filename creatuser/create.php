<?php

session_start();


if (isset($_POST['confirm'])) {

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
    
      
      $new_user = array(
        "usrnme"  => $_POST['username'],
        "frstname" => $_POST['firstname'],
        "lstname"  => $_POST['lastname'],
        "eml"     => $_POST['email'],
        "psw"  => password_hash($_POST['password'], PASSWORD_BCRYPT, $options),
        "uhash" => password_hash($_POST['username'], PASSWORD_BCRYPT, $options),
    );
    if($_POST['username'] != '') {
        $check = $_POST['username'];

        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = '$check'");
        $stmt->execute(['check' => $check]);

        $results = $stmt->fetchAll();
        if ($results) {
            header ("location: ../creatuser/create.phtml");
            exit;
        }
    }
    if($_POST['password'] === $_POST['Cpassword']) {
        $usr = password_hash($_POST['username'], PASSWORD_BCRYPT, $options);
        echo $_POST['username'];
        echo $usr;

        $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,username,email,`password`,Uhash) VALUES (:frstname, :lstname,:usrnme, :eml, :psw, :uhash)");
        $stmt->execute($new_user);
    }
    else {
        echo ("dumbass");
        exit;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    

    $subject = "Activation";
    $msg = "
    Hello $username Welcome to the Camagru family, Please click on the link
    bellow to confirm your email.

    http://localhost:8080/Camagru/Verification/Verification.php?name=$usr
    
    kind regards
    Camguru Team";
    
    $msg = wordwrap($msg, 100,"<br>\n");
    
    mail ($email, $subject, $msg);
    
    // $statement = $conn->prepare($sql);
    // $statement->execute($new_user);
    header('location: ../landing/landing.php');
}
// forgot password//


if (isset($_POST['fconfirm'])) {
    $options = array(
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        'cost' => 12,
      );
    $email = $_POST['femail'];
    $usname = $_POST['fusername'];
    $usnameh = password_hash($_POST['fusername'], PASSWORD_BCRYPT, $options);

    $sbject="Password Reset";
    $msg = "
    To reset your Password $usname, please click the link below

    http://localhost:8080/Camagru/oopsie/oopsie.php?name=$usnameh$usname


    
    kind regards
    Camguru Team";

    $msg = wordwrap($msg, 100,"<br>\n");
    
    mail ($email, $subject, $msg);
    echo($usnameh);
    header('location: ../landing/landing.php');
};


?>
