<?php

namespace Database\Seeders;

use App\Models\Mypost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MypostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myPosts = [
            [
                'title' => 'vite-boolflix',
                'content' => 'Replica di Netflix tramite utilizzo di API',
                'github_link' => 'https://github.com/Domenic0Ferrari/vite-boolflix'
            ],
            [
                'title' => 'proj-html-vuejs',
                'content' => 'Replica di un vero shop online di abiti con Vite',
                'github_link' => 'https://github.com/Domenic0Ferrari/proj-html-vuejs'
            ],
            [
                'title' => 'proj-html-vuejs',
                'content' => 'Replica di un vero shop online di abiti con Vite',
                'github_link' => 'https://github.com/Domenic0Ferrari/proj-html-vuejs'
            ],
            [
                'title' => 'proj-html-vuejs',
                'content' => 'Replica di un vero shop online di abiti con Vite',
                'github_link' => 'https://github.com/Domenic0Ferrari/proj-html-vuejs'
            ],
            [
                'title' => 'proj-html-vuejs',
                'content' => 'Replica di un vero shop online di abiti con Vite',
                'github_link' => 'https://github.com/Domenic0Ferrari/proj-html-vuejs'
            ],
        ];

        foreach ($myPosts as $myPost) {
            Mypost::create($myPost);
        }
    }
}
