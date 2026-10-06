<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tek   = Category::where('name', 'Teknologi')->first()->id;
        $sastra = Category::where('name', 'Sastra')->first()->id;
        $sains = Category::where('name', 'Sains')->first()->id;

        $books = [
            ['category_id' => $tek,    'title' => 'Clean Code',                  'author' => 'Robert C. Martin',   'publisher' => 'Prentice Hall',  'year' => 2008, 'stock' => 10],
            ['category_id' => $tek,    'title' => 'Belajar Laravel untuk Pemula','author' => 'Budi Santoso',      'publisher' => 'Informatika',    'year' => 2023, 'stock' => 8],
            ['category_id' => $sastra, 'title' => 'Laskar Pelangi',              'author' => 'Andrea Hirata',      'publisher' => 'Bentang Pustaka','year' => 2005, 'stock' => 7],
            ['category_id' => $sastra, 'title' => 'Bumi Manusia',                'author' => 'Pramoedya Ananta Toer','publisher' => 'Hasta Mitra',  'year' => 1980, 'stock' => 5],
            ['category_id' => $sains,  'title' => 'A Brief History of Time',     'author' => 'Stephen Hawking',    'publisher' => 'Bantam Books',   'year' => 1988, 'stock' => 4],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
