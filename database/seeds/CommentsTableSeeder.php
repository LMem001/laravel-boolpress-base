<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Generator as Faker;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::where('published', 1)->get();

        foreach ($posts as $post) {
            $i = rand(0,3);
            while($i > 0) {
                $newComment = new Comment();
                $newComment->post_id = $post->id;
                if (rand(0,1)) {
                    $newComment->name = $faker->name();
                }
                $newComment->content = $faker->text();
                $newComment->save();

                $i--; 
            }
        }
    }
}
