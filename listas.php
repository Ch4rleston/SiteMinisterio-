<!DOCTYPE html>
<?php // TODO: REPETIR OS ATRITBUTOS DO modal
// TODO: FAZER O EDITAR FUNCIONAR

 ?>

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
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" id="mySidebar">
      <button class=" item w3-bar-item w3-button w3-large"
      onclick="w3_close()"> <img src="imagens/close.png" style="margin-top: -5px;float:right;>" alt=""> </button>
      <a href="cadastros.php" class="w3-bar-item w3-button">cadastros</a>
      <a href="listas.php" class="w3-bar-item w3-button">listas</a>
    </div>
    <div id="main">
      <div class="w3-teal">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <div class="header-principal">
            <div class="logo-principal">
              <span>
                <img src="imagens/logo.png">
                <span >MINISTÉRIO INFANTIL</span><span> de Porto Alegre</span>
              </span>
            </div>
            <p class="informacao-principal" class="redi">
              <a  href="logout.php" class="botao"> LOGOUT
              </a>
            </p>
          </div>
        </div>
      </div>
      <!-- ----------------------------------------PROFESSORES-------------------------------------------------------------         -->
      <?php
      if ($_SESSION['nivel'] == 1) {
        ?>
        <div class="square inf inteiro">
          <!--Table-->
          <table class="table table-responsive-md table-striped">
            <thead>
              <p class="h4 text-center mb-4">PROFESSORES</p>
              <tr class="">
                <th class="pr-md-3 pr-5">CÓDIGO</th>
                <th class="pr-md-3 pr-5">NOME</th>
                <th class="pr-md-3 pr-5">TURMA</th>
                <th class="pr-md-3 pr-5">AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `id_professor`, `nm_professor`,`turma_professor`, `turma`.`nm_turma` as `turmap` FROM `professor`,`turma` WHERE `id_turma` = `turma_professor` ORDER BY `id_professor` ASC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo '<tr><td>'.$row["id_professor"].'</td><td>'.$row["nm_professor"].'</td><td>'.$row["turmap"].'</td><td><a href="#" data-toggle="modal" data-target="#modalProfessor" data-id_turma="'.$row["turma_professor"].'" data-turma_professor="'.$row["turmap"].'" data-id_professor="'.$row["id_professor"].'" data-nm_professor="'.$row["nm_professor"].'" class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idProfessor='.$row["id_professor"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" onclick="disable()" data-toggle="modal" data-target="#modalProfessor" data-id_turma="'.$row["turma_professor"].'" data-id_professor="'.$row["id_professor"].'" data-nm_professor="'.$row["nm_professor"].'" data-turma_professor="'.$row["turmap"].'" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      <?php } ?>
      <!-- ----------------------------------------PROFESSORES-------------------------------------------------------------         -->
      <!-- ----------------------------------------EVENTOS-------------------------------------------------------------         -->

      <div class="square inf inteiro">
        <!--Table-->
        <table class="table table-responsive-md table-striped">
          <thead>
            <p class="h4 text-center mb-4">EVENTOS</p>
            <tr class="">
              <th class="pr-md-3 pr-5">CÓDIGO</th>
              <th class="pr-md-3 pr-5">NOME</th>
              <th class="pr-md-3 pr-5">DATA</th>
              <th class="pr-md-3 pr-5">DESCRIÇÃO</th>
              <th class="pr-md-3 pr-5">AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT `id_evento`, `nm_evento`, `dt_hr_evento`, `descricao_evento` FROM `evento`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($_SESSION['nivel'] == 1) {
                  echo '<tr><td>'.$row["id_evento"].'</td><td>'.$row["nm_evento"].'</td><td>'.$row["dt_hr_evento"].'</td><td>'.$row["descricao_evento"].'</td><td><a href="#" data-toggle="modal" data-target="#modalEvento" data-id="'.$row["id_evento"].'" data-nome="'.$row["nm_evento"].'" data-datahora="'.$row["dt_hr_evento"].'" data-desc="'.$row["descricao_evento"].'" class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idEvento='.$row["id_evento"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" data-toggle="modal" data-target="#modalEvento" data-id="'.$row["id_evento"].'" data-nome="'.$row["nm_evento"].'" data-datahora="'.$row["dt_hr_evento"].'" data-desc="'.$row["descricao_evento"].'" onclick="disable()" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }else {
                  echo '<tr><td>'.$row["id_evento"].'</td><td>'.$row["nm_evento"].'</td><td>'.$row["dt_hr_evento"].'</td><td>'.$row["descricao_evento"].'</td><td><a href="#" data-toggle="modal" data-target="#modalEvento" data-id="'.$row["id_evento"].'" data-nome="'.$row["nm_evento"].'" data-datahora="'.$row["dt_hr_evento"].'" data-desc="'.$row["descricao_evento"].'" onclick="disable()" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- ----------------------------------------EVENTOS-------------------------------------------------------------         -->
      <!-- ----------------------------------------RECADOS-------------------------------------------------------------         -->

      <div class="square inf inteiro">
        <!--Table-->
        <table class="table table-responsive-md table-striped">
          <thead>
            <p class="h4 text-center mb-4">RECADOS</p>
            <tr class="">
              <th class="pr-md-3 pr-5">CÓDIGO</th>
              <th class="pr-md-3 pr-5">AUTOR</th>
              <th class="pr-md-3 pr-5">PARA</th>
              <th class="pr-md-3 pr-5">TITULO</th>
              <th class="pr-md-3 pr-5">DATA</th>
              <th class="pr-md-3 pr-5">RECADO</th>
              <th class="pr-md-3 pr-5">AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT `id_recado`, `autor_recado`, `destino_recado`, `titulo_recado`, `dt_hr_recado`, `descricao_recado` FROM `recado`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($_SESSION['nivel'] == 1) {
                  echo '<tr><td>'.$row["id_recado"].'</td><td>'.$row["autor_recado"].'</td><td>'.$row["destino_recado"].'</td><td>'.$row["titulo_recado"].'</td><td>'.$row["dt_hr_recado"].'</td><td>'.$row["descricao_recado"].'</td><td><a href="#" data-toggle="modal" data-target="#modalRecado" data-id_recado="'.$row["id_recado"].'" data-autor_recado="'.$row["autor_recado"].'" data-destino_recado="'.$row["destino_recado"].'" data-titulo_recado="'.$row["titulo_recado"].'" data-dt_hr_recado="'.$row["dt_hr_recado"].'" data-descricao_recado="'.$row["descricao_recado"].'" class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idRecado='.$row["id_recado"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" onclick="disable()" data-toggle="modal" data-target="#modalRecado" data-id_recado="'.$row["id_recado"].'" data-autor_recado="'.$row["autor_recado"].'" data-destino_recado="'.$row["destino_recado"].'" data-titulo_recado="'.$row["titulo_recado"].'" data-dt_hr_recado="'.$row["dt_hr_recado"].'" data-descricao_recado="'.$row["descricao_recado"].'"  class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }else{
                  echo '<tr><td>'.$row["id_recado"].'</td><td>'.$row["autor_recado"].'</td><td>'.$row["destino_recado"].'</td><td>'.$row["titulo_recado"].'</td><td>'.$row["dt_hr_recado"].'</td><td>'.$row["descricao_recado"].'</td><td><a href="#" onclick="disable()" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';

                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- ----------------------------------------RECADOS-------------------------------------------------------------         -->
      <!-- ----------------------------------------RELATÓRIOS-------------------------------------------------------------         -->

      <div class="square inf inteiro">
        <!--Table-->
        <table class="table table-responsive-md table-striped">
          <thead>
            <p class="h4 text-center mb-4">RELATÓRIOS</p>
            <tr class="">
              <th class="pr-md-3 pr-5">CÓDIGO</th>
              <th class="pr-md-3 pr-5">AUTOR</th>
              <th class="pr-md-3 pr-5">TITULO</th>
              <th class="pr-md-3 pr-5">DATA</th>
              <th class="pr-md-3 pr-5">DESCRIÇÃO</th>
              <th class="pr-md-3 pr-5">AÇÕES</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT `id_relatorio`, `autor_relatorio`, `titulo_relatorio`, `dt_hr_relatorio`, `descricao_relatorio` FROM `relatorio`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($_SESSION['nivel'] == 1 || $_SESSION['usuario'] == $row["autor_relatorio"]) {
                  echo '<tr><td>'.$row["id_relatorio"].'</td><td>'.$row["autor_relatorio"].'</td><td>'.$row["titulo_relatorio"].'</td><td>'.$row["dt_hr_relatorio"].'</td><td>'.$row["descricao_relatorio"].'</td><td><a href="#" data-toggle="modal" data-target="#modalRelatorio" data-id_relatorio="'.$row["id_relatorio"].'" data-autor_relatorio="'.$row["autor_relatorio"].'" data-titulo_relatorio="'.$row["titulo_relatorio"].'" data-dt_hr_relatorio="'.$row["dt_hr_relatorio"].'" data-descricao_relatorio="'.$row["descricao_relatorio"].'" class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idRelatorio='.$row["id_relatorio"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" onclick="disable()" data-toggle="modal" data-target="#modalRelatorio" data-id_relatorio="'.$row["id_relatorio"].'" data-autor_relatorio="'.$row["autor_relatorio"].'" data-titulo_relatorio="'.$row["titulo_relatorio"].'" data-dt_hr_relatorio="'.$row["dt_hr_relatorio"].'" data-descricao_relatorio="'.$row["descricao_relatorio"].'" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }else{
                  echo '<tr><td>'.$row["id_relatorio"].'</td><td>'.$row["autor_relatorio"].'</td><td>'.$row["titulo_relatorio"].'</td><td>'.$row["dt_hr_relatorio"].'</td><td>'.$row["descricao_relatorio"].'</td><td><a href="#" onclick="disable()" data-toggle="modal" data-target="#modalRelatorio" data-id_relatorio="'.$row["id_relatorio"].'" data-autor_relatorio="'.$row["autor_relatorio"].'" data-titulo_relatorio="'.$row["titulo_relatorio"].'" data-dt_hr_relatorio="'.$row["dt_hr_relatorio"].'" data-descricao_relatorio="'.$row["descricao_relatorio"].'" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- ----------------------------------------RELATÓRIOS-------------------------------------------------------------         -->
      <!-- ----------------------------------------USUÁRIOS-------------------------------------------------------------         -->
      <?php
      if ($_SESSION['nivel'] == 1) {
        ?>
        <div class="square inf inteiro">
          <!--Table-->
          <table class="table table-responsive-md table-striped">
            <thead>
              <p class="h4 text-center mb-4">USUÁRIOS</p>
              <tr class="">
                <th class="pr-md-3 pr-5">CÓDIGO</th>
                <th class="pr-md-3 pr-5">LOGIN</th>
                <th class="pr-md-3 pr-5">SENHA</th>
                <th class="pr-md-3 pr-5">NÍVEL</th>
                <th class="pr-md-3 pr-5">AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `id_usuario`, `login`, `senha`, `id_nivel`, `nivel`.`descricao_nivel` as `nivel_usuario` FROM `usuarios`,`nivel` WHERE `id_nivel`= `nivel_usuario` ORDER BY `id_usuario` ASC;";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo '<tr><td>'.$row["id_usuario"].'</td><td>'.$row["login"].'</td><td>'.$row["senha"].'</td><td>'.$row["nivel_usuario"].'</td><td><a href="#" data-toggle="modal" data-target="#modalUsuario" data-id_usuario="'.$row["id_usuario"].'" data-login="'.$row["login"].'" data-senha="'.$row["senha"].'" data-nivel_usuario="'.$row["nivel_usuario"].'"  data-id_nivel="'.$row["id_nivel"].'"  class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idUsuario='.$row["id_usuario"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" onclick="disable()" data-toggle="modal" data-target="#modalUsuario" data-id_usuario="'.$row["id_usuario"].'" data-login="'.$row["login"].'" data-senha="'.$row["senha"].'" data-nivel_usuario="'.$row["nivel_usuario"].'"  data-id_nivel="'.$row["id_nivel"].'" class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
      <!-- ----------------------------------------USUÁRIOS-------------------------------------------------------------         -->
      <!-- ----------------------------------------TURMAS-------------------------------------------------------------         -->
      <?php
      if ($_SESSION['nivel'] == 1) {
        ?>
        <div class="square inf inteiro">
          <!--Table-->
          <table class="table table-responsive-md table-striped">
            <thead>
              <p class="h4 text-center mb-4">TURMAS</p>
              <tr class="">
                <th class="pr-md-3 pr-5">CÓDIGO</th>
                <th class="pr-md-3 pr-5">NOME</th>
                <th class="pr-md-3 pr-5">AÇÕES</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT `id_turma`, `nm_turma` FROM `turma`";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo '<tr><td>'.$row["id_turma"].'</td><td>'.$row["nm_turma"].'</td><td><a href="#" data-toggle="modal" data-target="#modalTurma" data-id_turma="'.$row["id_turma"].'" data-nm_turma="'.$row["nm_turma"].'"  class="imgAc"><img src="imagens/edit.png" alt=""/></a><a href="salvarBanco.php?idTurma='.$row["id_turma"].'" class="imgAc"><img src="imagens/delete.png" alt=""/></a><a href="#" onclick="disable()"  data-toggle="modal" data-target="#modalTurma" data-id_turma="'.$row["id_turma"].'" data-nm_turma="'.$row["nm_turma"].'"   class="imgAc"><img src="imagens/eye.png" alt=""/></a></td></tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
      <!-- ----------------------------------------TURMAS-------------------------------------------------------------         -->
      <!-- ----------------------------------------MODAL EDIT-------------------------------------------------------------         -->
      <!-- -------------------------------MODAL EDIT EVENTO----------------------------------------------         -->

      <div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <span class="modal-title h4" id="exampleModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nome" class="control-label">Nome:</label>
                    <input name="nome" type="text" class="form-control" id="nome">
                  </div>
                  <div class="form-group">
                    <label for="datahora" class="control-label">Data:</label>
                    <input name="datahora" type="text" class="form-control" id="datahora">
                  </div>
                  <div class="form-group">
                    <label for="desc" class="control-label">Descricao:</label>
                    <textarea name="desc" class="form-control" id="desc"></textarea>
                  </div>
                  <input name="id" type="hidden" class="form-control" id="id" value="">
                  <div class="text-center">
                    <button type="submit"  name="updateEvento" class="botao alterar">ALTERAR</button>
                    <button type="button" class="botao" data-dismiss="modal">CANCELAR</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- -------------------------------MODAL EDIT EVENTO----------------------------------------------         -->
        <!-- -------------------------------MODAL EDIT RECADO----------------------------------------------         -->

        <div class="modal fade" id="modalRecado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <span class="modal-title h4" id="exampleModalLabel"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="autor_recado" class="control-label">Autor:</label>
                      <input name="autor_recado" type="text" class="form-control" id="autor_recado">
                    </div>
                    <div class="form-group">
                      <label for="destino_recado" class="control-label">Para:</label>
                      <input name="destino_recado" type="text" class="form-control" id="destino_recado">
                    </div>
                    <div class="form-group">
                      <label for="titulo_recado" class="control-label">Titulo:</label>
                      <input name="titulo_recado" type="text" class="form-control" id="titulo_recado">
                    </div>
                    <div class="form-group">
                      <label for="dt_hr_recado" class="control-label">Data:</label>
                      <input name="dt_hr_recado" type="text" class="form-control" id="dt_hr_recado">
                    </div>
                    <div class="form-group">
                      <label for="descricao_recado" class="control-label">Detalhes:</label>
                      <textarea name="descricao_recado" class="form-control" id="descricao_recado"></textarea>
                    </div>
                    <input name="id_recado" type="hidden" class="form-control" id="id_recado" value="">
                    <div class="text-center">
                      <button type="submit" name="updateRecado" class="botao alterar">ALTERAR</button>
                      <button type="button"  class="botao" data-dismiss="modal">CANCELAR</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- -------------------------------MODAL EDIT RECADO----------------------------------------------         -->
          <!-- -------------------------------MODAL EDIT PROFESSOR----------------------------------------------         -->

          <div class="modal fade" id="modalProfessor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <span class="modal-title h4" id="exampleModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="nm_professor" class="control-label">Nome:</label>
                        <input name="nm_professor" type="text" class="form-control" id="nm_professor">
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
                      <input name="id_professor" type="hidden" class="form-control" id="id_professor" value="">
                      <input name="id_turma" type="hidden" class="form-control" id="id_turma" value="">
                      <div class="text-center">
                        <button type="submit" name="updateProfessor" class="botao alterar">ALTERAR</button>
                        <button type="button" class="botao" data-dismiss="modal">CANCELAR</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------MODAL EDIT PROFESSOR----------------------------------------------         -->
            <!-- -------------------------------MODAL EDIT RELATÓRIO----------------------------------------------         -->

            <div class="modal fade" id="modalRelatorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <span class="modal-title h4" id="exampleModalLabel"></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="autor_relatorio" class="control-label">Autor:</label>
                          <input name="autor_relatorio" type="text" class="form-control" id="autor_relatorio">
                        </div>
                        <div class="form-group">
                          <label for="titulo_relatorio" class="control-label">Titulo:</label>
                          <input name="titulo_relatorio" type="text" class="form-control" id="titulo_relatorio">
                        </div>
                        <div class="form-group">
                          <label for="dt_hr_relatorio" class="control-label">Data:</label>
                          <input name="dt_hr_relatorio" type="text" class="form-control" id="dt_hr_relatorio">
                        </div>
                        <div class="form-group">
                          <label for="descricao_relatorio" class="control-label">Descrição:</label>
                          <textarea name="descricao_relatorio" class="form-control" id="descricao_relatorio"></textarea>
                        </div>
                        <input name="id_relatorio" type="hidden" class="form-control" id="id_relatorio" value="">
                        <div class="text-center">
                          <button type="submit" name="updateRelatorio" class="botao alterar">ALTERAR</button>
                          <button type="button" class="botao" data-dismiss="modal">CANCELAR</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- -------------------------------MODAL EDIT RELATÓRIO----------------------------------------------         -->
              <!-- -------------------------------MODAL EDIT USUÁRIO----------------------------------------------         -->

              <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <span class="modal-title h4" id="exampleModalLabel"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="login" class="control-label">Login:</label>
                            <input name="login" type="text" class="form-control" id="login">
                          </div>
                          <div class="form-group">
                            <label for="senha" class="control-label">Senha:</label>
                            <input name="senha" type="text" class="form-control" id="senha">
                          </div>
                          <div class="form-group">
                            <label for="nivel_usuario" class="control-label">Nivel:</label>
                            <input name="nivel_usuario" type="text" class="form-control" id="nivel_usuario">
                          </div>
                          <input name="id_usuario" type="hidden" class="form-control" id="id_usuario" value="">
                          <input name="id_nivel" type="hidden" class="form-control" id="id_nivel" value="">

                          <div class="text-center">
                            <button type="submit" name="updateUsuario" class="botao alterar">ALTERAR</button>
                            <button type="button" class="botao" data-dismiss="modal">CANCELAR</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- -------------------------------MODAL EDIT USUÁRIO----------------------------------------------         -->
                <!-- -------------------------------MODAL EDIT TURMA----------------------------------------------         -->

                <div class="modal fade" id="modalTurma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <span class="modal-title h4" id="exampleModalLabel"></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="salvarBanco.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="nm_turma" class="control-label">Login:</label>
                              <input name="nm_turma" type="text" class="form-control" id="nm_turma">
                            </div>

                            <input name="id_turma" type="hidden" class="form-control" id="id_turma" value="">
                            <div class="text-center">
                              <button type="submit" name="updateTurma" class="botao alterar">ALTERAR</button>
                              <button type="button" class="botao" data-dismiss="modal">CANCELAR</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- -------------------------------MODAL EDIT TURMA----------------------------------------------         -->
        <!-- ----------------------------------------MODAL EDIT-------------------------------------------------------------         -->

      </body>
    <?php } ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquerymask.js"></script>
    <script src="js/principal.js"></script>
    <script type="text/javascript">
    // -------------------evento-----------------------------------
    $('#modalEvento').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var nome = button.data('nome')
      var datahora = button.data('datahora')
      var desc = button.data('desc')

      var modal = $(this)
      modal.find('.modal-title').text('EVENTO')
      modal.find('#id').val(id)
      modal.find('#nome').val(nome)
      modal.find('#datahora').val(datahora)
      modal.find('#desc').val(desc)
    });
    $("#modalEvento").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------evento-----------------------------------
    // -------------------recado-----------------------------------
    $('#modalRecado').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_recado = button.data('id_recado')
      var autor_recado = button.data('autor_recado')
      var destino_recado = button.data('destino_recado')
      var titulo_recado = button.data('titulo_recado')
      var dt_hr_recado = button.data('dt_hr_recado')
      var recado = button.data('descricao_recado')

      var modal = $(this)
      modal.find('.modal-title').text('RECADO')
      modal.find('#id_recado').val(id_recado)
      modal.find('#autor_recado').val(autor_recado)
      modal.find('#destino_recado').val(destino_recado)
      modal.find('#titulo_recado').val(titulo_recado)
      modal.find('#dt_hr_recado').val(dt_hr_recado)
      modal.find('#descricao_recado').val(recado)


    });
    $("#modalRecado").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------recado-----------------------------------
    // -------------------relatorio-----------------------------------
    $('#modalRelatorio').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_relatorio = button.data('id_relatorio')
      var autor_relatorio = button.data('autor_relatorio')
      var titulo_relatorio = button.data('titulo_relatorio')
      var dt_hr_relatorio = button.data('dt_hr_relatorio')
      var descricao_relatorio = button.data('descricao_relatorio')

      var modal = $(this)
      modal.find('.modal-title').text('RELATÓRIO')
      modal.find('#id_relatorio').val(id_relatorio)
      modal.find('#autor_relatorio').val(autor_relatorio)
      modal.find('#titulo_relatorio').val(titulo_relatorio)
      modal.find('#dt_hr_relatorio').val(dt_hr_relatorio)
      modal.find('#descricao_relatorio').val(descricao_relatorio)


    });
    $("#modalRelatorio").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------relatorio-----------------------------------
    // -------------------professor-----------------------------------
    $('#modalProfessor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_professor = button.data('id_professor')
      var turma_professor = button.data('turma_professor')
      var nm_professor = button.data('nm_professor')
      var id_turma = button.data('id_turma')

      var modal = $(this)
      modal.find('.modal-title').text('PROFESSOR')
      modal.find('#id_professor').val(id_professor)
      modal.find('#turma_professor').val(turma_professor)
      modal.find('#id_turma').val(id_turma)
      modal.find('#nm_professor').val(nm_professor)
    });
    $("#modalProfessor").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------professor-----------------------------------
    // -------------------usuario-----------------------------------
    $('#modalUsuario').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_usuario = button.data('id_usuario')
      var login = button.data('login')
      var senha = button.data('senha')
      var nivel_usuario = button.data('nivel_usuario')
      var id_nivel = button.data('id_nivel')

      var modal = $(this)
      modal.find('.modal-title').text('USUÁRIO')
      modal.find('#id_usuario').val(id_usuario)
      modal.find('#login').val(login)
      modal.find('#senha').val(senha)
      modal.find('#id_nivel').val(id_nivel)
      modal.find('#nivel_usuario').val(nivel_usuario)

    });
    $("#modalUsuario").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------usuario-----------------------------------
    // -------------------turma-----------------------------------
    $('#modalTurma').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_turma = button.data('id_turma')
      var nm_turma = button.data('nm_turma')

      var modal = $(this)
      modal.find('.modal-title').text('TURMA')
      modal.find('#id_turma').val(id_turma)
      modal.find('#nm_turma').val(nm_turma)
    });
    $("#modalTurma").on("hidden.bs.modal", function () {
      enable();
    });
    // -------------------turma-----------------------------------
    </script>
    </html>
