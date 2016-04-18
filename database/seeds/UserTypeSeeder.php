<?php

use Illuminate\Database\Seeder;
use Community\User;

class UsersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $userType = new UserType;
        $userType->id = '1';
        $userType->name = 'admin';       
        $userType->save();
        
        $userType = new UserType;
        $userType->id = '2';
        $userType->name = 'student';       
        $userType->save();
        

                
        
    }
}
