<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LevelSeeder::class,
            CourseSeeder::class,
            WillLearnSeeder::class,
            RequirementSeeder::class,
            StepSeeder::class,
            TrackSeeder::class,
            TrackStepSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            BlogSeeder::class,
            CommentSeeder::class,
            StudentSeeder::class,
            BannerSeeder::class
        ]);
    }
}
