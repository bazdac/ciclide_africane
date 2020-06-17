<?php

use Illuminate\Database\Seeder;

class CategorieProdusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie_produses')->insert([
            'nume' => 'Apa sarata'
        ]);
        DB::table('categorie_produses')->insert([
            'nume' => 'Apa dulce'
        ]);
        DB::table('categorie_produses')->insert([
            'nume' => 'Hrana pesti'
        ]);
    }
}
