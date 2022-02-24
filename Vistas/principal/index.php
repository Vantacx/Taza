<?php
  session_start();
  require '../../config/config.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
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
    <link rel="stylesheet" href="/Taza/public/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Principal</title>
</head>
<body class="principal__body principal__margin">
    <header class="principal__header">
        <a href="../cafe/index.php">Cafe
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-high-fill" viewBox="0 0 16 16">
                <path d="M8 3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 3zm8 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zm-13.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1h2zm11.157-6.157a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm-9.9 2.121a.5.5 0 0 0 .707-.707L3.05 5.343a.5.5 0 1 0-.707.707l1.414 1.414zM8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4z"/>
            </svg>
        </a> //
        <a href="../contacto/index.php">Contáctame
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
        </a> //
        <a href="../aboutus/index.php">Sobre nosotros
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-diamond-fill" viewBox="0 0 16 16">
                <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM5.495 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
            </svg>
        </a> //
        <a href="../../backend/logout.php" class="principal__link">Cerrar sesion
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
            </svg>
        </a> //
        <?php if(!empty($user)): ?>
        <p style="text-align:center; display:inline"><b>Bienvenid@ <?= $user['username'];?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
        </svg>
    </b></p>
        <?php else: ?>
        <?php endif; ?>
    </header>
    <h2 class="principal__titulo">-Una taza de historias y aventuras-</h2>
    <div class="row">
        <div class="col-md-9">
            <section class="principal__section">
                <br>
                <h2 class="centrado__elements">¿Por que no nos cuentas alguna cosa?</h2>
                <article class="">
                    <h3 class="centrado__elements">Ten la libertad de expresarte</h3>
                    <p class="centrado__elements" style="margin-bottom: 5px">&darr; Dale click al boton de abajo y escribe &darr;</p>
                </article>
                <input type="checkbox" id="btn-modal">
                <label for="btn-modal" class="principal__section__boton">Publicar</label>
                <div class="modal">
                    <div class="contenedor">
                        <div class="card card-body">
                            <label for="btn-modal">X</label>
                            <?php if(!empty($user)): ?>
                            <h1 class="titulo__modal">¿Que deseas escribir?</h1>
                            <form action="../../backend/publicar.php" method="POST">
                                <input type="text" name="usuario" class="inv" value="<?= $user['username'];?>" required>
                                <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Titulo de la publicacion" required>
                                </div>
                                <div class="form-group">
                                <textarea name="description" rows="2" class="form-control" placeholder="Publicacion" required></textarea>
                                </div>
                                <input type="submit" name="save_task" class="btn btn-success btn-block" value="Publicar">
                            </form>
                            <?php else: ?>
                                <h2 class='centrado__elements'>Lo siento, debes iniciar sesion para poder publicar</h2>
                                <h1 class='centrado__elements'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-emoji-dizzy-fill' viewBox='0 0 16 16'>
                                <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.146 5.146a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 1 1 .708.708l-.647.646.647.646a.5.5 0 1 1-.708.708L5.5 7.207l-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zm5 0a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 1 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 0-.708zM8 13a2 2 0 1 1 0-4 2 2 0 0 1 0 4z'/>
                                </svg>
                                </h1>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </section>
            <section class="principal__section">
                <?php if(!empty($user)): ?>
                <?php 
                
                $sql = "SELECT * FROM publicaciones";
                $query = $conn -> prepare($sql);
                $query -> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                if($query -> rowCount() > 0){
                    // El ciclo for es para mostrar los resultados
                    foreach ($results as $dato) {
                        ?>
                        <div class="p">
                            <h1 class='centrado__elements font_1'>-<?php echo $dato -> title ?>-</h1>
                            <p class='centrado__elements'>Escrito por <b><?php echo $dato -> usuario ?></b> el <?php echo $dato -> created_at ?></p>
                            <p class='justify p'><?php echo $dato -> description ?></p><br>
                            <?php
                            if ($dato->id_usuario_pub==$_SESSION['user_id']) {
                                ?>
                                <a href="../../backend/delete.php?id=<?php echo $dato -> id_pub ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="../edit/index.php?id=<?php echo $dato -> id_pub; ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <?php  
                            }
                            ?>
                        </div>
                        <?php
                    }

                }
                ?>
                <?php else: echo 
                "<h1 class='centrado__elements'>No has iniciado sesión</h1>
                <h2 class='centrado__elements'>Podras ver las publicaciones cuando inicies la sesion</h2>
                "
                ?>
                <?php endif; ?>
            </section>
        </div>
        <div class="col-md-3">
            
            <aside class="principal__aside card card-body">
                <img src="../../assets/img/logoweb.png" alt=""><br>
                <h2 class="title">Siguenos:</h2>
                <div class="justify">
                    <a href="https://www.facebook.com/profile.php?id=100075453751427" target="_blank" style="color:dodgerblue;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                        Facebook
                    </a>
                    <br>
                    <a href="https://www.instagram.com/duartee22413/?hl=es-la" target="_blank" style="color:#bc2a8d;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                        Instagram
                    </a>
                </div>
                <br>
                <h2>Datos curiosos:</h2>
                <p>Estudios han demostrado que la lectura ayuda a prevenir el Alzheimer, debido a que recibiendo nueva informacion al leer, 
                    el cerebro se ejercita de buena forma, y se entrena la memoria para que continue su corrrecto funcionamiento durante la vejez. 
                </p>
                <h5>♦</h5>
                <p>Leer reduce el estres y la tension. Despues de un dia de trabajo puedes leer un rato para relajarte ya que la 
                    lectura ayuda a la imaginacion, cosa que disminuye los niveles de estres.
                </p>
                <h5>♦</h5>
                <p>La lectura practicada regularmente mejora el lexico y expande el vocabulario. Si lees en voz alta a modo de ejercicio, memorizaras mayor cantidad de palabras 
                    que puedes usar en tus conversaciones y diario vivir. Tambien la lectura nos hace personas mucho mas cultas
                </p>
            </aside>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 | Harold Rafael Martínez Martínez y David Santiago Duarte Niño
        </div>
    </footer>   
</body>
</html>