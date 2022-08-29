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

         User::factory()->count(50)->create();

        User::create([
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
    }
}
