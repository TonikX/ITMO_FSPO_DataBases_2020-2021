<p>TS800</p>

<form action="?controller=final&action=final" method="post">
    <p>Наличие контроллера:</p>
    <label><input type="radio" name="model" value="TS800" onclick="javascript:Check_length();" required>Интелектуальный</label><br>
    <label><input id="ts820" type="radio" name="model" value="TS820" onclick="javascript:Check_length();"></label>Удаленный<br>
    <p>Тип позиционера:</p>
    <label><input id="linear_model" type="radio" onclick="javascript:Check_type();" name="model_type" value="L" required onselect="">Линейный</label><br>
    <label><input id="rotate_model" type="radio" onclick="javascript:Check_type();" name="model_type" value="R">Поворотный</label><br>
    <p>Взрывозащита:</p>
    <label><input type="radio" name="protect" value="N" required>Без взрывозащиты</label><br>
    <label><input type="radio" name="protect" value="A">Ex ia II C T5/T6</label><br>
    <p>Присоединение:</p>
    <label><input type="radio" name="conn" value="1" required>G ½ PT ¼</label><br>
    <label><input type="radio" name="conn" value="2">G ½ NPT ¼</label><br>
    <label><input type="radio" name="conn" value="3">NPT ½ NPT ¼</label><br>
    <label><input type="radio" name="conn" value="4">M20 NPT ¼</label><br>
    <label><input type="radio" name="conn" value="5">M20 G ¼</label><br>
    <div id="lever" style="display:none;">
        <p>Рычаг для линейного клапана</p>
        <label><input id="lever_req" type="radio" name="lever" value="1">10~80mm</label><br>
        <label><input type="radio" name="lever" value="2">70~150mm</label><br>
        <label><input type="radio" name="lever" value="3">с адаптером 70mm</label><br>
    </div>
    <div id="mount" style="display:none;">
        <p>Монтаж для поворотного клапана</p>
        <label><input id="mount_req" type="radio" name="mount" value="4">М6х34L</label><br>
        <label><input type="radio" name="mount" value="5">NAMUR</label><br>
    </div>
    <p>Климатическое исполнение</p>
    <label><input type="radio" name="clime" value="S" required>стандартное -30С ~ 60C</label><br>
    <label><input type="radio" name="clime" value="L">низкотемпературное -40С ~ 60C</label><br>
    <label><input type="radio" name="clime" value="U">ультра-низкотемпературное -60С ~ 60C</label><br>
    <label><input type="radio" name="clime" value="H">высокотемпературное -20С ~ 120C</label><br>
    <p>Коммуникация</p>
    <label><input type="radio" name="comm" value="0">нет</label><br>
    <label><input type="radio" name="comm" value="1">датчик обратной связи 4-20мА</label><br>
    <label><input type="radio" name="comm" value="2">HART</label><br>
    <p>Концевые выключатели</p>
    <label><input type="radio" name="switch" value="0">нет</label><br>
    <label><input type="radio" name="switch" value="1">Мезанического типа</label><br>
    <label><input type="radio" name="switch" value="2">Индуктивного типа</label><br>
    <div id="length_id" style="display:none;">
        <p>для TS820 длина кабеля</p>
        <label><input id="length_req" type="radio" name="length" value="1">5 метров</label><br>
        <label><input type="radio" name="length" value="2">10 метров</label><br>
        <label><input type="radio" name="length" value="X">X - метров по требованию заказчика (не более 20 метров)</label><br>
    </div>
    <input type="submit">
</form>

<script type="text/javascript">

    function Check_length() {
        if (document.getElementById('ts820').checked) {
            document.getElementById('length_id').style.display = 'block';
            document.getElementById('length_req').setAttribute("required", "");
        } else {
            document.getElementById('length_id').style.display = 'none';
            document.getElementById('length_req').removeAttribute("required");
        }
    }

    function Check_type() {
        if (document.getElementById('linear_model').checked) {
            document.getElementById('lever').style.display = 'block';
            document.getElementById('mount').style.display = 'none';
            document.getElementById('lever_req').setAttribute("required", "");
            document.getElementById('mount_req').removeAttribute("required");
        } else {
            document.getElementById('lever').style.display = 'none';
            document.getElementById('mount').style.display = 'block';
            document.getElementById('mount_req').setAttribute("required", "");
            document.getElementById('lever_req').removeAttribute("required");
        }
    }

</script>
