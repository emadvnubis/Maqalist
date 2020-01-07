<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     private $desc = 'صديقى من تقرأ هذه السطور الان ان كنت تنوى ان تعزز افكارك و تريح نفسك من ضغوط واعباء الحياه
فنصيحتى لك ان تبدأ فى تحميل هذا الفيلم الرائع
وفيما يلى توضيح لأبعاد هذا الفيلم الدرامية , فالفيلم درامى اجتماعى بحت ويذهب بك الى عالم تتمنى ان تكون فعلا فيه
فعن روبيرت دينيرو هذا العبقرى البسيط صاحب الأداء الواثق الهادئ
والجميلة آن هاثوي الحديث لن يتنهى
هو رجل سبعينى متقاعد " ارمل "	 يتقدم للعمل كمتدرب في شركة للأزياء والتى تملكها وتديرها آن هاثوي ويتناول الفيلم احداث ومواقف اجتماعية يقوم فيها روبيرت بمساندة " آن " نفسيا حتى تتغلب على ما يقلقها نفسيا ويزعزع ثقتها
تقييم الفيلم 7.2/10';
    public function run()
    {
      DB::table('posts')->insert([
      'title' => 'مراجعة فيلم The Intern',
      'body' => $this->desc,
      'image' => '/uploads/built_in/the-intern.jpg',
      'meta_description' => 'وصف محتوى الميتا 1',
      'slug' => 'the-intern-review',
      'category_id' => 1,
      'sub_category_id' => 1,
      ]);
      DB::table('posts')->insert([
      'title' => 'مراجعة فيلم Big Hero 6 " 2014 " ديزنى',
      'body' => $this->desc,
      'image' => '/uploads/built_in/big-hero.jpg',
      'meta_description' => 'وصف محتوى الميتا 2',
      'slug' => 'big-hero-review',
      'category_id' => 1,
      'sub_category_id' => 1,
      ]);
      DB::table('posts')->insert([
      'title' => 'مراجعة لفيلم Captain Phillips للمتألق توم هانكس',
      'body' => $this->desc,
      'image' => '/uploads/built_in/c_philips.jpg',
      'meta_description' => 'وصف محتوى الميتا 3',
      'slug' => 'captain-philips',
      'category_id' => 1,
      'sub_category_id' => 2,
      ]);
      DB::table('posts')->insert([
      'title' => 'مراجعة فيلم Dope " كوميديا اجتماعية',
      'body' => $this->desc,
      'image' => '/uploads/built_in/dope.jpg',
      'meta_description' => 'وصف محتوى الميتا 4',
      'slug' => 'dope-movie-review',
      'category_id' => 1,
      'sub_category_id' => 2,
      ]);

      DB::table('posts')->insert([
      'title' => 'فنان مصرى معروف يصل مطار لوس انجلوس اليوم',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 5',
      'slug' => 'how-to-set-options-for-options-5',
      'category_id' => 1,
      'sub_category_id' => 3,
      ]);
      DB::table('posts')->insert([
      'title' => 'أخبار الناس والمجتمع فى أقرب لحظة وصول',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 6',
      'slug' => 'how-to-set-options-for-options-6',
      'category_id' => 1,
      'sub_category_id' => 3,
      ]);
      DB::table('posts')->insert([
      'title' => 'تقارير صحفية كروية شقية',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 7',
      'slug' => 'how-to-set-options-for-options-7',
      'category_id' => 1,
      'sub_category_id' => 4,
      ]);
      DB::table('posts')->insert([
      'title' => 'النصر او الهزيمة ينتظر الأحمر',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 8',
      'slug' => 'how-to-set-options-for-options-8',
      'category_id' => 1,
      'sub_category_id' => 4,
      ]);

      DB::table('posts')->insert([
      'title' => 'كرة قدم المحترفين فى ازهى عصورها',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 9',
      'slug' => 'how-to-set-options-for-options-9',
      'category_id' => 2,
      'sub_category_id' => 5,
      ]);
      DB::table('posts')->insert([
      'title' => 'هذا المقال فيه سم قاتل _!',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 10',
      'slug' => 'how-to-set-options-for-options-10',
      'category_id' => 2,
      'sub_category_id' => 5,
      ]);
      DB::table('posts')->insert([
      'title' => 'لحظة وصول عاهد البحرين مطار الرياض',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 11',
      'slug' => 'how-to-set-options-for-options-11',
      'category_id' => 2,
      'sub_category_id' => 6,
      ]);
      DB::table('posts')->insert([
      'title' => 'التشابه الكبير بين النجم المصرى والتركى',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 12',
      'slug' => 'how-to-set-options-for-options-12',
      'category_id' => 2,
      'sub_category_id' => 6,
      ]);

      DB::table('posts')->insert([
      'title' => 'اغنية جديدة شائعة , هل تعرفها ؟',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 13',
      'slug' => 'how-to-set-options-for-options-13',
      'category_id' => 2,
      'sub_category_id' => 7,
      ]);
      DB::table('posts')->insert([
      'title' => 'نتائج ايجابية بالجملة فى مقر الحملة',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 14',
      'slug' => 'how-to-set-options-for-options-14',
      'category_id' => 2,
      'sub_category_id' => 7,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 15',
      'slug' => 'how-to-set-options-for-options-15',
      'category_id' => 2,
      'sub_category_id' => 8,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 16',
      'slug' => 'how-to-set-options-for-options-16',
      'category_id' => 2,
      'sub_category_id' => 8,
      ]);


      DB::table('posts')->insert([
      'title' => 'اغنية جديدة شائعة , هل تعرفها ؟',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 17',
      'slug' => 'how-to-set-options-for-options-17',
      'category_id' => 3,
      'sub_category_id' => 9,
      ]);
      DB::table('posts')->insert([
      'title' => 'نتائج ايجابية بالجملة فى مقر الحملة',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 18',
      'slug' => 'how-to-set-options-for-options-18',
      'category_id' => 3,
      'sub_category_id' => 9,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 19',
      'slug' => 'how-to-set-options-for-options-19',
      'category_id' => 3,
      'sub_category_id' => 10,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 20',
      'slug' => 'how-to-set-options-for-options-20',
      'category_id' => 3,
      'sub_category_id' => 10,
      ]);

      DB::table('posts')->insert([
      'title' => 'اغنية جديدة شائعة , هل تعرفها ؟',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 21',
      'slug' => 'how-to-set-options-for-options-21',
      'category_id' => 3,
      'sub_category_id' => 11,
      ]);
      DB::table('posts')->insert([
      'title' => 'نتائج ايجابية بالجملة فى مقر الحملة',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 22',
      'slug' => 'how-to-set-options-for-options-22',
      'category_id' => 3,
      'sub_category_id' => 11,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 23',
      'slug' => 'how-to-set-options-for-options-23',
      'category_id' => 3,
      'sub_category_id' => 12,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 24',
      'slug' => 'how-to-set-options-for-options-24',
      'category_id' => 3,
      'sub_category_id' => 12,
      ]);


      DB::table('posts')->insert([
      'title' => 'اغنية جديدة شائعة , هل تعرفها ؟',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 25',
      'slug' => 'how-to-set-options-for-options-25',
      'category_id' => 4,
      'sub_category_id' => 13,
      ]);
      DB::table('posts')->insert([
      'title' => 'نتائج ايجابية بالجملة فى مقر الحملة',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 26',
      'slug' => 'how-to-set-options-for-options-26',
      'category_id' => 4,
      'sub_category_id' => 13,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 27',
      'slug' => 'how-to-set-options-for-options-27',
      'category_id' => 4,
      'sub_category_id' => 15,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 28',
      'slug' => 'how-to-set-options-for-options-28',
      'category_id' => 4,
      'sub_category_id' => 15,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 29',
      'slug' => 'how-to-set-options-for-options-29',
      'category_id' => 4,
      'sub_category_id' => 16,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 30',
      'slug' => 'how-to-set-options-for-options-30',
      'category_id' => 4,
      'sub_category_id' => 16,
      ]);


      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 31',
      'slug' => 'how-to-set-options-for-options-31',
      'category_id' => 5,
      'sub_category_id' => 17,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 32',
      'slug' => 'how-to-set-options-for-options-32',
      'category_id' => 5,
      'sub_category_id' => 17,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 33',
      'slug' => 'how-to-set-options-for-options-33',
      'category_id' => 5,
      'sub_category_id' => 18,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 34',
      'slug' => 'how-to-set-options-for-options-34',
      'category_id' => 5,
      'sub_category_id' => 18,
      ]);
      DB::table('posts')->insert([
      'title' => 'نظير المال ونظير الرمال',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 35',
      'slug' => 'how-to-set-options-for-options-35',
      'category_id' => 5,
      'sub_category_id' => 19,
      ]);
      DB::table('posts')->insert([
      'title' => 'مقال ذو طابع هادئ لكن لا تنخدع',
      'body' => 'Test Description',
      'image' => '/uploads/posts/1576346967combo.jpg',
      'meta_description' => 'وصف محتوى الميتا 36',
      'slug' => 'how-to-set-options-for-options-36',
      'category_id' => 5,
      'sub_category_id' => 19,
      ]);
    }
}
