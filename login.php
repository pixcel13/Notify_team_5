<!DOCTYPE html>
<html lang="es-Mx">
<head>
  <title></title>

<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="wrapper">
  <div class="container">
  

  <form class="form-signin"> 
      <img src="img/Notify.png" alt="">
      <input type="email" id="inputEmail" placeholder="Usuario" name="usuario" required>
      <input type="password" id="inputPassword" placeholder="Contrase&ntilde;a" name="contraseña" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="login-button">Iniciar Sesi&oacute;n</button>
      </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>

    <script>
      //Primer parentesis siempre llevará selectores casi todos llevaran "" excepto unos selectores como document
      //Segundo parentesis llevará el evento se puede llamar una funcion anonima dentro del evento
      //Selector, evento, funcion
      $("#login-button").click(function () {
        // 1. Obtener el valor del email
        let correo = $("#inputEmail").val();
        // 2. Obtener el valor del password
        let password = $("#inputPassword").val();
        let obj = {
          "accion": "login",
          "usuario": correo,
          "password": password,
        };
        // 3. Enviar a validar esos valores
        //Tengo evento pero no selector
        $.post("includes/_funciones.php", obj, function (v) {
          // 4. En caso de no ser valido enviar mensaje de error
          if (v == 3) {
            $("#error").html("Campos vacios").fadeIn();
          }
          if (v == 2) {
            $("#error").html("Usuario Inexistente").fadeIn();
          }
          if (v == 0) {
            $("#error").html("Contraseña incorrecta").fadeIn();
            // 5. En caso de ser valido redireccionar a usuarios.php
          }
          if (v == 1) {
          header('Location: usuarios.php');
          }
        });
      });
    </script>

</body>
</html>