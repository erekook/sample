<?php

use Illuminate\Database\Seeder;
use App\Models\Forum;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('forums')->delete();

    for ($i=0; $i < 10; $i++) {
        \App\Models\Forum::create([
            'forum_subject'   => 'Subject '.$i,
            'forum_content'    => 'Content '.$i,
            'user_id' => 56,
        ]);
    }
    }
}
