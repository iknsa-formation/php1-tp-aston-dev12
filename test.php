<?php

$personnes = [
	'police' => [
		'nom' => ['Hitchcock', 'Lupin']
	],
	'romance' => [
		'nom' => ['Titi', 'Toto']
	],
	'autre' => [
		'nom' => ['machin', 'bidule']
	],
	'action' => [
		'nom' => ['Titi', 'Toto']
	],
	'Drame' => [
		'nom' => ['Titi', 'Toto']
	]
];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Auteurs</title>
</head>
<body>

<?php foreach ($personnes as $key => $value): ?>

<section>
	<h1>Section: <?= ucfirst($key) ?></h1>
	<ul>
		<?php foreach ($value["nom"] as $nom): ?>
			<li><?= $nom ?></li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endforeach; ?>
</body>
</html>