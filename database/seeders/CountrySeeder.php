<?php

namespace Database\Seeders;

use App\Models\Country;
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
        foreach ($files as $file) {

            Country::factory()->create([
                'flag' => asset('images/flags/'.$file->getFilename()),
            ]);
        }
    }
}
