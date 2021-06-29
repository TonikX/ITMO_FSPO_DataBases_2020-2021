<?php


class Show
{
  function show11($row):void{
    echo '
    <tr>
      <th>
        <div class="box">
          <div class="item">
            <p class="text">' . $row['id_книги'] . '</p>
          </div>
          <div class="item">
            <p class="text">' . $row['название_книги'] . '</p>
          </div>
          <div class="item">
            <div class="item">
              <p class="choose"><input type="checkbox" name="chkbx[]" value="'. $row['id_книги'] .'"/> Выбрать</p>
            </div>
          </div>
        </div>
      </th>
    </tr>
    ';
  }
  function edit_show($row):void{
    echo '
    <tr>
      <th>
        <div class="box">
          <div class="item">
            <p class="text">' . $row['id_книги'] . '</p>
          </div>
          <div class="item">
              <p class="text">' . $row['название_книги'] . '</p>
          </div>
          <div class="item">
            <div class="item">
              <a href="edit_prod.php?prod_id='.$row['id_книги'].'">Редактировать данные</a>
            </div>
          </div>
        </div>
      </th>
    </tr>
    ';
  }
}