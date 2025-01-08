<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

<!-- component -->
<div class="flex justify-center items-center">

        <!-- Centering wrapper -->
        <div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="p-6">
                <h5 class="block font-sans text-lg font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased mb-2">
                    {{ $reservation->game->day_name }}
                </h5>
                <p class="text-sm">> {{ $reservation->game->match_1 }}</p>
                <p class="text-sm">> {{ $reservation->game->match_2 }}</p>
                <div class="divide-y divide-gray-200">
                <div class="m-2">
                    <p class="text-lg"><span class="font-bold">Cliente: </span> {{ $reservation->customer_name }} </p>
                    <p class="text-lg mt-2"><span class="font-bold">Celular: </span> {{ $reservation->phone_number }} </p>
                </div>
                    @foreach ($reservation->seats as $seat)
                        <div class="flex items-center justify-between pb-3 pt-3 last:pb-0">
                            <div class="flex items-center gap-x-3">
    
                                <div>
                                    <h6 class="block font-sans text-sm leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                        {{ $seat->zone }}
                                    </h6>
                                    <p class="block font-sans text-lg font-semibold leading-normal text-gray-700 antialiased">
                                        {{ $seat->row }}-{{ $seat->seat_number }}
                                    </p>
                                </div>
                            </div>
                            <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                $ {{ $reservation->game->price }}
                            </h6>
                        </div>
                    @endforeach
                </div>
                <hr/>
                <div class="mt-4">
                    <p class="antialiased font-light text-sm">Total</p>
                    <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased mb-2">
                        {{ '$' . number_format($reservation->game->price * $reservation->seats->count(), 2, '.', ',') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="block font-sans text-sm font-bold leading-normal text-blue-500 antialiased">
        < Volver
    </a>

        </div>
    </div>
</x-app-layout>
