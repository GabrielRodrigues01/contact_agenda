<?php
include 'header.php';
include 'menu.php';

$busca = json_decode(getUserContacts($_SESSION["id"]));
?>

<div class="container">
  <div class="jumbotron">
    <br>
    <div class="img" align="center">
      <img src="bootstrap/img/menu.png" alt="">  
      <br>
      <br>   
      <?php
      if ($busca)
      {
        
        ?>
        <div class="lead" align="center">
          <p class="lead"><?=$_SESSION['name']?>, seus contatos:</p>
        </div>
        <?php 
        foreach($busca as $obj)
        {
          
          ?>
          <div class="form-group col-lg-6 contactEntry">
            <div class="panel panel-default">
              <div class="panel-heading" align="left"><b><?=$obj->contactName?></b>
                <div style="float:right" id="deleteContact">
                  <a class="btn-sm" aria-hidden="true" href="deletecontact.php?contactId=<?=$obj->contactId?>" title="Excluir Contato"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
                <div style="float:right" id="updateContact">
                  <a class="btn-sm" aria-hidden="true" href="updatecontact.php?contactId=<?=$obj->contactId?>" title="Atualizar Contato"><i class="glyphicon glyphicon-refresh"></i></a>
                </div>
              </div>
              <ul class="list-group" align="left">
                <li class="list-group-item"><b>Telefone:</b> <?=$obj->contactPhone?></li>
                <li class="list-group-item"><b>E-mail:</b> <?=$obj->contactEmail?></li>
                <li class="list-group-item"><b>Logradouro: </b><?=$obj->contactStreet?></li>
                <li class="list-group-item"><b>CEP: </b><?=$obj->contactZipcode?></li>
                <li class="list-group-item"><b>Cidade: </b><?=$obj->contactCity?></li>
                <li class="list-group-item"><b>Estado: </b><?=$obj->contactState?></li>
                <li class="list-group-item"><b>País:</b> <?=$obj->contactCountry?></li>
              </ul>
            </div>
          </div>
          <br>
          <?php
        }
        ?>
        <div class="clearfix"></div>
        <?php
      }else{
          ?>
            <p class="lead" align="left"><?=$_SESSION['name']?>, você ainda não cadastrou nenhum contato!</p>
            <div>
              <a href="addcontact.php" class="btn btn-success" aria-hidden="true" title="Adicionar Contato"><i class="icon-white glyphicon glyphicon-plus"></i> Adicionar Contato</a></h1>
            </div>
            <?php
      }
      ?>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>