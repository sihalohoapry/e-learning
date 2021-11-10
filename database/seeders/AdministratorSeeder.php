<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User();
        $administrator->email = "admin@gmail.com";
        $administrator->password = \Hash::make("123123123");
        $administrator->name = "Administrator";
        $administrator->gender = "PRIA";
        $administrator->roles = "ADMIN";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
