<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'nama' => 'Admin',
            'email' => 'admin@transisi.id',
            'password' => \Hash::make('transisi')
        ];

        try {
            User::create($admin);
        } catch (\Exception $e) {
            
        }
    }
}
