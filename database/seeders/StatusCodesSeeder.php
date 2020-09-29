<?php

namespace Database\Seeders;

use App\Models\StatusCode;
use App\Models\User;
use Illuminate\Database\Seeder;

class StatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userStatuses = [
            ['active', 'Active user'],
            ['unverified', 'Unverified user'],
            ['blocked', 'Blocked user'],
        ];

        foreach ($userStatuses as $userStatus) {
            list($key, $description) = $userStatus;
            StatusCode::firstOrCreate([
                'key' => $key,
                'description' => $description,
                'model' => User::class
            ]);
        }

    }
}
