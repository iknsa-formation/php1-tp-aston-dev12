<?php

$results = [];
$res = 0;

foreach ($_POST as $key => $value) {
	// J'initialise le type d'opération et les autres variables que je vais utilisé
	$op = '';

	if (preg_match('/nombre/', $key) > 0) {
		$number = $value;

		$results[substr($key, -1)]['number'] = $number;
	}

	// var_dump($key, $value);
	// Je vérifie si le champ est un nombre ou une opération
	if (preg_match('/op/', $key) > 0) {
		// Je suis sur un type de champ opération

		$operateurLogique = 'op' . substr($key, -1);
		$operateur = $_POST[$operateurLogique];
		$results[substr($key, -1)]["operateur"] = $operateur;

		if ($res === 0) {
			$nombrePrecedent = 'nombre' . (substr($key, -1));
			$res = $_POST[$nombrePrecedent];
		}

		$nombreSuivant = 'nombre' . (substr($key, -1) + 1);
		$next = $_POST[$nombreSuivant];

		switch ($operateur) {
			case '+':
				$res += $next;
				break;
			case '-':
				$res -= $next;
				break;
			case '*':
				$res = $res * $next;
				break;
			case '/':
				$res = $res / $next;
				break;
			case '%':
				$res = $res % $next;
				break;
			
			default:
				die('operateur pas permis');
				break;
		};
	}
}
echo "<pre>";
var_dump($res);
echo "</pre>";

echo "<hr><pre>";
var_dump($results);
echo "</pre>";
$title = "Le traitement du formulaire précedent";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form traitement</title>
</head>
<body>
<h1><?= strtoupper($title) ?></h1>
<h2><?= substr($title, 15) ?></h2>

<h2><?php $explodedTitle = explode('u', $title); ?></h2>

<ul>
	<?php foreach($explodedTitle as $value): ?>
		<li><?= $value ?></li>
	<?php endforeach; ?>
</ul>
</body>
</html>