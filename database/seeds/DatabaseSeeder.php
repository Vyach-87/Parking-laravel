<?php

use Illuminate\Database\Seeder;
use app\models\client;
use app\models\car;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientTableSeeder::class);
        $this->call(CarTableSeeder::class);
    }
}
class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
          'name'=>'Иванов Иван Иванович',
          'sex'=>'M',
          'phone'=>'111111',
          'addres'=>'Иваново'
        ]);
        DB::table('clients')->insert([
          'name'=>'Петров Петр Петрович',
          'sex'=>'M',
          'phone'=>'222222',
          'addres'=>'Днепропетровск'
        ]);
        DB::table('clients')->insert([
          'name'=>'Сидоров Сидор Сидорович',
          'sex'=>'M',
          'phone'=>'333333',
          'addres'=>''
        ]);
        DB::table('clients')->insert([
          'name'=>'Иванова Иванна Ивановна',
          'sex'=>'F',
          'phone'=>'444444',
          'addres'=>'Иваново'
        ]);
        DB::table('clients')->insert([
          'name'=>'Петрова Петра Петровна',
          'sex'=>'F',
          'phone'=>'555555',
          'addres'=>'С.Петербург'
        ]);
    }
}
class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
          'phone'=>'111111',
          'mark'=>'KIA',
          'model'=>'ceed',
          'body_color'=>'blue',
          'g_num'=>'A111AA134',
          'park_flag'=>'Y'
        ]);
        DB::table('cars')->insert([
          'phone'=>'111111',
          'mark'=>'KIA',
          'model'=>'optima',
          'body_color'=>'red',
          'g_num'=>'B111BB134',
          'park_flag'=>'Y'
        ]);
        DB::table('cars')->insert([
          'phone'=>'111111',
          'mark'=>'KIA',
          'model'=>'rio',
          'body_color'=>'grey',
          'g_num'=>'C111C134',
          'park_flag'=>'N'
        ]);
        DB::table('cars')->insert([
          'phone'=>'222222',
          'mark'=>'FORD',
          'model'=>'focus',
          'body_color'=>'blue',
          'g_num'=>'A222AA134',
          'park_flag'=>'Y'
        ]);
        DB::table('cars')->insert([
          'phone'=>'333333',
          'mark'=>'MAZDA',
          'model'=>'CX-5',
          'body_color'=>'rouge',
          'g_num'=>'C333C134',
          'park_flag'=>'N'
        ]);
        DB::table('cars')->insert([
          'phone'=>'444444',
          'mark'=>'RANGE ROVER',
          'model'=>'vogue',
          'body_color'=>'black',
          'g_num'=>'A444AB34',
          'park_flag'=>'N'
        ]);
        DB::table('cars')->insert([
          'phone'=>'555555',
          'mark'=>'CITROEN',
          'model'=>'elysse',
          'body_color'=>'rouge',
          'g_num'=>'C555CC134',
          'park_flag'=>'N'
        ]);
        DB::table('cars')->insert([
          'phone'=>'555555',
          'mark'=>'CITROEN',
          'model'=>'c4 b7',
          'body_color'=>'burrasque',
          'g_num'=>'B555AX134',
          'park_flag'=>'Y'
        ]);
    }
}
