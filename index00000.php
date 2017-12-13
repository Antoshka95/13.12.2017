<a href="index.php?status=1">Текущие студенты</a>
<a href="index.php?status=0">Бывшие студенты</a> 

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
if(isset($_GET['status'])){
	$studentsQuery = $db
		->prepare('
		SELECT *
		FROM `student`
		WHERE `status` = :status'); //с фильтрацией запроста с пустым статусом

$studentsQuery
	->execute(['status' => $_GET['status']]);//заготовкка с пустым статусом
	$students=$studentsQuery//содержит значение запроса
	->fetchALL(PDO::FETCH_ASSOC);//извлекает значение запроса и возвращает записи в виде ассоциативного массива
	foreach ($students as $student){
		echo "<p>".
			htmlspecialchars($student['lastName']).
			"<a href='index.php?id=" . 
			urlencode($student['id']) .
			"'>Закончил обучение</a></p>";//выводим список студентов
	}
}

