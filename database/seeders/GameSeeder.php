<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $games = [
            [
                'date' => '2025-01-31',
                'image_url' => 'https://i.ibb.co/h7KV079/1.jpg',
                'day_name' => 'Día 1',
                'price' => 5500,
                'match_1' => 'Venezuela 🇻🇪 vs 🇩🇴 República Dominicana',
                'match_2' => 'México 🇲🇽 vs 🇵🇷 Puerto Rico',
            ],
            [
                'date' => '2025-02-01',
                'image_url' => 'https://i.ibb.co/JzPDykP/2.jpg',
                'day_name' => 'Día 2',
                'price' => 4500,
                'match_1' => 'Japón 🇯🇵 vs 🇩🇴 República Dominicana',
                'match_2' => 'México 🇲🇽 vs 🇻🇪 Venezuela',
            ],
            [
                'date' => '2025-02-02',
                'image_url' => 'https://i.ibb.co/QjD5Q6h/3.jpg',
                'day_name' => 'Día 3',
                'price' => 5500,
                'match_1' => 'Japón 🇯🇵 vs 🇵🇷 Puerto Rico',
                'match_2' => 'República Dominicana 🇩🇴 vs 🇲🇽 México',
            ],
            [
                'date' => '2025-02-03',
                'image_url' => 'https://i.ibb.co/9GTTxFn/4.jpg',
                'day_name' => 'Día 4',
                'price' => 5500,
                'match_1' => 'Puerto Rico 🇵🇷 vs 🇻🇪 Venezuela',
                'match_2' => 'Japón 🇯🇵 vs 🇲🇽 México',
            ],
            [
                'date' => '2025-02-04',
                'image_url' => 'https://i.ibb.co/q0DnRBp/5.jpg',
                'day_name' => 'Día 5',
                'price' => 4500,
                'match_1' => 'Puerto Rico 🇵🇷 vs 🇩🇴 República Dominicana',
                'match_2' => 'Japón 🇯🇵 vs 🇻🇪 Venezuela',
            ],
            [
                'date' => '2025-02-05',
                'image_url' => 'https://i.ibb.co/DMz6P8D/6.jpg',
                'day_name' => 'Día 6',
                'price' => 5500,
                'match_1' => 'Semifinal grupo 1 ⚾',
                'match_2' => 'Semifinal grupo 2 ⚾',
            ],
            [
                'date' => '2025-02-06',
                'image_url' => 'https://i.ibb.co/YZCT6ZB/7.jpg',
                'day_name' => 'Día 7',
                'price' => 3000,
                'match_1' => 'Tercer Lugar 🥉',
                'match_2' => null,
            ],
            [
                'date' => '2025-02-07',
                'image_url' => 'https://i.ibb.co/6BqWSG2/8.jpg',
                'day_name' => 'Día 8',
                'price' => 5500,
                'match_1' => 'Final 🏆',
                'match_2' => null,
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}
