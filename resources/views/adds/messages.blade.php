@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if(session('success'))
<div class="alert alert-success">
  <ul>
    {{ session('success') }}
  </ul>
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning">
  <ul>
    {{ session('warning') }}
  </ul>
</div>
@endif
