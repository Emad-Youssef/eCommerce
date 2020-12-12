<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create mainCategory
        factory(Category::class, 2)->create();
        
        $categories = Category::whereNull('parent_id')->get();
        // create subCategory
        foreach($categories as $index => $cate){
            Category::create([
                'name' => $index.'فرعي',
                'parent_id' => $cate->id,
                'slug' => $index.'-category-slug-test-'.$index,
                'is_active' => 1
            ]);
        }
    }
}
