<?php

use Illuminate\Database\Seeder;

class ExamTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_types')->insert(
            ['name' => 'নির্বাচনী পরীক্ষা']
        );
        DB::table('exam_types')->insert([
            ['name' => 'মধ্যবর্তি পরীক্ষা']
        ]);
        DB::table('exam_types')->insert([
            ['name' => 'অর্ধবার্ষিকী পরীক্ষা']
        ]);
        DB::table('exam_types')->insert([
            ['name' => 'বার্ষিক পরীক্ষা']
        ]);
    }
}
