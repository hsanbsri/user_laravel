<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data pengguna (user) jika belum ada
        DB::table('users')->insert([
            ['name' => 'User One', 'email' => 'userone@example.com', 'password' => Hash::make('password')],
            ['name' => 'User Two', 'email' => 'usertwo@example.com', 'password' => Hash::make('password')],
        ]);

        // Ambil ID pengguna yang baru ditambahkan
        $userIds = DB::table('users')->pluck('id');

        // Tambahkan data posting (post)
        DB::table('posts')->insert([
            ['user_id' => $userIds[0], 'title' => 'Post One', 'content' => 'This is the content of post one.'],
            ['user_id' => $userIds[1], 'title' => 'Post Two', 'content' => 'This is the content of post two.'],
        ]);
    }
}
