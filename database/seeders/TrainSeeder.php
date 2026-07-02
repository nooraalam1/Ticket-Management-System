<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trains = [
            // Dhaka <-> Chattogram
            ['name' => 'Suborna Express', 'train_number' => '701'],
            ['name' => 'Sonar Bangla Express', 'train_number' => '787'],
            ['name' => 'Mahanagar Prabhati', 'train_number' => '703'],
            ['name' => 'Mahanagar Godhuli', 'train_number' => '704'],
            ['name' => 'Turna Express', 'train_number' => '741'],
            ['name' => 'Mahanagar Express', 'train_number' => '721'],
            ['name' => 'Chattala Express', 'train_number' => '67'],

            // Dhaka <-> Cox's Bazar
            ['name' => 'Cox\'s Bazar Express', 'train_number' => '815'],
            ['name' => 'Parjatak Express', 'train_number' => '817'],
            ['name' => 'Palongki Express', 'train_number' => '819'],

            // Dhaka <-> Sylhet
            ['name' => 'Parabat Express', 'train_number' => '709'],
            ['name' => 'Jayentika Express', 'train_number' => '717'],
            ['name' => 'Upaban Express', 'train_number' => '739'],
            ['name' => 'Kalni Express', 'train_number' => '773'],

            // Dhaka <-> Rajshahi
            ['name' => 'Silkcity Express', 'train_number' => '753'],
            ['name' => 'Padma Express', 'train_number' => '759'],
            ['name' => 'Dhumketu Express', 'train_number' => '769'],
            ['name' => 'Banalata Express', 'train_number' => '791'],
            ['name' => 'Madhumati Express', 'train_number' => '755'],

            // Dhaka <-> Khulna
            ['name' => 'Sundarban Express', 'train_number' => '725'],
            ['name' => 'Chitra Express', 'train_number' => '763'],

            // Dhaka <-> Northern Bangladesh
            ['name' => 'Ekota Express', 'train_number' => '705'],
            ['name' => 'Drutojan Express', 'train_number' => '757'],
            ['name' => 'Panchagarh Express', 'train_number' => '793'],
            ['name' => 'Rangpur Express', 'train_number' => '771'],
            ['name' => 'Nilsagar Express', 'train_number' => '765'],
            ['name' => 'Kurigram Express', 'train_number' => '797'],
            ['name' => 'Burimari Express', 'train_number' => '809'],
            ['name' => 'Chilahati Express', 'train_number' => '805'],
            ['name' => 'Karatoa Express', 'train_number' => '713'],

            // Dhaka <-> Mymensingh, Jamalpur, Netrokona & Dewanganj
            ['name' => 'Tista Express', 'train_number' => '707'],
            ['name' => 'Brahmaputra Express', 'train_number' => '743'],
            ['name' => 'Agnibina Express', 'train_number' => '735'],
            ['name' => 'Jamuna Express', 'train_number' => '745'],
            ['name' => 'Haor Express', 'train_number' => '777'],
            ['name' => 'Mohanganj Express', 'train_number' => '789'],
            ['name' => 'Bijoy Express', 'train_number' => '785'],

            // Dhaka <-> Kishoreganj
            ['name' => 'Egarosindhur Prabhati', 'train_number' => '737'],
            ['name' => 'Egarosindhur Godhuli', 'train_number' => '749'],
            ['name' => 'Kishoreganj Express', 'train_number' => '781'],

            // Dhaka <-> Southern Bangladesh
            ['name' => 'Benapole Express', 'train_number' => '795'],
            ['name' => 'Nakshikantha Express', 'train_number' => '15'],

            // Inter-Regional Routes
            ['name' => 'Paharika Express', 'train_number' => '719'],
            ['name' => 'Udayan Express', 'train_number' => '723'],
            ['name' => 'Kapotaksha Express', 'train_number' => '715'],
            ['name' => 'Sagardari Express', 'train_number' => '761'],
            ['name' => 'Rupsha Express', 'train_number' => '727'],
            ['name' => 'Simanta Express', 'train_number' => '747'],
            ['name' => 'Mahananda Express', 'train_number' => '25'],
            ['name' => 'Rocket Express', 'train_number' => '23'],
            ['name' => 'Titumir Express', 'train_number' => '733'],
            ['name' => 'Barendra Express', 'train_number' => '731'],
            ['name' => 'Uttara Express', 'train_number' => '31'],

            // Mail & Commuter Trains
            ['name' => 'Titas Commuter', 'train_number' => '33'],
            ['name' => 'Turag Express', 'train_number' => '51'],
            ['name' => 'Karnaphuli Commuter', 'train_number' => '03'],
            ['name' => 'Jalalabad Express', 'train_number' => '13'],
            ['name' => 'Surma Mail', 'train_number' => '09'],
            ['name' => 'Mymensingh Mail', 'train_number' => '53'],
            ['name' => 'Dhaka Commuter', 'train_number' => '91'],
            ['name' => 'Tangail Commuter', 'train_number' => '83'],
            ['name' => 'Lalmoni Commuter', 'train_number' => '61'],
            ['name' => 'Bogura Commuter', 'train_number' => '63'],
            ['name' => 'Padmarag Express', 'train_number' => '19'],

            // International Trains
            ['name' => 'Maitree Express', 'train_number' => '3107'],
            ['name' => 'Bandhan Express', 'train_number' => '13129'],
            ['name' => 'Mitali Express', 'train_number' => '13131'],
        ];

        foreach ($trains as $index => $train) {
            DB::table('trains')->insert([
                'id' => $index + 1,
                'name' => $train['name'],
                'train_number' => $train['train_number'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
    }
}
