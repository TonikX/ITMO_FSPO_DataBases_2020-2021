<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/constants.php';
require_once dbFilePath;

class Query
{
    public string $description;
    public string $sql;

    function __construct(string $description, string $sql)
    {
        $this->description = $description;
        $this->sql = $sql;
    }
}

$queries = [
    new Query(
        'Получение соискателей, у которых зарплата всегда была более 100000.',
        'SELECT * FROM laborexchange.applicant WHERE 100000 < ALL ('
            . 'SELECT salary FROM laborexchange.hiring WHERE applicant_id = applicant.id'
            . ');'
    ),
    new Query(
        'Найти всех работников со средней зарплатой более 100000.',
        "
SELECT * FROM laborexchange.applicant WHERE id IN (
	SELECT applicant_id
	FROM laborexchange.hiring
	GROUP BY applicant_id
    HAVING AVG(salary) > 100000
);"
    ),
    new Query(
        'Получение опыта и соответствующих ему общего времени прохождения'
            . ' курсов и среднего времени прохождения курсов в год.',
        '
SELECT
	expirience,
	SUM(duration) AS "Total duration",
    (
        CASE
            WHEN expirience > 0 THEN SUM(duration)::float / expirience
            ELSE 0
        END
    )::numeric(10,3) AS "Average duration per year"
FROM laborexchange.applicant JOIN laborexchange.qualification on applicant.qualification_id = qualification.id
GROUP BY expirience;
'
    ),
    new Query(
        'Найти всех нанимателей, у которых есть заключённые контракты с зарплатой не'
            . ' менее 100000.',
        '
SELECT * FROM laborexchange.employer
WHERE EXISTS (
    SELECT * FROM 
        laborexchange.hiring JOIN laborexchange.vacancy ON hiring.vacancy_id = vacancy.id
    WHERE salary >= 100000 AND vacancy.employer_id = employer.id
);'
    ),
    new Query(
        'Найти соискателей, которые присутствуют в таблице applicant, но не присутствуют'
            . ' в таблице course_passing.',
        "SELECT * FROM laborexchange.applicant"
            . " EXCEPT"
            . " SELECT * FROM laborexchange.applicant"
            . " WHERE id IN ("
            . "  SELECT applicant_id FROM laborexchange.course_passing);"
    ),
];

if (isset($_GET['queryID'])) {
    $id = $_GET['queryID'];
} else {
    $id = 0;
}
$db = new DB();
$query = $db->pdo->query($queries[$id]->sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
        }

        td,
        th {
            padding: 1em;
        }

        th {
            border-width: 2px;
        }

        th:nth-last-child(2),
        td:nth-last-child(2) {
            padding: 0;
            padding-left: 0.5em;
        }
    </style>
</head>

<body>
    <button id="backButton" onclick="location.assign('..');">Назад</button>
    <center>
        <h1>
            <?php echo $queries[$id]->description; ?>
        </h1>
        <table>
            <tr>
                <?php
                $headers = $db->getQueryColumns($query);
                foreach ($headers as $header => $type) {
                    echo "<th>$header<br><span style='font-weight: normal;'>($type)</span></th>";
                }
                ?>
                <th style='border: none;'></th>
                <th style='border: none;'></th>
            </tr>
            <?php
            foreach ($query->fetchAll(PDO::FETCH_NUM) as $row) {
                echo "<tr>";
                foreach ($row as $rowElement) {
                    echo "<td>$rowElement</td>";
                }
                echo "</tr>";
            } ?>
        </table>
    </center>
</body>

</html>
