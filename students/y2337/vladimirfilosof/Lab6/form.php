<?
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <? echo "$table_name $mod" ?>
    </title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <?
                    if ($mod == "add")
                    {
                        echo "<h2 class='p-2 m-0'>Add new item to $table_name</h2>";
                    } 
                    else if ($mod == "edit")
                    {
                        echo "<h2 class='p-2 m-0'>Edit $item_id item from $table_name</h2>";
                        $db = new PDO("pgsql:host=".dbconfig::$host.";dbname=".dbconfig::$dbname, dbconfig::$dbuser, dbconfig::$dbpass);
                        $res = $db->prepare("SELECT * FROM " . $table_name ." WHERE " . $tables[$table_name][0] . "= :id" );
                        $res->execute(array(
                            'id' => $item_id
                        ));
                        
                        $row = $res->fetch();
                    }
                ?>
                <form action="save.php?mod=<?echo $mod?>&table_name=<?echo $table_name?><?if ($mod == "edit") echo "&id=" . $item_id?>" method="post" class="p-2">
                    <?
                        foreach ($tables[$table_name] as $col_name) {
                            if ($col_name == "id"){
                                continue;
                            }
                    ?>
                    <div class="form-group">
                        <label for="<?echo $col_name?>">
                            <?echo $col_name?></label>
                        <input class="form-control" name="<?echo $col_name?>" id="" placeholder="<?echo $col_name?>" value="<? echo $row[$col_name]; ?>">
                    </div>
                    <?
                        }
                    ?>
                    <input type="submit" value="Save" class="btn btn-success">
                    <a href="table.php?table_name=<?echo $table_name?>" class="btn btn-danger">Go back</a>
                </form>
                
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</body>

</html>