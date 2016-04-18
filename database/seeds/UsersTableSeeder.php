<?php

use Illuminate\Database\Seeder;
use Community\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('test');
        
        $user = new User;
        $user->id = '1';
        $user->username = 'admin';
        $user->year_of = 'none';
        $user->first_name = 'Admin';
        $user->last_name = 'Adminovich';
        $user->email = 'admin@admin.com';
        $user->password = $password;
        $user->address = 'London, UK';
        $user->latitude = '51.5073509';
        $user->longitude = '-0.1277583';
        $user->programming = '75';
        $user->database = '60';
        $user->frontend = '60';
        $user->something = '60';        
        $user->role = 'admin';        
        $user->save();
        
        $user = new User;
        $user->id = '2';
        $user->username = 'qlerok';
        $user->year_of = '3';
        $user->first_name = 'Igor';
        $user->last_name = 'Jendoletov';
        $user->email = 'qlerok@my.com';
        $user->password = $password;
        $user->address = 'Dagenham, UK';
        $user->latitude = '55.378051';
        $user->longitude = '-3.43597299999999';
        $user->programming = '90';
        $user->database = '90';
        $user->frontend = '100';
        $user->something = '48';        
        $user->save();
        
        $user = new User;
        $user->id = '3';
        $user->username = 'andrei';
        $user->year_of = '2';
        $user->first_name = 'Andrei';
        $user->last_name = 'Loktin';
        $user->email = 'callme@gmail.com';
        $user->password = $password;
        $user->address = 'Manchester, UK';
        $user->latitude = '54.4791466';
        $user->longitude = '-3.2447445';
        $user->programming = '90';
        $user->database = '90';
        $user->frontend = '100';
        $user->something = '48';        
        $user->save();        
        
        $user = new User;
        $user->id = '4';
        $user->username = 'valera';
        $user->year_of = '3';
        $user->first_name = 'Valera';
        $user->last_name = 'Privet';
        $user->email = 'callme2@gmail.com';
        $user->password = $password;
        $user->address = 'Manchester, UK';
        $user->latitude = '53.4791466';
        $user->longitude = '-2.2447445';
        $user->programming = '90';
        $user->database = '90';
        $user->frontend = '100';
        $user->something = '48';        
        $user->save();
        
        
    }
}
