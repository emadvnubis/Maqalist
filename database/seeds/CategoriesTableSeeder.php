<?php

use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'id'   => '1',
        'name' => 'فن وسينما',
        'slug' => 'movies-series',
      ]);

      DB::table('categories')->insert([
        'id'   => '2',
        'name' => 'برمجة',
        'slug' => 'programming',
      ]);

      DB::table('categories')->insert([
        'id'   => '3',
        'name' => 'أدب وفلسفة',
        'slug' => 'literature-philosophy',
      ]);

      DB::table('categories')->insert([
        'id'   => '4',
        'name' => 'رياضة',
        'slug' => 'sports',
      ]);
      DB::table('categories')->insert([
        'id'   => '5',
        'name' => 'أزياء وموضة',
        'slug' => 'fashion-style',
      ]);
      DB::table('categories')->insert([
        'id'   => '6',
        'name' => 'طب وصحة عامة',
        'slug' => 'medicine-public-health',
      ]);
    }
}
