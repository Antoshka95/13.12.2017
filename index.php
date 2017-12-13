<?php
$dbParams = require(
	'db.php'
);
$db= new PDO(
	"mysql:host=localhost;dbname=" .
	$dbParams['database'].
	";charset=utf8",// host-имя хоста, dbname- имя бд,charset-кодировка (подключились к бд, в результате создался ПДО)
	$dbParams['username'],
	$dbParams['password']
);

$students=$db
	->query('SELECT *From `student` WHERE `status`=0')
	->fetchALL(PDO::FETCH_ASSOC);
	foreach ($students as $student){
		echo "<p>".
			htmlspecialchars($student['lastName']).
			"</p>";
	}