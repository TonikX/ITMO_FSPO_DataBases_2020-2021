<p>TS300</p>
<p>TS305</p>

<form action="?controller=final&action=final" method="post">
    <p>Материал корпуса:</p>
    <label><input type="radio" name="model" value="TS300" required>Аллюминий</label>
    <label><input type="radio" name="model" value="TS305">Нержавеющая сталь</label>
    <p>Присоединение:</p>
    <label><input type="radio" name="conn" value="N" required>NPT ¼</label><br>
    <label><input type="radio" name="conn" value="P">PT ¼</label><br>
    <p>Температура окружающей среды:</p>
    <label><input type="radio" name="temp" value="S" required>-200С ~ 700C</label><br>
    <label><input type="radio" name="temp" value="H">-200С ~ 1200C</label><br>
    <label><input type="radio" name="temp" value="L">-400С ~ 700C</label><br>
    <label><input type="radio" name="temp" value="U">-600С ~ 700C</label><br>
    <p>Наличие монометра:</p>
    <label><input type="radio" name="mono" value="0" required>Нет</label><br>
    <label><input type="radio" name="mono" value="1">Есть</label><br>
    <input type="submit">
</form>