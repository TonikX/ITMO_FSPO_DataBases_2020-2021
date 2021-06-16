### Добавление объекта в таблицу animals

```
if (strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='animals'>";
    echo "<input type = 'hidden' name='mode' value='add'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "type<br>";
    echo "<input type = 'text' name='type'><br>";
    echo "dob<br>";
    echo "<input type = 'text' name='dob'><br>";
    echo "sex<br>";
    echo "<input type = 'text' name='sex'><br>";
    echo "<input type='submit' value='Save'>" ;
}
```

SQL - запрос для добавления

```
if ( strcmp($table, 'animals') == 0 && strcmp($mode, 'add') == 0 ){
    $sql = 'INSERT INTO $table VALUES ($id, "$type", "$dob", "$sex")';
}
```

### Удаление объекта из таблицы doctor по id

```
if (strcmp($table, 'doctor') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='remove'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
```

SQL - запрос для удаления

```
if ( strcmp($table, 'doctor') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'DELETE FROM $table WHERE id = $id';
}
```

###Поиск надзирателя по id

```
if (strcmp($table, 'overseer') == 0 && strcmp($mode, 'add') == 0){
    echo "<input type = 'hidden' name='table' value='doctor'>";
    echo "<input type = 'hidden' name='mode' value='select'>";
    echo "id<br>";
    echo "<input type = 'text' name='id'><br>";
    echo "<input type='submit' value='Save'>" ;
}
```

SQL-запрос для поиска по id

```
if ( strcmp($table, 'overseer') == 0 && strcmp($mode, 'remove') == 0 ){
    $sql = 'SELECT * FROM $table WHERE id = $id';
}
```
