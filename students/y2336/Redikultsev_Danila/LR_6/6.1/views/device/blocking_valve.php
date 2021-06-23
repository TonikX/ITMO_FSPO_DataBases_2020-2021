<p>TS200</p>

<form action="?controller=final&action=final" method="post">
    <input type="hidden" name="model" value="TS200">
    <p>Тип привода:</p>
    <label><input type="radio" name="type" value="S" required>Одностроннего действия</label><br>
    <label><input type="radio" name="type" value="D">Двустороннего действия</label><br>
    <p>Присоединение:</p>
    <label><input type="radio" name="conn" value="N" required>NPT ¼</label><br>
    <label><input type="radio" name="conn" value="P">PT ¼</label><br>
    <p>Температура окружающей среды:</p>
    <label><input type="radio" name="temp" value="S" required>-200С ~ 700C</label><br>
    <label><input type="radio" name="temp" value="H">-200С ~ 1200C</label><br>
    <label><input type="radio" name="temp" value="L">-400С ~ 700C</label><br>
    <label><input type="radio" name="temp" value="U">-600С ~ 700C</label><br>
    <input type="submit">
</form>
