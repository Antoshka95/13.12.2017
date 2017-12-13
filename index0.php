<?php
$dbParams = require(
	'db.php'
);//подключились к еще одну php файлу
$db= new PDO(
	"mysql:host=localhost;dbname=" .
	$dbParams['database'].
	";charset=utf8",// host-имя хоста, dbname- имя бд,charset-кодировка (подключились к бд, в результате создался ПДО)
	$dbParams['username'],
	$dbParams['password']
); //взяли параметры из db params

$updateQuery = $db->prepare('
	UPDATE `student` 
	SET `status` = "0"
	WHERE `id` = :id
	'); //создали и записали в переменную запрос
if ($updateQuery->execute(['id' => $_GET['id']])) { //выполнили запрос и заполняем необходимые поля
    echo 'Выполнено!';
} else {
    echo 'Ошибка';
}


