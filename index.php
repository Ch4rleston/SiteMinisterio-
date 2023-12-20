<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="css/carousel.css"/>
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/principal.css"/>

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
    <a class="redi" href="login.php">PORTAL</a>
  </div>
</div>
<!-- ------------------------------------------------ -->
<!-- ------------------------IMAGEM------------------------ -->
<div class="image">
<img class="imagemImage" src="imagens/1.jpg" alt="imagem">
</div>
<hr >

<!-- ------------------------------------------------ -->
<div class="sobre">
  <h1 class="titulossobre">SOBRE</h1>
  <div>
    <div id=frase>“Educa a criança no caminho em que deve andar; e até quando envelhecer não se desviará dele.”
      (Provérbios 22:6).</div>
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Igreja é lugar de criança feliz.
      Crianças são futuro. Poucas coisas são mais importantes do que prepará-las para o amanhã.
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Como pais e tutores, reconhecemos nossos limites como educadores.
      Essa é a razão que nos leva a confiá-los a instituições de ensino e que também deveria levá-los à Igreja.
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expressamos cuidado e visão ao proporcionar aos nossos pequenos esporte, lazer, cultura, saúde e formação.
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Princípios e valores morais, éticos e familiares, quando absorvidos na infância – na fase em que o
      caráter está sendo formado, transformam-se em balizas para o resto da vida.
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Criar oportunidades para que tenham suas experiências pessoais, para que escrevam suas
      histórias com Deus e para que aprendam sobre sua fé é obrigação e responsabilidade de todos nós.
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      O Ministério Infantil acontece em paralelo aos cultos, nos mesmos dias e horários.
      As crianças são divididas em classes por idade. Há, também, berçário e diversas outras atividades.
    </div>
  </div>
  <hr>
  <!-- ----------------------CONTATO-------------------------- -->

  <div class="contatosDiv">
    <div class="tituloscontato">
      INFORMAÇÕES
    </div>
    <div class="form">
      <div class="titulocontato">
      ENTRE EM CONTATO
    </div>
      <div class="textocontatos">
      <form action="salvarBanco.php" method="post">

        <!-- NOME =============================================== -->
        <div class="form-group" method="post">
          <label for="nome"> Nome:</label>
          <input class="form-control" type="text" name="nome" value="" required/>
        </div>
        <!-- TELEFONE =============================================== -->
        <div class="form-group" method="post">
          <label for="telefone">Telefone:</label>
          <input class="form-control telefone" type="text" name="telefone" value="" required/>
        </div>
        <!-- SENHA ===============================================  FALTA VALIDAR-->
        <div class="form-group" method="post">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" required/>
        </div>
        <div class="form-group" method="post">
          <label for="mensagem">Mensagem:</label>
          <textarea rows="3" class="form-control inteiro" name="mensagem" required></textarea>
        </div>
        <!-- ENVIAR =============================================== -->
        <div class="form-group text-center">
          <input class="botao" type="submit" name="cadastrar" value="ENVIAR">
        </div>
      </form>
    </div>
    </div>
  </div>
  <!-- ------------------------------------------------ -->
  <div class="footer">
  <div class="itens">
    <div class="itemContato"><img class="imagemcontato" src="imagens/end.png" /><b>Endereço: </b> Av. Assis Brasil, 6041</div>
    <div class="itemContato"><img class="imagemcontato" src="imagens/telefone.png" /><b>Telefone: </b> (51) 3276-9428</div>
    <div class="itemContato"><img class="imagemcontato" src="imagens/email.png" /><b>Email: </b> bola@bolapoa.com.br</div>
  </div>
</div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquerymask.js"></script>
  <script src="js/principal.js"></script>
</body>
</html>
