<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Generador de nombres*/ 
        $nombre = ['Manzana', 'Pera', 'Pizza', 'Longaniza', 'Hamburguesa', 'Pasta', 'Platano', 'Frankfurt'];
        /*Generador de categoria*/ 
        $categoria = ['Frutas', 'Italia', 'Carne'];

        for ($i = 1; $i <= 5; $i++) {
            DB::table('productos')->insert([
                'id' => '0', 
                'nombre' => $nombre[array_rand($nombre)],
                'descripcion' => Str::random(5),
                'unidades' => rand(1, 30),
                'precio_unitario' => number_format(rand(1000, 9999) / 100, 2),
                'categoria' => $categoria[array_rand($categoria)],  
            ]);
        }
    }
}
