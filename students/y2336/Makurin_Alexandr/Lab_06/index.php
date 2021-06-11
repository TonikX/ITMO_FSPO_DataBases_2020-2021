<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once headersFilePath;
require_once dbFilePath;
require_once utilsFilePath;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
    <center>
<div style="display: inline-block;">
<ul>
<li><a href="viewTable.php?tableName=laborexchange.applicant">Соискатели</a></li>
<li><a href="viewTable.php?tableName=laborexchange.employer">Наниматели</a></li>
<li><a href="viewTable.php?tableName=laborexchange.vacancy">Вакансии</a></li>
<li><a href="viewTable.php?tableName=laborexchange.hiring">Контракты</a></li>
<li><a href="viewTable.php?tableName=laborexchange.course_passing">Прохождения курсов</a></li>
<li><a href="viewTable.php?tableName=laborexchange.qualification">Квалификации</a></li>
<li><a href="showQueryResults.php?queryID=0">Запрос 1</a></li>
<li><a href="showQueryResults.php?queryID=1">Запрос 2</a></li>
<li><a href="showQueryResults.php?queryID=2">Запрос 3</a></li>
<li><a href="showQueryResults.php?queryID=3">Запрос 4</a></li>
<li><a href="showQueryResults.php?queryID=4">Запрос 5</a></li>
</ul>
</div>
</center>
</body>
</html>
