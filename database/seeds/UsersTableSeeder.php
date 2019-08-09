<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['', 'Monica', 'Chandler', 'Joey', 'Phoebe', 'Rachel', 'Ross'];

        for($id = 1; $id <= 6; $id +=1)
        {
            $user = User::create([
                'name' => $names[$id],
                'email' => strtolower($names[$id]) . '.test@gmail.com',
                'password' => Hash::make("password"),
            ]);

            $post = Post::create([
                'id' => $id,
                'user_id' => $id,
                'title' => 'My first post',
                'body' => 'I was in Friends',
            ]);
        }

    }
}
