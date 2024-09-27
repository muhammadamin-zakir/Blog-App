<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();
        $categories = Category::factory(11)->create();

        $blogs = [];
        $comments = [];

        foreach ($users as $user) {
            foreach ($categories as $category) {
                $blog = Blog::factory()->forUser($user->id)->forCategory($category->id)->create();
                $blogs[] = $blog;
            }
        }
        foreach ($users as $user) {
            foreach ($blogs as $blog) {
                $comment = Comment::factory()->forUser($user->id)->forBlog($blog->id)->create();
                $comments[] = $comments;
            }
        }
    }
}
