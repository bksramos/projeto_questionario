<?php

use Illuminate\Database\Seeder;
use App\User;
Use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

//        $brunno = User::create([
//            'name' => 'Brunno Ramos',
//            'email' => 'bks_ramos@hotmail.com',
//            'password' => bcrypt('12345678')
//        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@admin.com',
            'password' => bcrypt('12345678')
        ]);

        //$brunno->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $admin->roles()->attach($adminRole);

    }
}
