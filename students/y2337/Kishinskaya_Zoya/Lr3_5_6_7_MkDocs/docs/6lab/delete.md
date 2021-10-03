
### delete.php
```
<?
    $table_name = $_GET['table_name'];
    $item_id = $_GET['id'];

    require_once "config.php";

    try {
        $db = new PDO("pgsql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $res = $db->query("DELETE FROM public.$table_name WHERE ". array_key_first($tables[$table_name]['fields']) ." = $item_id");
        header("Location: table.php?table_name=$table_name");
        exit;
    } catch (\Throwable $th) {
        echo "<pre>" . $th . "</pre>";
    }
?>
```