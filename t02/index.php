<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1>Password</h1>
	<form method="POST">
		<?php
session_start();
if (isset($_SESSION['saved'])) {

    echo '<p>Password saved at session.</p><p>Hash is ' . $_SESSION['hash'] . '.</p><p>Try to guess: <input type="text" name="check" placeholder="Password to session"/>' .
        '<input type="submit" name="pscheck" value="Check password"/> </p> <input type="submit" name="clear" value="Clear"/>
		';
} else {
    if (isset($_SESSION['hacked'])) {
        echo '<p style="color: green;">Hacked!</p>';
        unset($_SESSION['hacked']);
    }
    echo '<p>Password not saved at session.</p><p>Password for saving to session  <input type="text" name="password" placeholder="Password to session"/></p> '
        . '<p>Salt for saving to session  <input type="text" name="salt" placeholder="Salt to session"/></p> '
        . '<input type="submit" name="save" value="Save"/>';
}
?>
	</form>

	</p>
	<?php

if (isset($_POST['save'])) {
    save_password();
}

if (isset($_POST['pscheck'])) {
    check_password();
}

if (isset($_POST['clear'])) {
    session_destroy();
    header("Location: index.php");
}

function save_password()
{
    if (isset($_POST['password']) && $_POST['password'] != '' && isset($_POST['salt']) && $_POST['salt'] != '') {
        $_SESSION['hash'] = md5($_POST['password'] . $_POST['salt']);
        $_SESSION['salt'] = $_POST['salt'];
        $_SESSION["saved"] = true;
        header("Location: index.php");
    }
}

function check_password()
{
    if (isset($_POST['check'])) {
        $hash = md5($_POST['check'] . $_SESSION['salt']);
        if ($_SESSION['hash'] == $hash) {
            unset($_SESSION['salt']);
            unset($_SESSION['hash']);
            unset($_SESSION['saved']);
            $_SESSION['hacked'] = true;
            header("Location: index.php");
        } else {
            echo '<p style="color: red;">Access denied!</p>';
        }
    }

}

?>
</body>

</html>