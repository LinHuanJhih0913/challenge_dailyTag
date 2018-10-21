<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $user_id = [1, 2, 3, 4, 5];
    $tags = ['html', 'css', 'js', 'php', 'sql', 'c', 'c++', 'java', 'c#', 'python'];
    return [
        'user_id' => $user_id[rand(0, 4)],
        'tag' => $tags[rand(0, 9)],
    ];
});
