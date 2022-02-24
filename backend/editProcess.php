<?php 
if (!isset($_POST['oculto'])) {
    header('Location: ../Vistas/principal/index.php');
}

include '../config/config.php';

$id2 = $_POST['id2'];
$titulo = $_POST['title'];
$descripcion = $_POST['description'];

$sql = "UPDATE publicaciones SET title = '$titulo', description = '$descripcion'
WHERE id_pub = $id2";
$stmt = $conn-> prepare($sql);
if ($stmt->execute()) {
    header('Location: ../Vistas/principal/index.php');
}else{
    echo "Error";
}


?>