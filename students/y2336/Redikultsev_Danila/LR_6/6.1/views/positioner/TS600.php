<p>TS600</p>

<form action="?controller=final&action=final" method="post">
    <input type="hidden" name="model" value="TS600">
    <p>Тип позиционера:</p>
        <label><input id="linear_model" type="radio" onclick="javascript:Check();" name="model_type" value="L" required onselect="">Линейный</label><br>
        <label><input id="rotate_model" type="radio" onclick="javascript:Check();" name="model_type" value="R">Поворотный</label><br>
    <p>Взрывозащита:</p>
        <label><input type="radio" name="protect" value="N" required>Без взрывозащиты</label><br>
        <label><input type="radio" name="protect" value="A">Ex ia II C T5/T6</label><br>
        <label><input type="radio" name="protect" value="C">Exdb IIC T5/T6</label><br>
    <p>Присоединение:</p>
        <label><input type="radio" name="conn" value="1" required>G ½ PT ¼</label><br>
        <label><input type="radio" name="conn" value="2">G ½ NPT ¼</label><br>
        <label><input type="radio" name="conn" value="3">NPT ½ NPT ¼</label><br>
        <label><input type="radio" name="conn" value="4">M20 NPT ¼</label><br>
        <label><input type="radio" name="conn" value="5">M20 G ¼</label><br>
    <div id="lever" style="display:none;">
        <p>Рычаг для линейного клапана</p>
        <label><input id="lever_req" type="radio" name="lever" value="1">10~40mm</label><br>
        <label><input type="radio" name="lever" value="2">40~70mm</label><br>
        <label><input type="radio" name="lever" value="3">70~100mm</label><br>
        <label><input type="radio" name="lever" value="4">100~150mm</label><br>
    </div>
    <div id="mount" style="display:none;">
        <p>Монтаж для поворотного клапана</p>
        <label><input id="mount_req" type="radio" name="mount" value="4">М6х34L</label><br>
        <label><input type="radio" name="mount" value="5">NAMUR</label><br>
    </div>
        <p>Климатическое исполнение</p>
        <label><input type="radio" name="clime" value="S" required>стандартное -20С ~ 70C</label><br>
        <label><input type="radio" name="clime" value="L">низкотемпературное -40С ~ 60C</label><br>
        <label><input type="radio" name="clime" value="U">ультра-низкотемпературное -60С ~ 60C</label><br>
        <label><input type="radio" name="clime" value="H">высокотемпературное -20С ~ 120C</label><br>
    <div id="linear" style="display:none;">
        <p>Для линейного позиционера (тип L)</p>
        <label><input id="linear_req" type="radio" name="linear" value="0">нет</label><br>
        <label><input type="radio" name="linear" value="1">датчик обратной связи 4-20мА</label><br>
        <label><input type="radio" name="linear" value="2">Концевые выключатели:</label><br>
    </div>
    <div id="rotate" style="display:none;">
        <p>Для поворотного позиционера (тип R)</p>
        <label><input id="rotate_req" type="radio" name="rotate" value="0">нет</label><br>
        <label><input type="radio" name="rotate" value="1">датчик обратной связи 4-20мА (только для невзрывозащищенного исполнения)</label><br>
        <label><input type="radio" name="rotate" value="2">концевые выключатели невзрывозащищенного типа</label><br>
        <label><input type="radio" name="rotate" value="3">концевые выключатели взрывозащищенного типа</label><br>
        <label><input type="radio" name="rotate" value="4">датчик обратной связи и концевые выключатели</label><br>
        <label><input type="radio" name="rotate" value="5">датчик обратной связи и концевые выключатели (для взрывозащищенного исполнения)</label><br>
        <label><input type="radio" name="rotate" value="6">площадка под свитч-бокс</label><br>
    </div>
    <input type="submit">
</form>

<script type="text/javascript">

    function Check() {
        if (document.getElementById('linear_model').checked) {
            document.getElementById('lever').style.display = 'block';
            document.getElementById('linear').style.display = 'block';
            document.getElementById('rotate').style.display = 'none';
            document.getElementById('mount').style.display = 'none';
            document.getElementById('lever_req').setAttribute("required", "");
            document.getElementById('linear_req').setAttribute("required", "");
            document.getElementById('mount_req').removeAttribute("required");
            document.getElementById('rotate_req').removeAttribute("required");
        } else {
            document.getElementById('lever').style.display = 'none';
            document.getElementById('linear').style.display = 'none';
            document.getElementById('rotate').style.display = 'block';
            document.getElementById('mount').style.display = 'block';
            document.getElementById('mount_req').setAttribute("required", "");
            document.getElementById('rotate_req').setAttribute("required", "");
            document.getElementById('lever_req').removeAttribute("required");
            document.getElementById('linear_req').removeAttribute("required");
        }
    }

</script>
