<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Document</title>
</head>

<body>

	<?php

session_start();

if (isset($_POST['send'])) {
    set_session();
}

if (isset($_POST['forget'])) {
    session_destroy();
    header("Location: index.php");
}

print_session_info();

function set_session()
{
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['photo'] = $_POST['photo'];
    $_SESSION['experience'] = count($_POST['ch']);
    $_SESSION['level'] = $_POST['range'];
    $_SESSION['purpose'] = $_POST['rb'];
}

function print_session_info()
{
    if (isset($_SESSION['name'])) {
        echo '<h1>Session for new</h1> name: ' . $_SESSION["name"] . '<br/>'
            . 'email: ' . $_SESSION["email"] . '<br/>'
            . 'age: ' . $_SESSION["age"] . '<br/>'
            . 'description: ' . $_SESSION["description"] . '<br/>'
            . 'photo: ' . $_SESSION["photo"] . '<br/>'
            . 'experience: ' . $_SESSION["experience"] . '<br/>'
            . 'level: ' . $_SESSION["level"] . '<br/>'
            . 'purpose: ' . $_SESSION["purpose"] . '<br/><br/>';
        echo '<form method="post">
		<fieldset>
			<input type="submit" name="forget" value="Forget"></input>
		</fieldset>
		</form>';
    } else {
        echo ('<h2>New Avenger application</h2>
		<form action="index.php" method="post">
			<fieldset class="border">
				<fieldset class="border">
					<legend>About the Superhero</legend>

					<label>Name</label>
					<input type="text" placeholder="Tell your name" required name="name">
					<label>E-mail</label>
					<input type="text" placeholder="Tell your e-mail" required name="email">
					<label>Age</label>
					<input type="number" min="1" max="999" step="1" required name="age"><br><br>
					<label>About</label>
					<textarea type="text" maxlength="500" rows="5" cols="70"
						placeholder="Information about yourself, max 500 symbols" required
						name="description"></textarea><br><br>
					<label>Your photo:</label>
					<input type="file" id="choose" value="pzdc.php" required name="photo">
				</fieldset>
				<fieldset>
					<legend>Powers</legend>

					<input type="checkbox" name="ch[]">
					<label>Strength</label>
					<input type="checkbox" name="ch[]">
					<label>Speed</label>
					<input type="checkbox" name="ch[]">
					<label>Intelligence</label>
					<input type="checkbox" name="ch[]">
					<label>Teleportation</label>
					<input type="checkbox" name="ch[]">
					<label>Immortal</label>
					<input type="checkbox" name="ch[]">
					<label>Another</label>
					<br />
					<label>Level of control: </label>
					<input type="range" min="0" max="10" step="1" name="range">
				</fieldset>
				<fieldset>
					<legend>Publicity</legend>

					<input checked type="radio" value="0" name="rb">
					<label>UNKNOWN</label>
					<input type="radio" value="1" name="rb">
					<label>LIKE A GHOST</label>
					<input type="radio" value="2" name="rb">
					<label>I AM IN COMICS</label>
					<input type="radio" value="3" name="rb">
					<label>I HAVE FUN CLUB</label>
					<input type="radio" value="4" name="rb">
					<label>SUPERSTAR</label>
				</fieldset>
				<br>
				<button type="reset">Clear</button>
				<input type="submit" name="send" value="Send"></input>
			</fieldset>
		</form>
	');
    }
}
?>

</body>

</html>