<?php
try {

$conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
$e->getMessage();
}
session_start();

$_SESSION['username'] = $_POST['username'];

try {

    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", 'password');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
    
}
    if (isset($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['psw'];
            $_SESSION["username"] = $username;       
            $query = $conn->query("SELECT * FROM `users`");
    
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if ($row['ACTIVATION'] != NULL) {

                if (!strcmp($row['username'], $username) && password_verify($password, $row['password'])) {
                    header("location: ../home/main.php");
                    exit();
                }
            }

        }
}
if (isset($_POST['forgotpassword'])) {
    header("location: ../oopsie/oopsie_email.php");
    exit;
}

?>

<html lang="en">
<head>
    <link rel="stylesheet" href="landing.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<button class="open-button" onclick="openForm()">Login</button>

<div class="form-popup" id="myForm">
  <form class="form-container" method="post">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button><a class="btn_crt" href="../creatuser/create.phtml">Create</a></button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
        <form method="post">
            <input class="oopsie" type="submit" value="forgot password" name="forgotpassword">
        </form>
</div>
    <button><a href="../search/search.php">button</a></button>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>
    <script src="../JavaScript/background_main.js"></script>
</body>
</html>