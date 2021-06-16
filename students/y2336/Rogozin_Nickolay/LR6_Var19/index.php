<?php
$animals = 'animals';
$animals_transfered = 'animals_transfered';
$transfer = 'transfer';
$doctor = 'doctor';
$healing = 'healing';
$overseer = 'overseer';
$shift = 'shift';
$cage = 'cage';
$settling = 'settling';
$meal = 'meal';
$feeding = 'feeding';

?>
<html>
<head>
    <title>all tables</title>
</head>

<body>

<ul>
    <?php
    echo "<li><a href = 'chooseaction.php?table=$animals'>$animals</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$animals_transfered'>$animals_transfered</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$transfer'>$transfer</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$doctor'>$doctor</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$healing'>$healing</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$overseer'>$overseer</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$shift'>$shift</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$cage'>$cage</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$settling'>$settling</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$meal'>$meal</a></li>";
    echo "<li><a href = 'chooseaction.php?table=$feeding'>$feeding</a></li>";
    ?>
</ul>

</body>

</html>