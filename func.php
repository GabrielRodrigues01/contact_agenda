<?php session_start();

function connectdb()
{
 	
 	$link = new mysqli('localhost', 'root', '', 'agenda');
    if (!$link) 
    {
    
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); 
    }

    return $link;
}

function getUserContacts($userId)
{

	if(!empty($userId))	
	{	
		
		$link = connectdb();
	    $query = " SELECT * FROM contact WHERE userId = '$userId'";
	    $result = mysqli_query($link, $query);
	    if(mysqli_num_rows($result) > 0)
	    {

	      while($row = $result -> fetch_array()) 
	      {
	        
	        $resp[] = array('contactId' => $row['contactId'], 
	        				'userId' => $row['userId'],
	        				'contactName' => $row['contactName'],
	        				'contactEmail' => $row['contactEmail'],
	        				'contactPhone' => $row['contactPhone'],
	        				'contactStreet' => $row['contactStreet'], 
	        				'contactZipcode' => $row['contactZipcode'], 
	        				'contactCity' => $row['contactCity'],
	        				'contactState' => $row['contactState'], 
	        				'contactCountry' => $row['contactCountry']);
	      }

	      return json_encode($resp);
	      mysqli_free_result($result);
	    }
	}
}

function getContact($contactId)
{

	if(!empty($contactId))
	{

		$link = connectdb();
	 	$resp = array();
	  	$query = "SELECT * FROM contact WHERE contactId = '$contactId'";
	    $result = mysqli_query($link, $query);
	    if(mysqli_num_rows($result) >= 1)
	    {
	      
	      while($row = $result -> fetch_array()) 
	      {

	        $resp['contactId'] = $row['contactId'];
	        $resp['userId'] = $row['userId'];
	        $resp['contactName'] = $row['contactName'];
	        $resp['contactPhone'] = $row['contactPhone'];
	        $resp['contactEmail'] = $row['contactEmail'];
	        $resp['contactStreet'] = $row['contactStreet'];
	        $resp['contactZipcode'] = $row['contactZipcode'];
	        $resp['contactCity'] = $row['contactCity'];
	        $resp['contactState'] = $row['contactState'];
	        $resp['contactCountry'] = $row['contactCountry'];
	      }

	      return json_encode($resp);
	      mysqli_free_result($result);
	    }

	} else {

		$link = connectdb();
		$query = " SELECT * FROM contact";
	    $result = mysqli_query($link, $query);
	    if(mysqli_num_rows($result) > 0)
	    {

	      while($row = $result -> fetch_array()) 
	      {

	        $resp[] = array('contactId' => $row['contactId'], 
	        				'userId' => $row['userId'],
	        				'contactName' => $row['contactName'],
	        				'contactEmail' => $row['contactEmail'], 
	        				'contactPhone' => $row['contactPhone'], 
	        				'contactStreet' => $row['contactStreet'], 
	        				'contactZipcode' => $row['contactZipcode'], 
	        				'contactCity' => $row['contactCity'],
	        				'contactState' => $row['contactState'], 
	        				'contactCountry' => $row['contactCountry']);
	      }     
	      
	      return json_encode(array("contacts" => $resp));
	      mysqli_free_result($result);
	    }   
	}
}

function insertUser($array)
{

	$link = connectdb();
	if(empty($array['userPassword']) || empty($array['userEmail']) || empty($array['userName']))
	{

		echo "Verifique se todos os campos foram preenchidos!";
		die();
	}

	$password = $array['userPassword'];
	$email = $array['userEmail'];
	$name = $array['userName'];
	$query = "INSERT INTO user (`userPassword`, `userEmail`, `userName`) VALUES ('".$password."', '".$email."', '".$name."')";
	$insertuser = mysqli_query($link,$query);
	if ($insertuser) 
	{

		echo "<script>alert('Usuário inserido com sucesso')</script>";
	} else {

		echo "<script>alert('Não foi possível inserir o usuário. Tente novamente')</script>";
		echo "<script>alert('Dados sobre o erro:'". mysqli_error($link)."</script>";
	}
}

function insertContact($array)
{
	
	$link = connectdb();
	if(empty($array['contactName']) || empty($array['contactEmail']) || empty($array['contactPhone']) || empty($array['contactZipcode']) ||
	   empty($array['contactCity']) || empty($array['contactState']) || empty($array['contactCountry']))
	{
		
		echo "Verifique se todos os campos foram preenchidos!";
			die();
	}

	$name = $array['contactName'];
	$email = $array['contactEmail'];
	$phone = $array['contactPhone'];
	$street = $array['contactStreet'];
	$zipcode = $array['contactZipcode'];
	$city = $array['contactCity'];
	$state = $array['contactState'];
	$country = $array['contactCountry'];
	$query = "INSERT INTO contact (`userId`, `contactName`, `contactEmail`, `contactPhone`, `contactStreet`,`contactZipcode`,`contactCity`, `contactState`,`contactCountry`) VALUES ('".$_SESSION['id']."','".$name."','".$email."','".$phone."','".$street."','".$zipcode."','".$city."','".$state."','".$country."')";
	$insertcontact = mysqli_query($link,$query);
	if ($insertcontact) 
	{
	
		echo "<script>alert('Contato inserido com sucesso')</script>";
	} else {

		echo "<script>alert('Não foi possível inserir o contato. Tente novamente')</script>";
		echo "<script>alert('Dados sobre o erro:'". mysqli_error($link)."</script>";
	}
}

function updateContact($data)
{
	
	$link = connectdb();
	if(empty($data['contactId']) || empty($data['contactName']) || empty($data['contactPhone']) || empty($data['contactEmail']) ||
	   empty($data['contactZipcode']) || empty($data['contactCity']) || empty($data['contactState']) || empty($data['contactCountry']))
	{
		echo "Alguma variavel não foi passada! Verifique: (contactId, contactName, contactEmail, contactZipcode, contactCity, contactState, contactCountry e contactphones)";
		die();
	}

	$contactId = $data['contactId'];
	$name = $data['contactName'];
	$email = $data['contactEmail'];
	$phone = $data['contactPhone'];
	$street = $data['contactStreet'];
	$zipcode = $data['contactZipcode'];
	$city = $data['contactCity'];
	$state = $data['contactState'];
	$country = $data['contactCountry'];
	$query = "UPDATE contact SET contactName = '$name',
								 contactEmail = '$email',
								 contactPhone = '$phone',
								 contactStreet = '$street',
								 contactZipcode = '$zipcode',
								 contactCity = '$city', 
								 contactState = '$state',
								 contactCountry = '$country' 
								 WHERE contactId = '$contactId'";
	$updateContact = mysqli_query($link,$query);
	
	if ($updateContact) 
	{
		
		?>
		<script>
			window.location="contact.php";
		</script>
		<?php
	}
}

function deleteContact($contactId)
{	
	
	if(!empty($contactId))
	{
		
		$link=connectdb();
		$query = "DELETE FROM contact WHERE contactId = '$contactId'";
	    $deleteContacts = mysqli_query($link, $query); 	    
    }

	if ($deleteContacts) 
	{
		
		?>
		<script>
			window.location="contact.php";
		</script>
		<?php
	}
}

function validationUserEmail($email)
{
	
	$link = connectdb();
	$query = " SELECT * FROM user WHERE userEmail = '$email'";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result) == 1)
	{
		
		echo "<script>alert('E-mail já cadastrado no sistema. Tente novamente.')</script>";
		mysqli_free_result($result);
	} else {
		
		return 1;
	}
}

function validationContactEmail($email)
{

	$link = connectdb();
	$query = " SELECT * FROM contact WHERE contactEmail = '$email'";
	$result = mysqli_query($link,$query);
	if(mysqli_num_rows($result) == 1)
	{
		
		echo "<script>alert('E-mail de contato já cadastrado no sistema. Tente novamente.')</script>";
		mysqli_free_result($result);
	} else {
		
		return 1;
	}
}


function checkAuth($email,$password)
{
	
	$link = connectdb();
	$query = " SELECT * FROM user WHERE userEmail = '$email' AND userPassword = '$password'";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) == 1)
	{
	
		while($row = $result->fetch_array()) {
			$_SESSION['name'] = $row['userName'];
			$_SESSION['id'] = $row['userId'];

		}
		return 1;
		mysqli_free_result($result);

	} else {
		echo "<script>alert('Login e/ou senha incorretos!')</script>";
		return 0;
	}
}

