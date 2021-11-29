<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Writer::factory()->count(5)->create();
    }
}
