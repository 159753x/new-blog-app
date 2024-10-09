<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(6)->create();
        $users = User::all();
        
        foreach($users as $user){
            // var_dump($user);
            // var_dump($user->id);
            // var_dump($user->getId());
            // die;
            Post::factory()->count(2)->create(['user_id' => $user->id]);
        }
        $posts = Post::all();

        foreach($posts as $post){
            
            for($i=0;$i<3;$i++){
                Comment::factory()->create(['user_id' => rand(1,6), 'post_id' => $post->id]);
            }
            
        }
    }
}
