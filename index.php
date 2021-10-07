<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form action="index.php" method="post">
		<p>Текст: <input type="text" name="txt" placeholder="введите какой-то текст" /></p>
		<p><input type="submit" value="Отправить" /></p>
	</form>
</body>

</html>

<?php

function GetFirstUnicalLetters($txt)
{
	// удаляем пробелы вначале и вконце
	$txt = trim($txt);
	// перевод в нижний регистр
	$text =  mb_strtolower($txt);
	// разбиваем фразу на слова по пробелу
	$text_arr = explode(' ', $text);
	// массив из первых букв
	$first_letters = [];
	foreach ($text_arr as $key => $value) {
		array_push($first_letters, mb_substr($value, 0, 1));
	}
	// удаление пробела, если попался
	foreach ($first_letters as $key => $value) {
		if (!$value) {
			unset($first_letters[$key]);
		}
	}
	// уникальность
	$first_letters = array_unique($first_letters);
	// сортировка массива
	sort($first_letters, SORT_STRING);
	return $first_letters;
}

if ($_POST['txt'] != '') {
	$txt = $_POST['txt'];
	$result = GetFirstUnicalLetters($txt);

	echo "<pre>";
	print_r($result);
	echo "</pre>";
}
