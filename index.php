<?php
include 'header.php';
include 'menu.php';
?>

<div class="container">
  <div class="jumbotron">
    <br>
    <div class="img" align="center">
      <img src="bootstrap/img/menu.png" alt="">     
    </div>
    <br>
    <?php
      if(!isset($_SESSION['auth']))
      {
        
        ?>
        <br>
        <p class="lead" style="text-align: center;">Armazene seus contatos em nossa agenda online. É facil! Adicione quantos contatos desejar e tenha sempre em mãos os seus números de telefones de maneira organizada e prática. É só se registrar e começar a usar.</p>
        <br>
        <p align="center"><a class="btn btn-lg btn-success" href="registration.php" role="button">Registre-se</a></p>
        <?php
      } else {
        ?>
        <div class="lead" align="center">
          <p class="lead">Bem Vindo(a) <?=$_SESSION['name']?>!</p>
        </div>
          <div class="row marketing">
            <div class="col-lg-8">
              <a href="contact.php" class="btn btn-success" aria-hidden="true" title="Meus Contatos"><i class="icon-white glyphicon glyphicon-list-alt"></i> Meus Contatos</a></h1>
            </div>
          <div class="col-lg-4" align="right">
          <a href="addcontact.php" class="btn btn-success" aria-hidden="true" title="Adicionar Contato"><i class="icon-white glyphicon glyphicon-plus"></i> Adicionar Contato</a></h1>
        </div> 
        <?php
      }
    ?>
  </div>
</div>

<?php
include 'footer.php';
?>