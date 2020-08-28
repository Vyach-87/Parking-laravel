<?php
// Home
Route::get('/', 'myController@show_All')->name('homepage');
// UPDATE data or ADD CAR - redirect
Route::get('/edit/{phone_id}', 'myController@edit')->name('edit');
// UPDATE data Submit
Route::post('/edit/{phone_id}/update', 'myController@upd_submit')->name('upd_submit');
// ADD NEW data Submit
Route::post('/edit/{phone_id}/add_new_car/{id}', 'myController@add_new_car_submit')->name('add_new_car_submit');
// Delete car * and client if last car
Route::get('/delete/{phone_id}/{car_id}', 'myController@del_car')->name('del');

// New Client ->
Route::get('/new_client', function () {
    return view('new_client');
})->name('add_new');
// New Client -> Submit
Route::post('/new_client/submit', 'myController@add_new')->name('add_new_submit');

// Parking Map
Route::get('/map', 'myController@show_Map')->name('parking_map');
// Parking Map - Car Out
Route::get('/map/{car_id}/out', 'myController@car_out')->name('away_from_park');
// Parking Map - Client-Car Select
Route::get('/map/select_car', 'myController@select_car')->name('select_car');
