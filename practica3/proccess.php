<?php 
	class Form{
		public $nameErr;
		public $emailErr;
		public $genderErr;
		public $websiteErr;
		public $name;
		public $email;
		public $gender;
		public $comment;
		public $website;
		//funcion para validar que el campo del nombre no este vacío 
		function nameValidate($nam){
			if (empty($nam)) {
		        $this->nameErr = "Name is required";
		    } else {
		        $this->name = $nam;
		        // check if name only contains letters and whitespace
		        if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
		            $this->nameErr = "Only letters and white space allowed";
		        }
		    }
		}
		//Funcion para validar si el email esta escrito correctamente
		function emailValidate($em){
			if (empty($em)) {
		        $this->emailErr = "Email is required";
		    } else {
		        $this->email = $em;
		        // check if e-mail address is well-formed
		        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		            $this->emailErr = "Invalid email format";
		        }
		    }
		}
		//funcion para validar la URL de la web
		function webValidate($web){
			if (empty($web)) {
		        $this->website = "";
		    } else {
		        $this->website = $web;
		        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) {
		            $this->websiteErr = "Invalid URL";
		        }
		    }
		}
		//funcion para la asignacion del comentario
		function commentValidate($com){
			if (empty($com)) {
		        $this->comment = "";
		    } else {
		        $this->comment = $com;
		    }
		}
		//funcion para validar que el genero este seleccionado
		function genderValidate($gen){
			if (empty($gen)) {
		        $this->genderErr = "Gender is required";
		    } else {
		        $this->gender = $gen;
		    }
		}
	}
	$form = new Form();
	foreach ($_POST as $key => $value) {
		switch ($key) {
			case 'name':
				$form->nameValidate($value);
				break;
			case 'email':
				$form->emailValidate($value);
				break;
			case 'website':
				$form->webValidate($value);
				break;
			case 'comment':
				$form->commentValidate($value);
				break;
			case 'gender':
				$form->genderValidate($value);
				break;

		}
	}
	header("Location: practica4.php?name=$form->name&email=$form->email&web=$form->website&com=$form->comment&gen=$form->gender&nameErr=$form->nameErr&emailErr=$form->emailErr&genderErr=$form->genderErr&websiteErr=$form->websiteErr");
 ?>






















