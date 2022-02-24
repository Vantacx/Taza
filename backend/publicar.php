<?php
session_start();
require('../config/config.php');
$message='';
  if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['usuario']) && isset($_SESSION['user_id'])) {
    $sql = "INSERT INTO publicaciones(title, description, usuario, id_usuario_pub) VALUES (:title, :description, :usuario, :id_usuario_pub)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->bindParam(':id_usuario_pub', $_SESSION['user_id']);
    if($stmt->execute()) {
      $message = "";
    }
    header('Location: ../Vistas/principal/index.php');
  }
?>