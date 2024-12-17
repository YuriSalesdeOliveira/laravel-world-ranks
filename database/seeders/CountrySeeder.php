<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = File::allFiles(public_path('images/flags'));

        $tags = [
            Tag::factory()->create([
                'name' => 'Member of the United Nations',
            ]),
            Tag::factory()->create([
                'name' => 'Independent',
            ]),
        ];

        foreach ($files as $file) {

            Country::factory()
                ->hasAttached($tags[array_rand($tags)])
                ->create([
                    'flag' => 'images/flags/'.$file->getFilename(),
                ]);
        }
    }
}
