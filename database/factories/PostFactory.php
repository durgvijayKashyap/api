<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create();
        } 
            
    ];
});
