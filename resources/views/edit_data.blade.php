@extends('layouts.template')
  @section('content')
  <header >
      <h3> <?php echo $Client_data[0]->name ?> </h3>
      <hr/>
  </header>
  <!-- UPDATE form -->
  <?php
    $num=1;
  ?>
  <form class="form_new" action="{{ route('upd_submit', $Client_data[0]->phone)}}" method='post'>
    @csrf
    <form class="needs-validation" novalidate>
        @include('adds.form_func')
        <?php
          client_fields($Client_data[0]);
          foreach($Car_data as $Car) {
            car_fields($Car, $num, true);
            $num++;
          }

        ?>
        <div class="col-md-3 mb-2">
          <button class="btn btn-warning" type="submit">Сохранить изменения</button>
        </div>
        <hr/>
        <br/>
      </form>
   </form>
   <!-- END UPDATE form -->

   <!-- ADD NEW form -->
   <form class="form_new" action="{{ route('add_new_car_submit', ['phone_id'=>$Client_data[0]->phone, 'id'=>$num])}}" method='post'>
     @csrf
     <form class="needs-validation" novalidate>
         <?php
           car_fields([], $num, false);
         ?>
         <div class="col-md-3 mb-2">
           <button class="btn btn-primary" type="submit">Добавить автомобиль</button>
         </div>
         <hr/>
         <br/>
       </form>
    </form>
    <!-- END ADD NEW form -->
  @endsection
