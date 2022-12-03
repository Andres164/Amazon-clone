<!DOCTYPE html>
<html>
<head>
  <body style="background-color:lightskyblue;">
      <link rel="stylesheet" href="styleLogin.css">
      <tittle></tittle> 
   </body>   
</head>
 <h1>BIENVENIDO A AMAZON</h1>
      <form method="POST" action="Register.php">
        <section class="form-login">
          <img src="img/amazon.png" alt="Amazon"><br>
          <h4>"Crea tu cuenta"</h4> 
      <label class="Controls" for="fname">Correo electronico:</label><br>
     <input class="Controls" type="email" id="fname" required name="correo_electronico"><br>    
     <label class="Controls" for="fname">Crear usuario:</label><br>
     <input class="Controls" type="text" id="fname" required name="nombre_usuario"><br>
     <label class="Controls" for="lname">Crear contraseña:</label><br>
     <input class="Controls" type="password" id="lname" required name="contra"><br>
     <label class="Controls" for="lname">Confirmar Contraseña:</label><br>
     <input class="Controls" type="password" id="lname" required name="repiteContra"><br>
     <?php
     session_start();   

     if(isset($_POST['correo_electronico']) && $_POST['contra'] != $_POST['repiteContra']) {
        echo '<h4 style="color: red;">Las contraseñas no coinciden</h4>';
      } else if(isset($_POST['correo_electronico'])) {
        require_once 'funciones/CRUD/usuarios.php';
        CREATE_usuario($_POST['nombre_usuario'], $_POST['correo_electronico'], $_POST['contra']);
        echo '<h4 style="color: green;">Usuario registrado correctamente. Redireccionando</h4>';
        $_SESSION['logInUsuario'] = $_POST['nombre_usuario'];
        header("Refresh:2; url=index.php");
      }

        ?>
     <br>
       <input type="radio" name="gender" value="Al crear una cuenta, aceptas las condiciones de uso y el Aviso de Privacidad de Amazon" required>Al crear una cuenta, aceptas las<a href="#"> Condiciones de uso </a> y el <a href="#">Aviso de Privacidad</a> de Amazon<br>
      <br>
      <input class="button-add" type="submit" value="Registrar">
     </section>
      </form>
</html>