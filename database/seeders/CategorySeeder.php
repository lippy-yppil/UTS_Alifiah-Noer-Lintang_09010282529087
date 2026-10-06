<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Teknologi', 'description' => 'Buku seputar komputer dan pemrograman'],
            ['name' => 'Sastra',    'description' => 'Novel dan karya sastra'],
            ['name' => 'Sains',     'description' => 'Buku ilmu pengetahuan alam'],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
