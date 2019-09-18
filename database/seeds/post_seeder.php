<?php

use App\post;
use Illuminate\Database\Seeder;

class post_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(post::class,100)->create();
    }
}
