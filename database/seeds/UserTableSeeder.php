<?php

use App\Host;
use App\Refugee;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'test@test.de',
            'password' => bcrypt('testtest')
        ]);
        $host = new Host();
        $host->name = 'Nico A';
        $user->host()->save($host);

        $user = User::create([
            'email' => 'test2@test.de',
            'password' => bcrypt('testtest')
        ]);
        $refugee = new Refugee();
        $refugee->name = 'Nico F';
        $user->refugee()->save($refugee);
    }
}
