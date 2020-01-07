<?php

use Illuminate\Database\Seeder;
use Maqalist\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Profile::create([
        'id' => 1,
        'FirstName' => 'Ragnar',
        'LastName' => 'Lodbrok',
        'About_Me' => 'it\s about rag',
        'user_id' => 1
      ]);

    }
}
