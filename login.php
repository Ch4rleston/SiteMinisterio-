<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/principal.css"/>
<?php include("banco.php");
session_start();
if(isset($_SESSION['usuario'])){
  header("location: cadastros.php");
}

if(isset($_GET['error'])){
  echo '<script type="text/javascript">alert("LOGIN INVÁLIDO!");</script>';
}
?>
  <title>Ministério Infantil - POA</title>
  <link rel="icon" href="imagens/logo.png">
</head>
<body>
  <!-- --------------------TOPO---------------------------- -->
  <div id="topo">
    <span class="textoTopo">
      <img class="icontopo" src="imagens/logo.png">
      <span class="titulo">MINISTÉRIO INFANTIL</span>
      <span class="menor"> de Porto Alegre</span>
    </span>
    <a class="redi" href="index.php">INÍCIO</a>
  </div>
</div>
<!-- ------------------------------------------------ -->
<!-- ------------------------LOGIN------------------------ -->
<div class="container">

  <div class="login">
    <div class="h4 text-center">LOGIN</div>
      <form action="salvarBanco.php" method="post">
        <!-- NOME =============================================== -->
        <div class="form-group" method="post">
          <label for="loginUsuario">Identificação de usuário:</label>
          <input class="form-control" type="text" name="loginUsuario" value="" required>
        </div>
        <!-- SENHA ===============================================-->
        <div class="form-group" method="post">
          <label for="senhaUsuario">Senha:</label>
          <input type="password" class="form-control" name="senhaUsuario" required>
        </div>
        <!-- ENVIAR =============================================== -->
        <div class="form-group text-center">
          <input class="botao" type="submit" name="logar" value="LOGIN">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ------------------------------------------------ -->

</body>
</html>
