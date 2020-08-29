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
        $('#Cars_row option').remove(); // OK!
        var phone = $(this).val(); // OK!
        $.ajax({
          cache : false,
          url : "{{ route('select_car')}}",
          data : {
            _token : "{{ csrf_token() }}",
            phone: phone
          },
          type: 'post',
          dataType : 'json',
          success: function(result)
          {
            $.each( result, function(key, value) {
                  $('#Cars_row').append($('<option>', {key:key, text:value}));
             });
          },
          error: function(xhr, status, error) {
            alert(xhr.responseText + '|\n' + status + '|\n' +error);
         }
        })
      }); // change
    }); // ready
  </script>

  <form class="form_new" action="{{ route('go_to_park') }}" method='get'>
    <label>Поместить автомобиль на парковку:</label>
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
        </select>
      </div>
      <div class="col-auto my-1">
        <button type="submit" class="btn btn-primary">На парковку</button>
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
