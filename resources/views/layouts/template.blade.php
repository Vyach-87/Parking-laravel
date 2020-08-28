<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Парковка для стажера</title>
  </head>
  <body>
<!-- 'Индикация страницы' -->
    <?php
      $home = '';
      $new = '';
      $map = '';
    ?>

    @if(Request::is('/'))
    <?php
      $home = 'active';
    ?>
    @elseif(Request::is('new_client'))
    <?php
      $new = 'active';
    ?>
    @elseif(Request::is('map'))
    <?php
      $map = 'active';
    ?>
    @endif
<!-- Конец 'Индикация страницы' -->

    @include('adds.messages')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{route('homepage')}}">myParking</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link <?php echo $home ?>" href="{{route('homepage')}}">Все клиенты <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link <?php echo $new ?>" href="{{route('add_new')}}">Новый клиент</a>
          <a class="nav-item nav-link <?php echo $map ?>" href="{{route('parking_map')}}">Карта парковки</a>
        </div>
      </div>
    </nav>
    <br></br>
    <hr></hr>
    @yield('content')
  </body>
</html>
