<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/icono-PhotoRoom.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/Taza/public/css/style.css">
    <title>Contacto</title>
</head>
<body class="contacto__body">
    <form method="post" action="https://formsubmit.co/recibidor29248@gmail.com" class="contacto__form">
        <h1 class="centrado__elements">Contacto</h1>
        <input type="text" name="nombre" placeholder="Nombre" class="contacto__form__input" required>
        <input type="email" name="email" placeholder="Email" class="contacto__form__input" required>
        <input type="tel" name="telefono" placeholder="Telefono" class="contacto__form__input" required>
        <textarea name="mensaje" cols="30" rows="3" placeholder="Mensaje" class="contacto__form__input" required></textarea>
        <button name="submit" type="submit" data-submit="...Enviando?" class="contacto__submit">Enviar</button>
        </form>
        
    </form>
</body>
</html>