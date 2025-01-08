<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard() : View {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('reservations'));
    }

    public function viewReservation(Reservation $reservation) : View {
        return view('view-reservation', compact('reservation'));
    }

}
