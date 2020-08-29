<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\myRequest;
use App\Http\Requests\new_car_Request;
use App\models\client;
use App\models\car;

class myController extends Controller
{
  // Показ таблицы клиент-авто на главной
  public function show_All() {
    $Client_data = Client::all();
    $Car_data = Car::orderBy('phone')->paginate(5);
    return view('index', ['Client_data' => $Client_data], ['Car_data' => $Car_data]);
  }
  // Переход на Редактирование данных
  public function edit($phone_id){
    $Client = new Client();
    $Client_data=$Client->where('phone','=',$phone_id)->get();
    $Car = new Car();
    $Car_data=$Car->where('phone','=',$phone_id)->orderBy('g_num')->get();

    return view('edit_data', ['Client_data' => $Client_data], ['Car_data' => $Car_data]);
  }
  // Редактирование данных
  public function upd_submit($phone_id, myRequest $req){
    $client = Client::find($phone_id);
    $client->name = $req->input('client_name');
    $client->sex = $req->input('sex_Radio');
    $client->phone = $req->input('client_phone');
    $client->addres = $req->input('client_addres');
    $client->save();
    $car_data = Car::where('phone','=',$phone_id)->orderBy('g_num')->get();
    $id=1;
    foreach ($car_data as $car) {
      $car->phone = $client->phone;
      $car->mark = $req->input("car_mark".$id);
      $car->model = $req->input("car_model".$id);
      $car->g_num = $req->input("car_number".$id);
      $car->body_color = $req->input("car_color".$id);
      $car->park_flag = $req->input("park_Radio".$id);
      $car->save();
      $id++;
    }
    return redirect()->route('homepage')->with('success','Изменения сохранены!');
  }
  // Добавление автомобиля
  public function add_new_car_submit($phone_id, $id, new_car_Request $req){
    $car = new Car();
    $car->phone = $phone_id;
    $car->mark = $req->input("car_mark$id");
    $car->model = $req->input("car_model$id");
    $car->g_num = $req->input("car_number$id");
    $car->body_color = $req->input("car_color$id");
    $car->park_flag = $req->input("park_Radio$id");

    $car->save();
    return redirect()->route('homepage')->with('success','Новый Автомобиль добавлен!');
  }

  // Удаление машины и клиента, если машин у него больше нет
  public function del_car($phone_id, $car_id){
    $del_client_message = 'У клиента ещё остались автомобили!';

    $count = Car::where('phone','=', $phone_id)->count();

    $Car = Car::where('g_num','=',$car_id);
    $Car->delete();

    if ($count==1){
      $Client = Client::where('phone','=', $phone_id);
      $Client->delete();
      $del_client_message = 'У клиента больше нет автомобилей! Клиент удалён!';
    }
    return redirect()->route('homepage')->with('success',
    "Автомобиль с номером $car_id удалён! $del_client_message");
  }

  // Сохранение нового клиента
  public function add_new(myRequest $req) {
    $car = new Car();
    $car->phone = $req->input('client_phone');
    $car->mark = $req->input('car_mark1');
    $car->model = $req->input('car_model1');
    $car->g_num = $req->input('car_number1');
    $car->body_color = $req->input('car_color1');
    $car->park_flag = $req->input('park_Radio1');

    $client = new Client();
    $client->name = $req->input('client_name');
    $client->sex = $req->input('sex_Radio');
    $client->phone = $req->input('client_phone');
    $client->addres = $req->input('client_addres');

    $client->save();
    $car->save();
    return redirect()->route('homepage')->with('success','Новый клиент добавлен!');
  }

  // Показ Карты парковки
  public function show_Map() {
    $Client_data = Client::all();
    $Car_data = Car::orderBy('mark')->get();
    return view('map', ['Clients' => $Client_data], ['Cars' => $Car_data]);
  }
  // Убрать автомобиль с парковки
  public function car_out($car_id) {
    $car = Car::find($car_id);
    $car->park_flag = 'N';
    $car->save();
    return redirect()->route('parking_map')->with('success', "Автомобиль $car_id покинул парковку!");
  }
  // Выбор Клиента select
  public function select_car(Request $req) {
    $cars = Car::where('phone','=',$req->get('phone'))->where('park_flag','=','N')->get();
    $output = [];
    foreach( $cars as $car )
    {
       $output[$car->g_num] = $car->g_num;
    }
    return $output;
  }
  // Поместить автомобиль на парковку
  public function car_in(Request $req) {
    $car_id = $req->input('Cars_row');
    $client_id = $req->input('Clients_row');
    if (($car_id=='Автомобили')||($car_id=='')) {
      if ($client_id=='Клиенты'){
        return redirect()->route('parking_map')->with('warning', "Сначала выберите Клиента из списка!");
      } else {
        return redirect()->route('parking_map')->with('success', "Все автомобили клиента уже на парковке!");
      }
    }
    $car = Car::find($car_id);
    $car->park_flag = 'Y';
    $car->save();
    return redirect()->route('parking_map')->with('success', "Автомобиль $car_id помещен на парковку!");
  }

}
