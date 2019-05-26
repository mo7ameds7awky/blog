<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Blog',
            'contact_number' => '+20 123 456 4444',
            'contact_email' => 'info@blog.com',
            'address' => 'Helwan, Cairo, Egypt'
        ]);
    }
}
