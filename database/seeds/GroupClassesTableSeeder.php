<?php

use Illuminate\Database\Seeder;

class GroupClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_classes')->insert(
            ['name' => 'জেনারেল']
        );
        DB::table('group_classes')->insert([
            ['name' => 'বিজ্ঞান']
        ]);
        DB::table('group_classes')->insert([
            ['name' => 'মানবিক']
        ]);

        DB::table('group_classes')->insert([
            ['name' => 'বাণিজ্য']
        ]);
    }
}
