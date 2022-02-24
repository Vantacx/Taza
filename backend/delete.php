<?php  
    if (isset($_GET['id'])) {
        include '../config/config.php';
        $id=$_GET['id'];
        $sql = "DELETE FROM publicaciones WHERE id_pub = $id";
        $stmt = $conn-> prepare($sql);
    
        if ($stmt -> execute()) {
            header('Location: ../Vistas/principal/index.php');
        }else{
            echo "Error";
        }
    }