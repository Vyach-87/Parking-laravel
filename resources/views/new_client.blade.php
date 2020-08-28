@extends('layouts.template')
  @section('content')
  <header >
      <h3> Новый клиент </h3>
      <hr/>
  </header>

   <form class="form_new" action="{{ route('add_new_submit')}}" method='post'>
     @csrf
     <form class="needs-validation" novalidate>
         @include('adds.form_func')
         <?php
           client_fields([]);
           car_fields([],1,false);
         ?>
         <div class="col-md-3 mb-2">
           <button class="btn btn-primary" type="submit">Сохранить</button>
         </div>
         <hr/>
         <br/>
       </form>
     </form>

  @endsection
