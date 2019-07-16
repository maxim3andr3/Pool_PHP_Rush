<?php
	require_once('../pdo/database/database.php');

    if (isset($_POST['submit_login']))
    {
		$email = $_POST['email'];

        if (!$_POST['email'] || !$_POST['password'])
        {
            if (empty($_POST['email']))
                echo '<p>Invalid email</p>';
            if (empty($_POST['password']))
                echo '<p>Invalid password</p>';
        }
        else
        {
			$bdd = new Database();
			$bdd->connexion();
			$query = $bdd->getBdd()->prepare($bdd->selectMemberEmail());
			$array = array(
				'email' => $email
			);
			$query->execute($array);
            $user = $query->fetch();

            if ($user && password_verify($_POST['password'], $user['password']) && !isset($_POST['remember_me']))
            {
                $_SESSION['username'] = $user['username'];
                header('location: ../product/index.php');
			}
			else if ($user && password_verify($_POST['password'], $user['password']) && isset($_POST['remember_me']))
            {
				$_SESSION['username'] = $user['username'];
				setcookie('remember_me', $user['username'], time()+3600);
                header('location: ../product/index.php');
            }
            else
                echo 'Incorrect email/password';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../stylesheets/" />
	<title>Login</title>
</head>
<body>
        <main>
            <section>
                <form method="post">
                    <label for="email">Email </label><input type="text" name="email" id="email"><br>
                    <label for="password">Password </label><input type="password" name="password" id="password" minlength=3 maxlength=10><br>
                    <input type="submit" name="submit_login" value="Submit">
					<label for="remember_me">Remember me </label><input type="checkbox" name="remember_me" id="remember_me">
                </form>
            </section>
        </main>
</body>
</html>