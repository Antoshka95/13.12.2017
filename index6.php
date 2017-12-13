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
		WHERE `status` = :status'); 

$students=$studentsQuery
	->execute(['status' => $_GET['status']]);
	$students=$studentsQuery
	->fetchALL(PDO::FETCH_ASSOC);
	foreach ($students as $student){
		echo "<p>".
			htmlspecialchars($student['lastName']).
			"<a href='index.php?id=" . 
			urlencode($student['id']) .
			"'>Закончил обучение</a></p>";
	}
}

