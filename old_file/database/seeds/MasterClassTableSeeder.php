<?php

use Illuminate\Database\Seeder;

class MasterClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_classes')->insert([
        	'name' => 'প্লে',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => 'নার্সারি',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => '১ম',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => '২য়',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৩য়',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৪র্থ',
        	'school_type_id'=>1
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৫ম',
        	'school_type_id'=>1
        ]);

        DB::table('master_classes')->insert([
        	'name' => '৬ষ্ঠ',
        	'school_type_id'=>2
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৭ম',
        	'school_type_id'=>2
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৮ম',
        	'school_type_id'=>2
        ]);
        DB::table('master_classes')->insert([
        	'name' => '৯ম',
        	'school_type_id'=>2
        ]);
        DB::table('master_classes')->insert([
        	'name' => '১০ম',
        	'school_type_id'=>2
        ]);

        DB::table('master_classes')->insert([
        	'name' => 'একাদশ',
        	'school_type_id'=>3
        ]);
        DB::table('master_classes')->insert([
            'name' => 'দ্বাদশ',
            'school_type_id'=>3
        ]);

        DB::table('master_classes')->insert([
            'name' => 'ডিগ্রী প্রথম বর্ষ',
            'school_type_id'=>3
        ]);

        DB::table('master_classes')->insert([
            'name' => 'ডিগ্রী দ্বিতীয় বর্ষ',
            'school_type_id'=>3
        ]);

        DB::table('master_classes')->insert([
        	'name' => 'ডিগ্রী তৃতীয় বর্ষ',
        	'school_type_id'=>3
        ]);
    }
}
