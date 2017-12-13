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

$result=$db
	->query('
	SELECT COUNT(*) `count`
	from student 
	where status=1
	')
	->fetch(PDO::FETCH_ASSOC);
echo 'У нас учатся ' . $result['count'] . ' студентов';
