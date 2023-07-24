<?php

use Illuminate\Database\Seeder;

class JobsLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ravi_job_locations')->insert([
            'name' => 'Hà Nội',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'Hải Phòng',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'Nghệ An',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'HCM',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'Nam Định',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'Thái Bình',
            'status' => 'publish'
        ]);

        DB::table('ravi_job_locations')->insert([
            'name' => 'Hải Phòng',
            'status' => 'publish'
        ]);
    }
}
