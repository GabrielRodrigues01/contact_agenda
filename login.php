<?php
include 'header.php';
include 'menu.php';

if($_POST)
{

	$email = $_POST['email'];
	$password = ($_POST['password']); 
	$auth = checkAuth($email,$password);
	if($auth)
	{
		
		$_SESSION['auth']=true;
		?>
		<script>
			window.location="index.php";
		</script>
		<?php
	}
}
?>