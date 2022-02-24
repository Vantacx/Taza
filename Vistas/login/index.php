<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }
  require '../../config/config.php';
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    if ($results != false && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: ../principal/index.php");
    } else {
      $message = "<script>
      Swal.fire({
        icon: 'warning',
        title: ':/',
        text: 'El usuario o la contraseña no son correctos'
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
    <link rel="stylesheet" href="/Taza/public/css/style.css">
    <title>Login</title>
</head>
<body class="loginreg__fondo login__margin">
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <h1 class="loginreg__titulo">Inicio de sesión</h1>
    <span>Tambien puedes: <a href="../registro/index.php">Registrarte</a></span>
    <form action="index.php" method="POST" class="login__form">
      <input id="nombre" name="username" placeholder="Nombre de usuario..." type="text" required class="login__form__input">
      <br>
      <input id="password" name="password" placeholder="Contraseña..." type="password" required class="login__form__input">
      <br>
      <input type="submit" class="loginreg__form__submit">
    </form>
</body>
</html>