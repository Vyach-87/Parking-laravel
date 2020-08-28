@extends('layouts.template')
  @section('content')
  <header >
    <h3> Все клиенты </h3>
  </header>
    <div class="main_table">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr> <th>#</th>
                 <th>ФИО</th>
                 <th>Автомобиль</th>
                 <th>Гос номер</th>
                 <th>Редактировать</th>
                 <th>Удалить</th>
             </tr>
          </thead>
            @include('adds.form_func')
            <?php main_table_show($Client_data, $Car_data); ?>
          <tbody>
            <?php
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      {{ $Car_data->links() }}
    </div>

  @endsection
