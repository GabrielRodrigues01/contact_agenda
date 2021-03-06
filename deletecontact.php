<?php
include 'header.php';
include 'menu.php';

if(!empty($_REQUEST['contactId']))
{

  $contactId = $_REQUEST['contactId'];
  $array = json_decode(getContact($contactId),true);
}

if(!empty($_POST))
{
  
  $contactId = $_POST['contactId'];
  $confirm = deleteContact($contactId);
  if($confirm)
  {
    
    ?>
    <script>
      window.location="index.php"
    </script>
    <?php
  }
}
?>

<form class="form center-block" method="post" role="form" name="newcontact" id="form_delete" action="deletecontact.php?contactId=<?=$contactId?>">
  <input type="hidden" name="contactId" id="contactId" value="<?=$contactId?>">
  <div class="container">
    <div class="jumbotron">
      <br>
      <div class="img" align="center">
        <img src="bootstrap/img/menu.png" alt=""> 
        <br>
      </div>
      <br>
      <div class="lead" align="center">
        <p class="lead"><?=$_SESSION['name']?>, confirme a exclusão do seu contato</p>
      </div>
      <br>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Nome:</span>
          <input type="text" class="form-control" name="contactName" value="<?=$array['contactName']?>" id="name" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">E-mail:</span>
          <input type="email" class="form-control" name="contactEmail" value="<?=$array['contactEmail']?>" aria-describedby="basic-addon1" data-error="Por favor, informe um e-mail correto." required disabled>
          <div class="help-block with-errors"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Telefone:</span>
          <input type="text" class="form-control" name="contactPhone" id="phone" value="<?=$array['contactPhone']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Logradouro:</span>
          <input type="text" class="form-control" name="contactStreet" id="street" value="<?=$array['contactStreet']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">CEP:</span>
          <input type="text" class="form-control" name="contactZipcode" id="zipcode" value="<?=$array['contactZipcode']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Cidade:</span>
          <input type="text" class="form-control" name="contactCity" id="city" value="<?=$array['contactCity']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Estado:</span>
          <input type="text" class="form-control" name="contactState" id="state" value="<?=$array['contactState']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">País:</span>
          <input type="text" class="form-control" name="contactCountry" id="country" value="<?=$array['contactCountry']?>" aria-describedby="basic-addon1" required disabled>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div align="center">
          <button class="btn btn-danger" value="submit" style="float: center" type="submit"> <i class="glyphicon glyphicon-trashe"></i> Excluir</button>    
        </div>
        <br>
      </div>
    </div>
  </div>  
</form>   
    
<?php
include 'footer.php';
?>