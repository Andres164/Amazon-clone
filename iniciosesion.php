
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <body style="background-color:lightskyblue;">
      <link rel="stylesheet" href="styleLogin.css">
      <tittle></tittle> 
   </body>   
    <h1>BIENVENIDO A AMAZON</h1>
</head>
      <form method="post" action="iniciosesion.php">
        <section class="form-login">
          <img src="img/amazon.png" alt=" Amazon"><br>
          <h4>"Inicio de sesion"</h4> 
     <label class="Controls" for="fname">Usuario:</label><br>
     <input class="Controls" type="text" id="fname" name="nombre_usuario" required><br>
     <label class="Controls" for="lname">Contraseña</label><br>
     <input class="Controls" type="password" id="lname" name="contra" required><br>
     <?php

     session_start();
     if(!empty($_POST['nombre_usuario'])) {
      require_once 'funciones/CRUD/usuarios.php';
      $usuario = mysqli_fetch_array( READ_usuario($_POST['nombre_usuario']) );
      if($_POST['contra'] == $usuario['contra']) {
        $_SESSION['logInUsuario'] = $_POST['nombre_usuario'];
        header('location: index.php');
      } else {
        echo '<h4 style="color: red;">Usuario y/o contraseña incorrecto</h4>';
      }
     }
      ?>
     <br>
       <a href="Register.php">Crear Cuenta.¿Eres nuevo en Amazon?</a>.<br>
       <br>
        <input class="button-add" type="submit" value="Iniciar Sesion">
     </section>
      </form>
</html>