<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->createCategories([
             'World',
             'Technology',
             'Design',
             'Culture',
             'Business',
             'Politics',
             'Opinion',
             'Science',
             'Health'
         ]);


    }

    private function createCategories(array $array)
    {
        foreach ($array as $category){
            Category::create([
                'name'=>$category
            ]);
        }
    }
}
