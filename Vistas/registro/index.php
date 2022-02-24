<?php

  require '../../config/config.php';

  $message = '';

  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = "<script>
      Swal.fire({
        icon: 'success',
        title: ':)',
        text: 'Usuario registrado correctamente'
      })
      </script>";
      
    } else {
      $message = "<script>
      Swal.fire({
        icon: 'error',
        title: ':(',
        text: 'Tenemos problemas para registrar tu usuario'
      })
      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/icono-PhotoRoom.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../public/js/js.js"></script>
    <link rel="stylesheet" href="/Taza/public/css/style.css">
    <title>Registro</title>
</head>
<body class="loginreg__fondo register__margin">

  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>
    
  <h1 class="loginreg__titulo">Registro</h1>
  <span>Tambien puedes: <a href="../login/index.php">Iniciar sesion</a></span>
  <form action="index.php" method="POST" class="register__form">
    <input type="text" name="username" placeholder="Nombre de usuario..." required class="register__form__input"><br>
    <input type="email" name="email" placeholder="Correo electrónico..." required class="register__form__input"><br>
    <input type="password" name="password" placeholder="Contraseña..." required class="register__form__input"><br>
    <input type="password" name="confirm_password" placeholder="Repetir contraseña..." 
    required class="register__form__input"><br>
    <input type="submit" class="loginreg__form__submit">
  </form>
</body>
</html>