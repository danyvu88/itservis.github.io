<?php

if (isset($_POST['posalji'])) {

	$ime = $_POST['ime'];
	$email = $_POST['email'];
	$poruka = $_POST['poruka'];

	$from = 'Imate novu poruku sa sajta: http://www.itservis.com'; 
	$to = 'danijel569@gmail.com'; 
	$subject = 'Poruka vezana za servis kompjutera';
	$body = "From: $ime\n E-Mail: $email\n Message:\n $poruka";

	//provera unetog imena
	if(!$_POST['ime']){
		$errorname = "Molim unesite Vaše ime!";
	}

	//provera ispravnosti e-maila
	if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$erroremail = "Molim unesite valjanu email adresu!";
	}

	//provera unete poruke
	if(!$_POST['poruka']){
		$errormessage = "Molim unesite Vašu poruku!";
	}

	//ukoliko nema grešaka
	if(!$errorname && !$erroremail && !$errormessage){
		if(mail($to, $subject, $body, $from)){
			$result ="<div clas='alert alert-success'>Hvala Vam na poslanoj poruci!</div>";
		}else{
			$result ="<div class='alert alert-warning'>Nazalost niste dobro uneli trazene podatke</div>";
		}

	}


}

?>