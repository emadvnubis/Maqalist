<?php

use Illuminate\Database\Seeder;

class sub_categories_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sub_categories')->insert([
      'id' =>   1,
      'name' => 'أفلام ومسلسلات هوليوود',
      'slug' => 'hollywood-movies-series',
      'cat_id' => 1,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   2,
      'name' => 'أفلام ومسلسلات بريطانية',
      'slug' => 'british-movies-series',
      'cat_id' => 1,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   3,
      'name' => 'أفلام ومسلسلات مصرية',
      'slug' => 'egyptian-movies-series',
      'cat_id' => 1,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   4,
      'name' => 'أفلام ومسلسلات عربية',
      'slug' => 'arabic-movies-series',
      'cat_id' => 1,
      ]);

      DB::table('sub_categories')->insert([
      'id' =>   5,
      'name' => 'برمجة ويب',
      'slug' => 'web-dev',
      'cat_id' => 2,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   6,
      'name' => 'أندرويد',
      'slug' => 'android-tips',
      'cat_id' => 2,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   7,
      'name' => 'نظام تشغيل لينكس',
      'slug' => 'linux-distros',
      'cat_id' => 2,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   8,
      'name' => 'نظام تشغيل ويندوز',
      'slug' => 'windows-os',
      'cat_id' => 2,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   9,
      'name' => 'أدب روائى وقصص قصيرة',
      'slug' => 'short-stories',
      'cat_id' => 3,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   10,
      'name' => 'فلسفة بشكل عام',
      'slug' => 'philosphy-in-generals',
      'cat_id' => 3,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   11,
      'name' => 'مقالات اجتماعية',
      'slug' => 'social-aticles',
      'cat_id' => 3,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   12,
      'name' => 'فلاسفة تركوا بصمة وتركوا جدل',
      'slug' => 'oh-boy',
      'cat_id' => 3,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   13,
      'name' => 'الدورى الانجليزى',
      'slug' => 'priemier-leauge',
      'cat_id' => 4,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   14,
      'name' => 'الدورى الأسبانى',
      'slug' => 'spain',
      'cat_id' => 4,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   15,
      'name' => 'دورى أبطال أوروبا',
      'slug' => 'europe',
      'cat_id' => 4,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   16,
      'name' => 'الدورى المصرى',
      'slug' => 'egyptain-leauge',
      'cat_id' => 4,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   17,
      'name' => 'موضة عالمية',
      'slug' => 'national-fashions',
      'cat_id' => 5,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   18,
      'name' => 'موضة محلية',
      'slug' => 'local-fashions',
      'cat_id' => 5,
      ]);
      DB::table('sub_categories')->insert([
      'id' =>   19,
      'name' => 'مكياج وميك أب',
      'slug' => 'mickup',
      'cat_id' => 5,
      ]);
    }
}
