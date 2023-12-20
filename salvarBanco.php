<?php
include("banco.php");
// ------------------------------LOGAR------------------------
if(isset($_POST['logar'])){
  $sql = "SELECT `nivel_usuario` FROM `usuarios` WHERE `login` = '".$_POST["loginUsuario"]."' AND `senha` = '".$_POST["senhaUsuario"]."' LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['usuario'] = $_POST['loginUsuario'];
    $_SESSION['nivel'] = $row['nivel_usuario'];
    header("location: cadastros.php");
  }else{
      header("location: login.php?error=1");
  }
}
// ------------------------------LOGAR------------------------

// ------------------------------RECADO------------------------
// ---------INSERIR---------
if(isset($_POST['dadosRecado'])){
  $sql = "INSERT INTO `recado`(`autor_recado`, `destino_recado`, `titulo_recado`, `dt_hr_recado`, `descricao_recado`) VALUES ('".$_POST["autor"]."','".$_POST["para"]."','".$_POST["titulo"]."','".$_POST["dt"]."','".$_POST["recado"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idRecado'])){
  $sql = "DELETE FROM `recado` WHERE `id_recado` = ".$_GET['idRecado']." ;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateRecado'])){
  $sql = "UPDATE `recado` SET `autor_recado`='".$_POST["autor_recado"]."',`destino_recado`='".$_POST["destino_recado"]."',`titulo_recado`='".$_POST["titulo_recado"]."',`dt_hr_recado`='".$_POST["dt_hr_recado"]."',`descricao_recado`='".$_POST["descricao_recado"]."' WHERE `id_recado`= '".$_POST["id_recado"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------RECADO------------------------
// ------------------------------USUÁRIO------------------------
// ---------INSERIR---------
if(isset($_POST['dadosUsuario'])){
  $sql = "INSERT INTO `usuarios`(`login`, `senha`, `nivel_usuario`) VALUES ('".$_POST["login"]."','".$_POST["senha"]."','".$_POST["nivel"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idUsuario'])){
  $sql = "DELETE FROM `usuarios` WHERE `id_usuario` = ".$_GET['idUsuario']." AND `id_usuario` != 1;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateUsuario'])){
  $sql = "UPDATE `usuarios` SET `login`='".$_POST["login"]."',`senha`='".$_POST["senha"]."',`nivel_usuario`='".$_POST["id_nivel"]."' WHERE `id_usuario`= '".$_POST["id_usuario"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------USUÁRIO------------------------
// ------------------------------TURMA------------------------
// ---------INSERIR---------
if(isset($_POST['dadosTurma'])){
  $sql = "INSERT INTO `turma`(`nm_turma`) VALUES ('".$_POST["nomeTurma"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idTurma'])){
  $sql = "DELETE FROM `turma` WHERE `id_turma` = ".$_GET['idTurma']." ;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateTurma'])){
  $sql = "UPDATE `turma` SET `nm_turma`='".$_POST["nm_turma"]."' WHERE `id_turma`= '".$_POST["id_turma"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------TURMA------------------------
// ------------------------------EVENTO------------------------
// ---------INSERIR---------
if(isset($_POST['dadosEvento'])){
  $sql = "INSERT INTO `evento`(`nm_evento`, `dt_hr_evento`, `descricao_evento`) VALUES ('".$_POST["nomeEvento"]."','".$_POST["dataEvento"]."','".$_POST["descricaoEvento"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idEvento'])){
  $sql = "DELETE FROM `evento` WHERE `id_evento` = ".$_GET['idEvento']." ;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateEvento'])){
  $sql = "UPDATE `evento` SET `nm_evento`='".$_POST["nome"]."',`dt_hr_evento`='".$_POST["datahora"]."',`descricao_evento`='".$_POST["desc"]."' WHERE `id_evento`= '".$_POST["id"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------EVENTO------------------------
// ------------------------------RELATÓRIO------------------------
// ---------INSERIR---------
if(isset($_POST['dadosRelatorio'])){
  $sql = "INSERT INTO `relatorio`(`autor_relatorio`, `titulo_relatorio`, `dt_hr_relatorio`, `descricao_relatorio`) VALUES ('".$_POST["nome"]."','".$_POST["titulo"]."','".$_POST["dataRelatorio"]."','".$_POST["descricaoRelatorio"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idRelatorio'])){
  $sql = "DELETE FROM `relatorio` WHERE `id_relatorio` = ".$_GET['idRelatorio']." ;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateRelatorio'])){
  $sql = "UPDATE `relatorio` SET `autor_relatorio`='".$_POST["autor_relatorio"]."',`titulo_relatorio`='".$_POST["titulo_relatorio"]."',`dt_hr_relatorio`='".$_POST["dt_hr_relatorio"]."',`descricao_relatorio`='".$_POST["descricao_relatorio"]."' WHERE `id_relatorio`= '".$_POST["id_relatorio"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------RELATÓRIO------------------------
// ------------------------------PROFESSOR------------------------
// ---------INSERIR---------
if(isset($_POST['dadosProfessor'])){
  $sql = "INSERT INTO `professor`(`nm_professor`, `turma_professor`) VALUES ('".$_POST["nome"]."','".$_POST["turma"]."')";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------DELETAR---------
if(isset($_GET['idProfessor'])){
  $sql = "DELETE FROM `professor` WHERE `id_professor` = ".$_GET['idProfessor']." ;";
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "DELETADO COM SUCESSO";
  }
  $conn->close();
  header('Location: listas.php');
}
// ---------UPDATE---------
if(isset($_POST['updateProfessor'])){
  $sql = "UPDATE `professor` SET `nm_professor`='".$_POST["nm_professor"]."',`turma_professor`='".$_POST["turma"]."' WHERE `id_professor`= '".$_POST["id_professor"]."' ;";
  if ($conn->query($sql) === TRUE) {
    echo "<script type=\"text/javascript\">alert('Sucesso!');</script>";
  } else {
    echo "<script type=\"text/javascript\">alert('$conn->error');</script>";
  }
  $conn->close();
  header('Location: listas.php');
}
// ------------------------------PROFESSOR------------------------
?>
