<?php

namespace Database\Seeders;

use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define your dummy data
        $userTypes = [
            ['name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Head Of Department', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Teacher', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Student', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        // Insert the data into the user_types table
        UserType::insert($userTypes);
    }
}
