<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Game;
use App\Models\Seat;
use App\Models\Reservation;

class SeatSelection extends Component
{

    public $game;
    public $selectedSeats = [];
    public $customerName = '';
    public $phoneNumber = '';
    public $traslado = false;
    public $estacionamiento = false;
    public $souvenirs = false;

    protected $rules = [
        'customerName' => 'required|min:3',
        'phoneNumber' => 'required|min:10',
        'selectedSeats' => 'required|array|min:1',
    ];

    public function mount(Game $game)
    {
        $this->game = $game;
    }

    public function toggleSeat($seatId)
    {
        if (in_array($seatId, $this->selectedSeats)) {
            $this->selectedSeats = array_diff($this->selectedSeats, [$seatId]);
        } else {
            $this->selectedSeats[] = $seatId;
        }
    }

    public function submitReservation()
    {
        $this->validate();

        DB::transaction(function () {
            $reservation = Reservation::create([
                'game_id' => $this->game->id,
                'customer_name' => $this->customerName,
                'phone_number' => $this->phoneNumber,
                'traslado' => $this->traslado,
                'estacionamiento' => $this->estacionamiento,
                'souvenirs' => $this->souvenirs,
                'total_amount' => $this->game->price * count($this->selectedSeats),
            ]);

            foreach ($this->selectedSeats as $seatId) {
                $reservation->seats()->attach($seatId, ['game_id' => $this->game->id]);
            }
        });

        session()->flash('message', '¡Reservación completada exitosamente!');
        return redirect()->route('reservation.success');
    }

    public function getAvailableSeatsProperty()
    {
        $reservedSeats = DB::table('reservation_seat')
            ->where('game_id', $this->game->id)
            ->pluck('seat_id')
            ->toArray();

        $leftFieldSeats = Seat::where('zone', 'Field Jardin Izquierdo 124')
            ->orderBy('row')
            ->orderBy('seat_number')
            ->get()
            ->map(function ($seat) use ($reservedSeats) {
                $seat->available = !in_array($seat->id, $reservedSeats);
                return $seat;
            })
            ->groupBy('row');

        $rightFieldSeats = Seat::where('zone', 'Field Jardin Derecho 104')
            ->orderBy('row')
            ->orderBy('seat_number')
            ->get()
            ->map(function ($seat) use ($reservedSeats) {
                $seat->available = !in_array($seat->id, $reservedSeats);
                return $seat;
            })
            ->groupBy('row');

        return [
            'Zona Field Jardin Izquierdo 124' => $leftFieldSeats,
            'Zona Field Jardin Derecho 104' => $rightFieldSeats,
        ];
    }

    public function getTotalAmountProperty()
    {
        return $this->game->price * count($this->selectedSeats);
    }

    public function render()
    {
        return view('livewire.seat-selection', [
            'seatsByZone' => $this->availableSeats
        ]);
    }
}
