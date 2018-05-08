<?php 
	$name = filter_input(INPUT_GET, 'name'); 
	$email = filter_input(INPUT_GET, 'email');
	$website = filter_input(INPUT_GET, 'web'); 
	$comment = filter_input(INPUT_GET, 'com');
	$gender = filter_input(INPUT_GET, 'gen');
	$nameErr = filter_input(INPUT_GET, 'nameErr');
	$emailErr = filter_input(INPUT_GET, 'emailErr');
	$genderErr = filter_input(INPUT_GET, 'genderErr');
	$websiteErr = filter_input(INPUT_GET, 'websiteErr');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario en PHP</title>
</head>
<body>
	<h2>PHP Form Validation Example</h2>
	<p><span class="error">* required field.</span></p>
	<form method="post" action="proccess.php">
	    Name: <input type="text" name="name" value="">
	    <span class="error">* <?php echo $nameErr;?></span>
	    <br><br>
	    E-mail: <input type="text" name="email" value="">
	    <span class="error">* <?php echo $emailErr;?></span>
	    <br><br>
	    Website: <input type="text" name="website" value="">
	    <span class="error"><?php echo $websiteErr;?></span>
	    <br><br>
	    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
	    <br><br>
	    Gender:
	    <input type="radio" name="gender" value="female">Female
	    <input type="radio" name="gender" value="male">Male
	    <span class="error">* <?php echo $genderErr;?></span>
	    <br><br>
	    <input type="submit" name="submit" value="Submit">
	</form>
	<?php
	echo "<h2>Your Input:</h2>";
	echo $name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $website;
	echo "<br>";
	echo $comment;
	echo "<br>";
	echo $gender;
	?>
</body>
</html>