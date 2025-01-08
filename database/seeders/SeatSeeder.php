<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Zona Field Jardin Izquierdo 124
        $leftFieldSeats = [
            'J' => ['4','5','6','7','8','9','10','11','12','13','14'],
            'I' => ['4','5','6','7','8','9','10','11','12','13','14'],
            'G' => ['7','8','9','10','11','12','13','14'],
            'F' => ['7','8','9','10','11','12','13'],
            'E' => ['7','8','9'],
            'D' => ['7','8','9'],
            'C' => ['6','7','8'],
        ];

        foreach ($leftFieldSeats as $row => $seats) {
            foreach ($seats as $seatNumber) {
                Seat::create([
                    'seat_number' => $seatNumber,
                    'zone' => 'Field Jardin Izquierdo 124',
                    'row' => $row,
                ]);
            }
        }

        // Zona Field Jardin Derecho 104
        $rightFieldSeats = [
            'M' => ['6','7','8','9','10','11','12','13','14'],
            'L' => ['6','7','8','9','10','11','12','13'],
            'K' => ['6','7','8','9','10','11','12','13','14'],
            'J' => ['6','7','8','9','10','11','12','13','14'],
            'C' => ['2','3','4','5','6','7','8','9','10','11','12','13'],
            'B' => ['6','7','8'],
        ];

        foreach ($rightFieldSeats as $row => $seats) {
            foreach ($seats as $seatNumber) {
                Seat::create([
                    'seat_number' => $seatNumber,
                    'zone' => 'Field Jardin Derecho 104',
                    'row' => $row,
                ]);
            }
        }
    }
}
