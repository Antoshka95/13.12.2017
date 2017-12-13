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



$updateQuery = $db->prepare('
	UPDATE `student` 
	SET `status` = "0"
	WHERE `id` = :id
	'); 
if ($updateQuery->execute(['id' => $_GET['id']])) {
    echo 'Выполнено!';
} else {
    echo 'Ошибка';
}


