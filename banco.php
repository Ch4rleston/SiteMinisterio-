<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'ministerio';

// Conecta-se ao banco de dados MySQL
$conn = new mysqli($servidor, $usuario, $senha, $banco);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

 ?>
