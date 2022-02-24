<?php 
session_start();
	if (!isset($_GET['id'])) {
		header('Location: ../principal/index.php');
	}

	


	if (!isset($_SESSION['user_id'])) {
		header('Location: ../login/index.php');
	}elseif(isset($_SESSION['user_id'])){
		include '../../config/config.php';
		$id = $_GET['id'];
		$sql = "SELECT * FROM publicaciones WHERE id_pub = $id";
        $stmt = $conn-> prepare($sql);
		$stmt->execute();
		$data = $stmt->fetch(PDO::FETCH_OBJ);
	}else{
		echo "Error en el sistema";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon.png">
    <link rel="stylesheet" href="/Taza/public/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <title>Editar</title>
</head>
<body>
    <div class="card card-body">
        <h1 class="titulo__modal">Editar el mensaje</h1>
        <form action="../../backend/editProcess.php" method="POST">
        <div class="form-group">
        <h2 class="centrado_elements">Titulo:</h2>
        <input type="text" name="title" required class="form-control" value="<?php echo $data->title ?>" >
        </div>
        <div class="form-group">
        <h2 class="centrado_elements">Publicacion:</h2>
        <textarea type="text" name="description" rows="5" class="form-control" required><?php echo $data->description ?></textarea>
        </div>
        <input type="hidden" name="oculto">
        <input type="text" name="id2" hidden value="<?php echo $data->id_pub?>">
        <input type="submit" name="" class="btn btn-success btn-block" value="Actualizar">
        </form>
    </div>
    
    
</body>
</html>