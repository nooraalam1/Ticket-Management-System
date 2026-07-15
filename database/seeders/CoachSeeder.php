<?php

namespace Database\Seeders;

use App\Models\CoachName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaches = [
            "KA",
            "KHA",
            "GA",
            "GHA",
            "UMA",
            "CHA",
            "CHHA",
            "JA",
            "JHA",
            "NEO",
            "TA",
            "THA",
            "DA",
            "DHA",
            "NA",
            "EXTRA-1",
            "EXTRA-2",
        ];

        foreach($coaches as $coach){
            CoachName::create([
                'name'=>$coach,
            ]);
        }
    }
}
