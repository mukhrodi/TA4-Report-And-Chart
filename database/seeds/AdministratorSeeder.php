<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Admin;
        $user->username = "admin";
        $user->name = 'Administrator';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->jenis_kelamin = 'laki-laki';
        $user->level = 'admin';
        $user->save();
        $this->command->info('user berhasil di tambahkan');
    }
}
