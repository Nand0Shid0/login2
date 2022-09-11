<?php
require 'database.php';

$message = '';
date_default_timezone_set('America/Mexico_City');
$datetime = date('m-d-Y h:i:s');


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users2 (email, password, username, name, phone, birthday) VALUES (:email, :password, :username, :name, :phone, :birthday)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':birthday', $_POST['birthday']);
    
    

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header('Location: ./index.php');

    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>SignUp</title>
</head>
<body>


<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>


<div class="main">
<h1>SignUp</h1>
  <div class="logn-page">
  <span>or <a href="login.php">Login</a></span>
  </div>


  <form action="signup.php" method="POST">
    <input class="email" name="email" type="email" placeholder="Enter your email">
    <input name="password" type="password" placeholder="Enter your Password">
    <input name="username" type="text" placeholder="Username">
    <input name="name" type="text" placeholder="Name">
    <input name="phone" type="number" placeholder="Phone">
    <input name="birthday" type="date" placeholder="Birth Day">
    <select class="" name="gender" id="">
        <option value="1">Admin</option>
        <option value="0">Mortal</option>
    </select>
    
    <select class="" name="gender" id="">
        <option value="1">Men</option>
        <option value="0">Women</option>
    </select>
    
    
    <input type="submit" value="SignUp">
  </form>
</div>

</body>
</html>