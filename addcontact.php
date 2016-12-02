<?php

include 'header.php';
include 'menu.php';

if($_POST)
{
	
  $data = array();
	$data = $_POST;
  $email = $_POST['contactEmail'];
  $confirmEmail = validationContactEmail($email);

  if($confirmEmail)
  {
    
    $data['contactEmail'] = $email;
  	$confirm = insertContact($data);
  }

	if ($confirm)
	{
		
    ?>
		<script>
			window.location = "contact.php";
		</script>
		<?php
	}
}

?>
<form class="form center-block" method="post" role="form" data-toggle="validator" name="addcontact" id="addcontact" action="addcontact.php">
	<div class="container">
    <div class="jumbotron">
      <br>
      <div class="img" align="center">
        <img src="bootstrap/img/menu.png" alt=""> 
        <br>
        </div>
          <br>
          <div class="lead" align="center">
            <p class="lead"><?=$_SESSION['name']?>, registre as informações do seu contato</p>
          </div>
	   		  <div class="form-group">
					  <label for="contactName" class="control-label">Nome: </label>
    			  <input type="text" class="form-control" name="contactName" id="contactName" placeholder="Nome" required>
  				</div>
  				<div class="form-group">
  					<label for="contactEmail" class="control-label">Email: </label>
    				<input type="email" class="form-control" name="contactEmail" id="contactEmail" placeholder="Exemplo: fulano@gmail.com" data-error="Por favor, informe um e-mail correto." required>
            <div class="help-block with-errors"></div>
  				</div>
  				<div class="form-group">
  					<label for="contactPhone" class="control-label">Telefone: </label>
    				<input type="text" class="form-control" name="contactPhone" id="contactPhone" placeholder="(xx) xxxx-xxxx)" required>
  				</div>
  				<div class="form-group">
   					<label for="contactStreet" class="control-label">Logradouro: </label>
    				<input type="text" class="form-control" name="contactStreet" id="contactStreet" placeholder="Exemplo: Rua Independência, 351" required>
  				</div>
  				<div class="form-group">
					  <label for="contactZipcode" class="control-label">CEP: </label>
    				<input type="text" class="form-control" name="contactZipcode" id="contactZipcode" placeholder="Exemplo: 11020-140" required>
  				</div>
  				<div class="form-group">
  					<label for="contactCity" class="control-label">Cidade: </label>
    				<input type="text" class="form-control" name="contactCity" id="contactCity" placeholder="Cidade" required>
  				</div>
  				<div class="form-group">
					  <label for="contactState" class="control-label">Estado: </label>
    				<input type="text" class="form-control" name="contactState" id="contactState" placeholder="Estado" required>
  				</div>
  				<div class="form-group">
  					<label for="contactCountry" class="control-label">Pais: </label>
    				<input type="text" class="form-control" name="contactCountry" id="contactCountry" placeholder="País" required>
  				</div>			
				<div class="form-group">
					<div class="clearfix"></div>
				</div>
				<p align="center"><button value="submit" class="btn btn-success" type="submit"> <i class="glyphicon glyphicon-ok"></i> Salvar</button></p>
 		</div>
 	</div> 	
</form>       

<?php
include 'footer.php';
?>