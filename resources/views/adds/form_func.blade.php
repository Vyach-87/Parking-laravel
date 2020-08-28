<?php
// Вывод таблицы клиентов-автомобилей
function main_table_show($Client_data, $Car_data) {
  $table_id=1;
  foreach($Client_data as $Client) {
    foreach($Car_data->where('phone','=',$Client->phone) as $Car) {
      ?>
      <tr> <td><?php echo $table_id ?></td>
           <td><?php echo $Client->name ?></td>
           <td><?php echo $Car->mark,' ', $Car->model ?></td>
           <td><?php echo $Car->g_num ?></td>
           <td> <a href="{{ route('edit', $Client->phone)}}"><button class="btn btn-primary">Редактировать</button></a> </td>
           <td> <a href="{{ route('del', ['phone_id'=>$Car->phone, 'car_id'=>$Car->g_num])}}"><button class="btn btn-danger">Удалить</button></a> </td>
      </tr>
      <?php
      $table_id++;
    }
  }
}
// Конец 'Вывод таблицы клиентов-автомобилей'

// Форма ввода данных клиента
function client_fields($Client) // (<[Клиент]>)
{ ?>
  <!-- Client specifications-->
  <div class="col-md-6 mb-3">
    <label>Фамилия Имя Отчество</label>
    <input name='client_name' type="text" class="form-control" placeholder='от 3 до 150 символов'
      value='<?php if(!(Request::is("new_client"))) {echo $Client->name;} ?>' required>
  </div>
  <!-- Radio button "sex"-->
  <div class="col-md-6 mb-3">
    <label>Пол</label><br/>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="sex_Radio" name="sex_Radio" class="custom-control-input"
        value="M" <?php if(!(Request::is("new_client"))) {echo ($Client->sex=="M")?"checked":"";}
                        else {echo "checked";} ?> >
      <label class="custom-control-label" for="sex_Radio">мужской</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="sex_Radio0" name="sex_Radio" class="custom-control-input"
        value="F" <?php if(!(Request::is("new_client"))) {echo ($Client->sex=="F")?"checked":"";} ?> >
      <label class="custom-control-label" for="sex_Radio0">женский</label>
    </div>
  </div>
  <!-- Phone-->
  <div class="col-md-6 mb-3">
    <label>Телефон</label>
    <input name='client_phone' type="text" class="form-control" placeholder="81234567890"
      value='<?php if(!(Request::is("new_client"))) {echo $Client->phone;} ?>' required>
    <div class="invalid-feedback">
      Введите свой контактный телефон!
    </div>
  </div>
  <!-- Addres-->
  <div class="col-md-6 mb-3">
    <label>Адрес</label>
    <input name='client_addres' type="text" class="form-control"
      value='<?php if(!(Request::is("new_client"))) {echo $Client->addres;} ?>'>
  </div>
  <hr/>
<!-- End of 'Car specifications'-->
<?php
}
// Конец 'Форма ввода данных клиента'

// Форма ввода данных автомобиля
function car_fields($Car, $num, $show) // (<[Автомобиль]>,<Номер Авто>,<Показать значение>)
{ ?>
  <!-- Car specifications-->
  <div class="col-md-10 mb-3">
    <label>Автомобиль #<?php echo $num ?></label><br/>
    <div class="form-row">
      <div class="col-md-3 mb-2">
        <!-- Mark-->
        <label>Марка</label>
        <input name='car_mark<?php echo $num ?>' type="text" class="form-control"
          value='<?php if($show) {echo $Car->mark;} ?>' required>
        <div class="invalid-feedback">
          Введите марку!
        </div>
      </div>
      <!-- Model-->
      <div class="col-md-3 mb-2">
        <label>Модель</label>
        <input name='car_model<?php echo $num ?>' type="text" class="form-control"
          value='<?php if($show) {echo $Car->model;} ?>' required>
        <div class="invalid-feedback">
          Введите модель!
        </div>
      </div>
      <!-- Goverment Number-->
      <div class="col-md-3 mb-2">
        <label>Гос.номер РФ</label>
        <input name='car_number<?php echo $num ?>' type="text" class="form-control"
          value='<?php if($show) {echo $Car->g_num;} ?>' required>
        <div class="invalid-feedback">
          Введите госномер!
        </div>
      </div>
      <!-- Color-->
      <div class="col-md-3 mb-2">
        <label>Цвет кузова</label>
        <input name='car_color<?php echo $num ?>' type="text" class="form-control"
          value='<?php if($show) {echo $Car->body_color;} ?>' required>
        <div class="invalid-feedback">
          Введите цвет!
        </div>
      </div>
      <!-- Parking Flag-->
      <div class="col-md-6 mb-3">
        <label>Автомобиль на стоянке</label><br/>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="park_Radio<?php echo $num ?>" name="park_Radio<?php echo $num ?>" class="custom-control-input"
            value="Y" <?php if($show) {echo ($Car->park_flag=="Y")?"checked":"";}
                            else {echo "checked";} ?> >
          <label class="custom-control-label" for="park_Radio<?php echo $num ?>">Да</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="park_RadioN<?php echo $num ?>" name="park_Radio<?php echo $num ?>" class="custom-control-input"
            value="N" <?php if($show) {echo ($Car->park_flag=="N")?"checked":"";} ?> >
          <label class="custom-control-label" for="park_RadioN<?php echo $num ?>">Нет</label>
        </div>
      </div>

    </div>
  </div>
<!-- End of 'Car specifications'-->
<?php
}
// Конец 'Форма ввода данных автомобиля'

// Вывод Карты Парковки
function park_map_show($Clients, $Cars) {
  $table_id=1;
  foreach($Cars->where('park_flag','=','Y') as $Car) {
    ?>
    <tr> <td><?php echo $table_id ?></td>
         <td><?php echo $Car->mark,' ', $Car->model ?></td>
         <td><?php echo $Car->body_color ?></td>
         <td><?php echo $Car->g_num ?></td>
         <td> <a href="{{ route('away_from_park', $Car->g_num) }}"><button class="btn btn-danger">Убрать</button></a> </td>
    </tr>
      <?php
      $table_id++;
  }
}
// Конец 'Вывод Карты Парковки'
?>
