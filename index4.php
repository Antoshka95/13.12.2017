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

if($db->query('
	UPDATE `student` 
	SET `status` = "0"
	WHERE `student`.`id` = 5
	')->execute()) {
    echo 'Выполнено!';
} else {
    echo 'Ошибка';
}


