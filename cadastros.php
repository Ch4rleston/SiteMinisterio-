<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/w3.css"/>
  <link rel="stylesheet" href="css/principal.css"/>
  <?php include('banco.php'); ?>
  <title>Ministério Infantil - POA</title>
  <link rel="icon" href="imagens/logo.png">
</head>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("location:login.php");
} else {
 ?>
<body>
  <!-- ----------------------------MENU DO LADO----------------------------- -->
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" id="mySidebar">
    <button class=" item w3-bar-item w3-button w3-large"
    onclick="w3_close()"> <img src="imagens/close.png" style="margin-top: -5px;float:right;>" alt=""> </button>
    <a href="cadastros.php" class="w3-bar-item w3-button">cadastros</a>
    <a href="listas.php" class="w3-bar-item w3-button">listas</a>
  </div>
  <!-- ----------------------------MENU DO LADO----------------------------- -->

  <!-- ----------------------------TOPO FECHADO----------------------------- -->

  <div id="main">
    <div class="w3-teal">
      <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
      <div class="w3-container">
        <div class="header-principal">
          <div class="logo-principal"></div>
          <p class="informacao-principal">
            <a href="logout.php" class="botao"> LOGOUT
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- ----------------------------TOPO FECHADO----------------------------- -->

    <!-- ----------------------------RECADO----------------------------- -->

    <div class="square inf meio">
      <p class="h4 text-center mb-4">RECADO</p>
      <form class="" action="salvarBanco.php" method="post">
        <input type="hidden" name="autor" value="<?php echo $_SESSION['usuario']; ?>">
        <input type="hidden" name="dt" value="<?php echo date("d/m/Y H:i");?>">
        <div class="form-group" method="post">
          <label for="para">Para:</label>
          <input class="form-control" type="text" name="para" value="" required>
        </div>
        <div class="form-group" method="post">
          <label for="titulo">Titulo:</label>
          <input class="form-control" type="text" name="titulo" value="" required>
        </div>
        <div class="form-group" method="post">
          <label for="recado">Recado:</label><br>
          <textarea name="recado" class="inteiro" rows="8" required></textarea>
        </div>
        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosRecado" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
    <!-- ----------------------------RECADO----------------------------- -->

    <!-- ----------------------------RELATÓRIO----------------------------- -->

    <div class="square inf meio">
      <p class="h4 text-center mb-4">RELATÓRIO</p>
      <form class="" action="salvarBanco.php" method="post">
        <input class="form-control" type="hidden" name="nome" value="<?php echo $_SESSION['usuario']; ?>" required>
        <div class="form-group" method="post">
          <label for="titulo">Titulo:</label>
          <input class="form-control" type="text" name="titulo" value="" required>
        </div>
        <div class="form-group" method="post">
          <label for="dataRelatorio">Data:</label>
          <input class="form-control datetime" type="text" name="dataRelatorio" value="0000000000000" required>
        </div>
        <div class="form-group" method="post">
          <label for="descricaoRelatorio">Descrição:</label><br>
          <textarea name="descricaoRelatorio" class="inteiro" rows="8" required></textarea>
        </div>
        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosRelatorio" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
    <!-- ----------------------------RELATÓRIO----------------------------- -->

    <!-- ----------------------------EVENTO----------------------------- -->

    <div class="square inf meio">
      <p class="h4 text-center mb-4">EVENTO</p>
      <form class="" action="salvarBanco.php" method="post">
        <div class="form-group" method="post">
          <label for="nomeEvento">Nome:</label>
          <input class="form-control maior" type="text" name="nomeEvento" value="" required>
        </div>
        <div class="form-group" method="post">
          <label for="dataEvento">Data:</label>
          <input class="form-control maior datetime" type="text" name="dataEvento" value="00000000000" required>
        </div>
        <div class="form-group" method="post">
          <label for="descricaoEvento">Descrição:</label>
          <textarea name="descricaoEvento" class="inteiro" rows="8" required></textarea>
        </div>
        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosEvento" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
    <!-- ----------------------------EVENTO----------------------------- -->

    <!-- ----------------------------TURMAS----------------------------- -->
    <?php
    if ($_SESSION['nivel'] == 1) {
     ?>
    <div class="square inf meio">
      <p class="h4 text-center mb-4">TURMA</p>
      <form class="" action="salvarBanco.php" method="post">
        <div class="form-group" method="post">
          <label for="nomeTurma">Nome:</label>
          <input class="form-control maior" type="text" name="nomeTurma" value="" required>
        </div>

        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosTurma" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
  <?php } ?>
    <!-- ----------------------------TURMAS----------------------------- -->
    <!-- ----------------------------PROFESSOR----------------------------- -->
<?php
if ($_SESSION['nivel'] == 1) {
 ?>
    <div class="square inf meio">
      <p class="h4 text-center mb-4">PROFESSOR</p>
      <form class="" action="salvarBanco.php" method="post">
        <div class="form-group" method="post">
          <label for="nome">Nome:</label>
          <input class="form-control" type="text" name="nome" value="" required>
        </div>

        <div class="form-group">
          <label for="turma">Turma:</label>
          <select name="turma" class="form-control">
            <option selected required>Escolha a turma...</option>
            <?php
            $sql = "SELECT `id_turma`, `nm_turma` FROM `turma`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["id_turma"].'">'.$row["nm_turma"].'</option>';
              }
            }
            ?>
          </select>
        </div>

        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosProfessor" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
    <?php } ?>
    <!-- ----------------------------PROFESSOR----------------------------- -->

    <!-- ----------------------------USUÁRIO----------------------------- -->
    <?php
    if ($_SESSION['nivel'] == 1) {
     ?>
    <div class="square inf meio">
      <p class="h4 text-center mb-4">USUÁRIO</p>

      <form class="" action="salvarBanco.php" method="post">
        <input type="hidden" name="nivel" value="2">
        <div class="form-group" method="post">
          <label for="login">Login:</label>
          <input class="form-control" type="text" name="login" value="" required>
        </div>
        <div class="form-group" method="post">
          <label for="senha">Senha:</label>
          <input class="form-control" type="text" name="senha" value="" required>
        </div>

        <div class="form-group text-center" method="post">
          <button type="submit" name="dadosUsuario" class="botao">ENVIAR</button>
        </div>
      </form>
    </div>
  <?php } ?>
    <!-- ----------------------------USUÁRIO----------------------------- -->



  </body>
<?php } ?>
  <script src="js/jquery.js"></script>
  <script src="js/jquerymask.js"></script>
  <script src="js/principal.js"></script>
  </html>
