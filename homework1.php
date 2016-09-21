<?php
	
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$loginEmailError = "";
	$loginPasswordError = "";
	$firstNameError = "";
	$lastNameError = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	$phoneNumberError = "";
	
	if (isset ($_POST["loginEmail"]) ){
		if (empty ($_POST["loginEmail"]) ){
			$loginEmailError = "Palun sisesta e-post!";		
		}
	}
	
	if (isset ($_POST["loginPassword"]) ){ 
		if (empty ($_POST["loginPassword"]) ){ 
			$loginPasswordError = "Palun sisesta parool!";		
		}
	}
	
	if (isset ($_POST["firstName"]) ){
		if (empty ($_POST["firstName"]) ){
			$firstNameError = "See väli on kohustuslik!";		
		} else {
			//The preg_match() function searches a string for pattern, returning true if the pattern exists, and false otherwise.
			if (!preg_match("/^[a-zA-Z õäöüšž-]*$/",$_POST["firstName"])) { 
				$firstNameError = "Pole nimi!"; 
			}
		}
	}
	
	if (isset ($_POST["lastName"]) ){
		if (empty ($_POST["lastName"]) ){
			$lastNameError = "See väli on kohustuslik!";		
		} else {
			if (!preg_match("/^[a-zA-Z õäöüšž-]*$/",$_POST["lastName"])) { 
				$lastNameError = "Pole nimi!"; 
			}
		}
	}
	
	//kas e-post oli olemas
	if (isset ($_POST["signupEmail"]) ){ //kas keegi nuppu vajutas, kas signupEmail tekkis
		if (empty ($_POST["signupEmail"]) ){ //oli email, kuid see oli tühi
			//echo "email oli tühi";
			$signupEmailError = "See väli on kohustuslik!";		
		}
	}
	
	if (isset ($_POST["signupPassword"]) ){ 
		if (empty ($_POST["signupPassword"]) ){ 
			$signupPasswordError = "See väli on kohustuslik!";		
		} else {
			//tean, et oli parool ja see ei olnud tühi
			if (strlen($_POST["signupPassword"]) < 8){ //strlen- stringi pikkus
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk!";
			}
		}
	}
	
	
	if (isset ($_POST["phoneNumber"]) ){
		if (empty ($_POST["phoneNumber"]) ){ 
			$phoneNumberError = "";
		} else {
			if (ctype_digit($_POST["phoneNumber"])){ //ctype_digit- checks if all of the characters in the Provided string, text, are numerical.
				$phoneNumberError = "";		
			} else {
				$phoneNumberError = "Ainult numbrid on lubatud!";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise lehekülg</title>
	</head>
	<body>
		<h1>Logi sisse</h1>	
		
		<form method="POST">
			<input name="loginEmail" type="email" placeholder="E-post"> <?php echo $loginEmailError; ?>
			<br><br>
			
			<input name="loginPassword" type="password" placeholder="Parool"> <?php echo $loginPasswordError; ?>
			<br><br>
			
			<input type="submit" value = "Logi sisse">
		</form>
		
		<h1>Loo kasutaja</h1>	
		
		<form method="POST">
			<label>Eesnimi</label>
			<br>
			<input name="firstName" type="text"> <?php echo $firstNameError; ?>
			<br><br>
			
			<label>Perekonnanimi</label>
			<br>
			<input name="lastName" type="text"> <?php echo $lastNameError; ?>
			<br><br>
		
			<label>E-Post</label>
			<br>
			<input name="signupEmail" type="email"> <?php echo $signupEmailError; ?>
			<br><br>
			
			<label>Parool</label>
			<br>
			<input name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
			<br><br>
			
			<label>Sugu:</label> <!--Jätan vabatahtlikuks väljaks-->
			<input type="radio" name="gender" value="female">Naine
			<input type="radio" name="gender" value="male">Mees
			<br><br>
			
			<label>Telefoni number</label> <!--Jätan vabatahtlikuks väljaks-->
			<br>
			<input name="phoneNumber" type="text"> <?php echo $phoneNumberError; ?>
			<br><br>
			
			<input type="submit" value = "Loo kasutaja">
		</form>
		 <!--Mvp ideeks on üldine foorum, kuhu saab postitada erinevaid teemasid ning kommenteerida olemasolevaid. Vastates teiste kasutajate teemadele saab koguda punkte ning neid kasutada oma teemadele "high priority" märkimisel või toodete/autasude lunastamisel. "High priority" eest saab oma teema tõsta teiste seast esile/ettepoole ning sellele motiveerib rohkem vastama, kuna võimalus on teenida rohkem punkte. Väga originaalset ideed hetkel ei ole, aga ehk tuleb teostamise käigus ning võib-olla idee ka muutub natukene.-->
	</body>
</html>