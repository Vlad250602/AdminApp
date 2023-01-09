<?php

namespace Database\Seeders;

use App\Models\position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('UTC');
        $faker = Faker::create('uk_UA');
        foreach(range(1,1000) as $value){
            $old_num = $faker->e164PhoneNumber;
            $job = $faker->jobTitle;
            if (!DB::table('positions')->where('pos_name', $job)->exists()){
                DB::table('positions')->insert([
                    'pos_name' =>$job,
                    'admin_created_id' => 'DB seeder',
                    'admin_updated_id' => 'DB seeder',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $number = '+38 (0' . substr(strval($old_num),4,2) . ") " .
                substr(strval($old_num),6,3) . ' ' .
                substr(strval($old_num),6,2) . ' '.
                substr(strval($old_num),6,2);
            DB::table('admins')->insert([
                'name' => $faker->name,
                'position' => $job,
                'emp_date' => $faker->dateTimeThisYear,
                'phone' => $number,
                'email' => $faker->freeEmail,
                'salary' => $faker->randomFloat(3,0,500),
                'photo' => 'emp_placeholder.png',
                'head' => '',
                'admin_created_id' => 'DB seeder',
                'admin_updated_id' => 'DB seeder',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
