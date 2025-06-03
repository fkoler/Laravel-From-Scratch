<?php

namespace App\Models;


class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'description' => 'We are seeking a skilled software engineer to develop high-quality software solutions.'
            ],
            [
                'id' => 2,
                'title' => 'Frontend Developer',
                'description' => 'This is a frontend position working with PHP'
            ],
            [
                'id' => 3,
                'title' => 'Web Developer',
                'description' => 'Join our team as a Web Developer and create amazing web applications'
            ],
        ];
    }
}
