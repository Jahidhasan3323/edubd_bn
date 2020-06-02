<?php

use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert(
            ['name' => 'অধ্যক্ষ']
        );
        DB::table('designations')->insert([
            ['name' => 'প্রধান শিক্ষক']
        ]);
        DB::table('designations')->insert([
            ['name' => 'সহকারী শিক্ষক']
        ]);
        DB::table('designations')->insert([
            ['name' => 'পিয়ন']
        ]);
        DB::table('designations')->insert([
            ['name' => 'আয়া']
        ]);
        DB::table('designations')->insert([
            ['name' => 'বাণিজ্য প্রশিক্ষক']
        ]);
        DB::table('designations')->insert([
            ['name' => 'অফিস সহকারী']
        ]);
        DB::table('designations')->insert([
            ['name' => 'রাঁধুনি']
        ]);
        DB::table('designations')->insert([
            ['name' => 'নাইট গার্ড']
        ]);
        DB::table('designations')->insert([
            ['name' => 'চালক']
        ]);
        DB::table('designations')->insert([
            ['name' => 'রাতের প্রহরী']
        ]);
        DB::table('designations')->insert([
            ['name' => 'প্রহরী']
        ]);
        DB::table('designations')->insert([
            ['name' => 'অন্যান্য']
        ]);
    }
}
