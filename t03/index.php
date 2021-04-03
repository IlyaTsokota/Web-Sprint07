<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1>Charset</h1>
	<form method="post">
		<p>Change charset: <input type="text" name="str" placeholder="Input string" /></p>

		<div>
			Select charset or several charsets:
			<select name="charsets[]" multiple="multiple">
				<option selected value="UTF-8">UTF-8</option>
				<option value="ISO-8859-1">ISO-8859-1</option>
				<option value="Windows-1252">Windows-1252</option>
			</select>
			<input type="submit" name="change" value="Change charset" />
			<input type="submit" name="clear" value="Clear" />
		</div>
	</form>

	<?php

if (isset($_POST['change']) && $_POST['str'] != '') {
    echo ('<div>Input string: <textarea disabled rows="4" cols="50" >' . $_POST['str'] . '</textarea></div>');
    foreach ($_POST['charsets'] as $val) {
        create_item($val, $_POST['str']);
    }
    unset($_POST['charsets']);
}

function create_item($charset_to, $str)
{
    $converted = mb_convert_encoding($str, $charset_to, "auto");
    echo ('<div>' . $charset_to . ' <textarea disabled rows="4" cols="50" >' . $converted . '</textarea></div>');
}

if (isset($_POST['clear'])) {
    header("Location: index.php");
}

?>

</body>

</html>