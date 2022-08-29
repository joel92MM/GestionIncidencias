<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        User::create([
            'id'=>1,
            'name' => 'Joel',
            'email' => 'joel@roquark.com',
           // 'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            // agregamos los nuevos campos
            // 'dni'=>'1233454353',
            // 'direccionDentista'=>'pepe rayuela',
            // 'telefonoDentista'=>'66632654',
            'role'=>'0',
        ]);
        User::create([
            'id'=>2,
            'name' => 'support',
            'email' => 'support@gmail.com',
           // 'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            // agregamos los nuevos campos
            // 'dni'=>'1233454353',
            // 'direccionDentista'=>'pepe rayuela',
            // 'telefonoDentista'=>'66632654',
            'role'=>'1',
        ]);
        User::create([
            'id'=>3,
            'name' => 'cliente',
            'email' => 'client@gmail.com',
           // 'email_verified_at' => now(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            // agregamos los nuevos campos
            // 'dni'=>'1233454353',
            // 'direccionDentista'=>'pepe rayuela',
            // 'telefonoDentista'=>'66632654',
            'role'=>'2',
        ]);
        User::factory()->count(50)->create();
    }
}
