<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Generador de nombres*/ 
        $nombre = ['Frutas', 'Italia', 'Carne'];

        for ($i = 1; $i <= 5; $i++) {
            DB::table('categorias')->insert([
                'id' => '0', 
                'nombre' => $nombre[array_rand($nombre)],
                'descripcion' => Str::random(5),  
            ]);
        }
    }
}
