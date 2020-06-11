<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'johnD',
            'role' => 'tourist',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'fname' => 'John',
            'lname' => 'Doe',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tempus urna et pharetra pharetra massa massa.',
            'title' => 'Mr.',
            'gender' => 'Male',
            'dp_url' => 'https://i.pravatar.cc/300',
            'contact_no' => '415-792-0429',
            'dob' => '1995-12-05',
            'passport_id' => '02e06db5-7d08-370d-b13f-e84ff57f5c92',
            'nic' => '02e06db5-7d08-370d-b13f-e84ff57f5c92',
            'address' => '8081 Arnulfo Lakes Feestborough, RI 55754-3945',
            'lang_primary' => 'english',
            'lang_secondary' => '',
            'country' => 'Sri Lanka',
        ]);

        User::create([
            'username' => 'janeD',
            'role' => 'guide',
            'email' => 'jane@gmail.com',
            'password' => Hash::make('password'),
            'fname' => 'Jane',
            'lname' => 'Doe',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tempus urna et pharetra pharetra massa massa.',
            'title' => 'Miss.',
            'gender' => 'Femal',
            'dp_url' => 'https://i.pravatar.cc/300',
            'contact_no' => '415-792-0429',
            'dob' => '1995-12-05',
            'passport_id' => '02e06db5-7d08-370d-b13f-e84ff57f5c92',
            'nic' => '02e06db5-7d08-370d-b13f-e84ff57f5c92',
            'address' => '8081 Arnulfo Lakes Feestborough, RI 55754-3945',
            'lang_primary' => 'english',
            'lang_secondary' => '',
            'country' => 'UK',
        ]);
    }
}
