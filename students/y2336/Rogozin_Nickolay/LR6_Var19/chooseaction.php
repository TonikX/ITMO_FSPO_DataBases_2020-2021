<?php
$table = $_GET['table'];
$add = 'add';
$remove = 'remove';
$select = 'select';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $table?> </title>
</head>

<body>

    <ul>
        <?php
        echo "<li><a href= 'form.php?table=$table&mode=$add'>Add</a></li>";
        echo "<li><a href= 'form.php?table=$table&mode=$remove'>Remove</a></li>";
        echo "<li><a href= 'form.php?table=$table&mode=$select'>Select</a></li>";
        ?>

    </ul>

</body>

</html>