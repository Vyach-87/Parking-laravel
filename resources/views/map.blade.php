@extends('layouts.template')
  @section('content')
  <header >
    <h3> Карта парковки </h3>
  </header>
  <hr/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#Clients_row').change(function(){
        $('#Cars_row option').remove();
        var id = $(this).val();
        $.ajax({
          url : "{{ route('select_car')}}",
          data : {
            //"_token" : "{{ csrf_token() }}",
            "id": id
          },
          type: 'post',
          dataType : 'html',
          success : function()
          {
            $("information").text('TEST!');
          }
        })
      }); // change
    }); // ready
  </script>

  <form class="form_new" action='#' method='post'>
    <div class="form-row align-items-center">
      <div class="col-auto my-1">

        <select class="custom-select mr-sm-2" name="Clients_row" id="Clients_row" >
          <option selected>Клиенты</option>
          @foreach($Clients as $Client)
          <option value="{{ $Client->phone }}">{{ $Client->name}} тел.:{{$Client->phone }}</option>
          @endforeach
        </select>

      </div>
      <div class="col-auto my-1">
        <select class="custom-select mr-sm-2" name="Cars_row" id="Cars_row">
          <option selected>Автомобили</option>
          <option value='1'> #1</option>
          <option value='2'> #2</option>
        </select>
      </div>
      <div class="col-auto my-1">
        <button type="submit" class="btn btn-primary">Поместить на парковку</button>
      </div>
    </div>
  </form>
  <br/>

  <div class="main_table">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr> <th>#</th>
               <th>Автомобиль</th>
               <th>Цвет кузова</th>
               <th>Гос номер</th>
               <th>Убрать со стоянки</th>
           </tr>
        </thead>

        <tbody>
          @include('adds.form_func')
          <?php
            park_map_show($Clients, $Cars);
          ?>
        </tbody>
      </table>
    </div>
  </div>

  @endsection
