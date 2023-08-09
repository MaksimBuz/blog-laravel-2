<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
   
    public function run(): void
    {
       $data=[
        [
        'name'=>'Автор неизвестен',
        'email'=>'dum@mail.ru',
        'password'=>bcrypt(str::random(16))
        ],
        [
        'name'=>'Автор',
        'email'=>'dum30@mail.ru',
        'password'=>bcrypt('122341521')
        ],
        [
        'name'=>'admin',
        'email'=>'admin30@mail.ru',
        'password'=>bcrypt('Jimka255')
        ]
        ];
        DB::table('users')->insert($data);
    }
}
