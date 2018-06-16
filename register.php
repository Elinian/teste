<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Bem vindo ao iPocket!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Logar para sua conta</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Usuario</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="usuario" value="<?php getInputValue('loginUsername') ?>" required autocomplete="off">
					</p>
					<p>
						<label for="loginPassword">Senha</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Senha" required>
					</p>

					<button type="submit" name="loginButton">LOGAR</button>

					<div class="hasAccountText">
						<span id="hideLogin">Ainda não possui conta? Cadastre-se aqui.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Cria uma conta</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Usuario</label>
						<input id="username" name="username" type="text" placeholder="usuario" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">Nome</label>
						<input id="firstName" name="firstName" type="text" placeholder="Nome" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Sobrenome</label>
						<input id="lastName" name="lastName" type="text" placeholder="Sobrenome" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="email" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirme o email</label>
						<input id="email2" name="email2" type="email" placeholder="email" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Senha</label>
						<input id="password" name="password" type="password" placeholder="senha" required>
					</p>

					<p>
						<label for="password2">Confirme a senha</label>
						<input id="password2" name="password2" type="password" placeholder="senha" required>
					</p>

					<button type="submit" name="registerButton">Entre</button>

					<div class="hasAccountText">
						<span id="hideRegister">Já possui uma conta? Entre aqui.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1>Escute novas musicas</h1>
				<h2>Musicas de graça</h2>
				<ul>
					<li>Descubra novos artistas</li>
					<li>Monte sua playlist</li>
					<li>Siga outras playlists</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>