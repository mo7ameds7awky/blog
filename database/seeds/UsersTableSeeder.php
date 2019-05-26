<?php

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
        $user = App\User::create([
            'name' => 'Mohamed Shawky',
            'email' => 'admin@blog.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'avatar' => 'uploads/avatars/adminAvatar.png',
            'about' => 'This is the admin of this blog',
            'facebook' => 'facebook.com/admin.blog',
            'youtube' => 'youtube.com/admin.blog',
            'user_id' => $user->id
        ]);
    }
}
