<?php
	require_once('../pdo/database/database.php');

	if (isset($_POST['submit_registration']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        if (!$username || !$email || filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false || !$password || !$password_confirmation || $password != $password_confirmation)
        {
            if (empty($username))
                echo '<p>Invalid name</p>';
            if (empty($email) || !preg_match ("(^[-\w\.]+@([-a-z0-9]+\.)+[a-z]{2,4}$)i", $email))
                echo '<p>Invalid email</p>';
            if (empty($password) || empty($password_confirmation) || $password != $password_confirmation)
                echo '<p>Invalid password</p>';
        }
        else
        {
			$bdd = new Database();
			$bdd->connexion();
			$query = $bdd->getBdd()->prepare($bdd->addMember());
			$array = array(
				'username' => $username,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT)
			);
			$query->execute($array);
            echo '<p>User created</p>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../stylesheets/" />
	<title>Inscription</title>
</head>
<body>
	<main>
		<section>
			<form method="post">
				<label for="username">Username </label><input type="text" name="username" id="username" minlength=3 maxlength=10><br>
				<label for="email">Email </label><input type="text" name="email" id="email"><br>
				<label for="password">Password </label><input type="password" name="password" id="password" minlength=3 maxlength=10><br>
				<label for="password_confirmation">Password confirmation </label><input type="password" name="password_confirmation" id="password_confirmation" minlength=3 maxlength=10><br>
				<input type="submit" name="submit_registration" value="Submit">
			</form>
		</section>
	</main>
</body>
</html>