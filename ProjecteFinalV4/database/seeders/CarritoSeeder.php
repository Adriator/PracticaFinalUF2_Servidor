<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Generador de productos*/ 
        $producto = ['Manzana', 'Pera', 'Pizza', 'Longaniza', 'Hamburguesa', 'Pasta', 'Platano', 'Frankfurt'];

        for ($i = 1; $i <= 5; $i++) {
            $cantidad = rand(1, 30);
            $precio_producto = number_format(rand(1000, 9999) / 100, 2);
            $total = number_format($cantidad * $precio_producto, 2);

            // Elimina comas de la cadena $total
            $total = str_replace(',', '', $total);
    
            DB::table('carrito')->insert([
                'id' => $i,
                'producto' => $producto[array_rand($producto)],
                'cantidad' => $cantidad,
                'precio_producto' => $precio_producto,
                'total' => $total,
            ]);
        }
    }
}
