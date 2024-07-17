<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new Setting();
        $setting->company = 'EMU ';
        $setting->logo = 'asset/images/logo.png';
        $setting->address = 'Barisal, Bangladesh';
        $setting->email = '#';
        $setting->phone = '#';
        $setting->save();
    }
}
