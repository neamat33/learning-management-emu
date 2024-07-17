<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentFeesCategory;

class FeesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentFeesCategory::create(['name' => 'Admission Fee']);
        StudentFeesCategory::create(['name'=>  'Monthly Fee']);
        StudentFeesCategory::create(['name' => 'Exam Fee']);
        StudentFeesCategory::create(['name' => 'Others Fee']);
    }
}
