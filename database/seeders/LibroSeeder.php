<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $categorias = [
            'Literatura Clásica',
            'Novela',
            'Poesía',
            'Drama',
            'Cuento',
        ];

        $categoriaIds = [];
        foreach ($categorias as $nombreCategoria) {
            $categoria = DB::table('categorias')->where('nombre', $nombreCategoria)->first();

            if (! $categoria) {
                $categoriaId = DB::table('categorias')->insertGetId([
                    'nombre' => $nombreCategoria,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            } else {
                $categoriaId = $categoria->id;
            }

            $categoriaIds[] = $categoriaId;
        }

        $libros = [
            ['titulo' => 'Don Quijote de la Mancha', 'autor' => 'Miguel de Cervantes', 'isbn' => '9788420412146', 'editorial' => 'Alfaguara', 'estatus' => 1],
            ['titulo' => 'Cien años de soledad', 'autor' => 'Gabriel García Márquez', 'isbn' => '9780307474728', 'editorial' => 'Vintage', 'estatus' => 1],
            ['titulo' => 'Crimen y castigo', 'autor' => 'Fiódor Dostoievski', 'isbn' => '9788420674209', 'editorial' => 'Alianza', 'estatus' => 1],
            ['titulo' => 'Madame Bovary', 'autor' => 'Gustave Flaubert', 'isbn' => '9788420668130', 'editorial' => 'Alianza', 'estatus' => 1],
            ['titulo' => 'La Odisea', 'autor' => 'Homero', 'isbn' => '9788424926397', 'editorial' => 'Gredos', 'estatus' => 1],
            ['titulo' => 'La Ilíada', 'autor' => 'Homero', 'isbn' => '9788424926380', 'editorial' => 'Gredos', 'estatus' => 1],
            ['titulo' => 'Fahrenheit 451', 'autor' => 'Ray Bradbury', 'isbn' => '9781451673319', 'editorial' => 'Simon and Schuster', 'estatus' => 1],
            ['titulo' => '1984', 'autor' => 'George Orwell', 'isbn' => '9780451524935', 'editorial' => 'Signet Classics', 'estatus' => 1],
            ['titulo' => 'Rebelión en la granja', 'autor' => 'George Orwell', 'isbn' => '9788499890959', 'editorial' => 'Debolsillo', 'estatus' => 1],
            ['titulo' => 'Orgullo y prejuicio', 'autor' => 'Jane Austen', 'isbn' => '9780141439518', 'editorial' => 'Penguin Classics', 'estatus' => 1],
            ['titulo' => 'Jane Eyre', 'autor' => 'Charlotte Brontë', 'isbn' => '9780141441146', 'editorial' => 'Penguin Classics', 'estatus' => 1],
            ['titulo' => 'Moby-Dick', 'autor' => 'Herman Melville', 'isbn' => '9780142437247', 'editorial' => 'Penguin Classics', 'estatus' => 1],
            ['titulo' => 'Hamlet', 'autor' => 'William Shakespeare', 'isbn' => '9788420674179', 'editorial' => 'Alianza', 'estatus' => 1],
            ['titulo' => 'Romeo y Julieta', 'autor' => 'William Shakespeare', 'isbn' => '9788420674186', 'editorial' => 'Alianza', 'estatus' => 1],
            ['titulo' => 'La metamorfosis', 'autor' => 'Franz Kafka', 'isbn' => '9788491051914', 'editorial' => 'Penguin Random House', 'estatus' => 1],
            ['titulo' => 'Pedro Páramo', 'autor' => 'Juan Rulfo', 'isbn' => '9786073142953', 'editorial' => 'RM', 'estatus' => 1],
            ['titulo' => 'Rayuela', 'autor' => 'Julio Cortázar', 'isbn' => '9788466326179', 'editorial' => 'Debolsillo', 'estatus' => 1],
            ['titulo' => 'La casa de los espíritus', 'autor' => 'Isabel Allende', 'isbn' => '9780307475435', 'editorial' => 'Vintage', 'estatus' => 1],
            ['titulo' => 'Ensayo sobre la ceguera', 'autor' => 'José Saramago', 'isbn' => '9788466354585', 'editorial' => 'Debolsillo', 'estatus' => 1],
            ['titulo' => 'Bodas de sangre', 'autor' => 'Federico García Lorca', 'isbn' => '9788420674193', 'editorial' => 'Alianza', 'estatus' => 1],
        ];

        $insertData = [];
        foreach ($libros as $index => $libro) {
            $libro['id_categoria'] = $categoriaIds[$index % count($categoriaIds)];
            $libro['created_at'] = $now;
            $libro['updated_at'] = $now;
            $insertData[] = $libro;
        }

        DB::table('libros')->upsert(
            $insertData,
            ['isbn'],
            ['titulo', 'autor', 'editorial', 'estatus', 'id_categoria', 'updated_at']
        );
    }
}
