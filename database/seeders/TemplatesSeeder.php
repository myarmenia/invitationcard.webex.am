<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'category_id' => 1,
                'key' => 'wedding',
            ],
            [
                'category_id' => 2,
                'key' => 'birthday',
            ],
            [
                'category_id' => 3,
                'key' => 'event',
            ]
        ];

        foreach ($templates as $key => $template) {
            Template::updateOrCreate([
                'category_id' => $template['category_id'],
                'key' => $template['key']
            ]);

        }
    }
}
