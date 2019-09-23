<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(ProductBrandsTableSeeder::class);        
        $path = 'app/developer_docs/countries.sql';
        DB::unprepared(file_get_contents($path));
    
        }
}
