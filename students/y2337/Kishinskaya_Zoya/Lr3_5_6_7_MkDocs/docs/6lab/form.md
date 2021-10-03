
### form.php
```
<?php
    $mod = $_GET['mod'];
    $table_name = $_GET['table_name'];
    if ($mod == "edit")
    {
        $item_id = $_GET['id'];
    }
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title> <?php echo $tables[$table_name]['name']?> <?php echo $mod ?> </title>
</head>

<body>
<header>
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
            </li>
            <?php
            require_once "config.php";
            foreach ($tables as $table => $value)
            {
                echo "<li class='nav-item'><a class='nav-link' href='table.php?table_name=$table'>" . $tables[$table]["name"] . "</a></li>";
            }
            ?>
        </ul>
    </div>
</header>

<div class="container">

<?php
        if ($mod == "add")
        {
            echo "<h2 class='p-2 m-0'>Добавление записи в таблицу \"" . $tables[$table_name]['name'] . "\"</h2>";
        } 
        else if ($mod == "edit")
        {
            echo "<h2 class='p-2 m-0'>Редактирование записи из $table_name</h2>";
            $db = new PDO("pgsql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $res = $db->query("SELECT * FROM public." . $table_name ." WHERE " . array_key_first($tables[$table_name]['fields']) . "= $item_id" );
            
            $row = $res->fetch();
        }
    ?>
    <?php     print_r($tables[$table_name]['fields'][0]);
    ?>

    <form action="save.php?mod=<?php echo $mod?>&table_name=<?php echo $table_name?><?php if ($mod == "edit") echo "&id=" . $item_id?>" method="post">
        <?php
            foreach ($tables[$table_name]['fields'] as $col_name => $col_name_ru) {
                if ($col_name == array_key_first($tables[$table_name]['fields'])){
                    continue;
                }
        ?>
        <div>
            <label class="form-label"><?php echo $col_name_ru?></label>
            <input class="form-control" name="<?php echo $col_name?>" placeholder="<?php echo $col_name_ru?>" value="<?php if(isset($row)) echo $row[$col_name]; ?>">
        </div>
                <?php
            }
        ?>
        <button type="submit" class="btn btn-success mt-3">Сохранить</button>
    </form>
    <a href="table.php?table_name=<?php echo $table_name?>">Назад</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>
```