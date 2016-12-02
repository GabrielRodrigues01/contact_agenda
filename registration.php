<?php
include 'header.php';
include 'menu.php';

if($_POST)
{
	
  $data = array();
	$data = $_POST;
	$confirm = validationUserEmail($_POST['userEmail']);
	if ($confirm)
	{
		
    insertUser($data);
		?>
		<script>
			window.location="index.php";
		</script>
		<?php
	}
}	
?>

<form class="form center-block" method="post" role="form" data-toggle="validator" name="registration" id="registration" action="registration.php">
	<div class="container">
  	<div class="jumbotron">
			<h2> <class="navbar-text"> Registre suas informações abaixo</h2>
			<br>
			<form>
				<div class="form-group">
					<label for="userName" class="control-label">Nome: </label>
    			<input type="text" class="form-control" name="userName" id="userName" placeholder="Nome" required>
  			</div>
 				<div class="form-group">
  				<label for="userEmail" class="control-label">Email: </label>
    			<input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email" data-error="Por favor, informe um e-mail correto." required>
    				<div class="help-block with-errors"></div>
  			</div>
  			
        <div class="form-group">
    			<label for="userPassword" class="control-label">Senha:</label>
    			<div class="form-inline row">
      			<div class="form-group col-sm-6">
        			<input type="password" style="width: 60%" data-minlength="6" class="form-control" name="userPassword" id="userPassword" placeholder="Senha" required>
        			<div class="help-block">Mínimo de 6 caracteres</div>
      			</div>
      			<div class="form-group col-sm-6">
        			<input type="password" style="width: 60%" class="form-control" name="confirm" id="confirm" data-match="#userPassword" data-match-error="Atenção! As Senhas não são iguais" placeholder="Confirme sua Senha" required>
        			<div class="help-block with-errors"></div>
      			</div>
            </div>
  		  </div>
 				<p align="center"><button value="submit" class="btn btn-success" type="submit"> <i class="glyphicon glyphicon-ok"></i> Salvar</button></p>
 			</form>
		</div>
	</div>
</form>

<?php
include 'footer.php';
?>