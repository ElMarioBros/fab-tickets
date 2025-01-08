<div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <img src="https://i.ibb.co/DKwsFRY/header.jpg"/>
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900">
                Selección de Asientos - {{ $game->day_name }}
            </h3>
            
            @foreach($seatsByZone as $zoneName => $zoneSeats)
                <div class="mt-8">
                    <h4 class="text-md font-medium text-gray-700">{{ $zoneName }}</h4>
                    <div class="mt-4 space-y-4">

                        @foreach($zoneSeats as $row => $rowSeats)

                            @php
                                $rowSeats = $rowSeats->sortBy(function ($seat) {
                                    return $seat->seat_number;
                                });
                            @endphp

                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-gray-500">Fila {{ $row }}</span>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($rowSeats as $seat)
                                        <button
                                            wire:click="toggleSeat({{ $seat->id }})"
                                            @class([
                                                'w-10 h-10 rounded-md flex items-center justify-center text-sm font-medium',
                                                'bg-gray-200 cursor-not-allowed' => !$seat->available,
                                                'bg-green-500 text-white' => in_array($seat->id, $selectedSeats),
                                                'bg-white border border-gray-300 hover:bg-gray-50' => $seat->available && !in_array($seat->id, $selectedSeats),
                                            ])
                                            @disabled(!$seat->available)
                                        >
                                            {{ $seat->seat_number }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <form wire:submit.prevent="submitReservation" class="mt-8 space-y-6">
                <div>
                    <label for="customerName" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" wire:model="customerName" id="customerName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('customerName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="text" wire:model="phoneNumber" id="phoneNumber" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('phoneNumber') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="traslado" id="traslado" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="traslado" class="ml-2 block text-sm text-gray-900">Traslado</label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" wire:model="estacionamiento" id="estacionamiento" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="estacionamiento" class="ml-2 block text-sm text-gray-900">Estacionamiento</label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" wire:model="souvenirs" id="souvenirs" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="souvenirs" class="ml-2 block text-sm text-gray-900">Souvenirs</label>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <div class="flex items-center justify-between">
                        <div class="space-y-1">
                            <p class="text-sm text-gray-500">Precio por asiento</p>
                            <p class="text-lg font-medium text-gray-900">${{ number_format($game->price, 2) }}</p>
                        </div>
                        <div class="space-y-1 text-right">
                            <p class="text-sm text-gray-500">Total por {{ count($selectedSeats) }} asiento(s)</p>
                            <p class="text-2xl font-bold text-gray-900">${{ number_format($this->totalAmount, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Confirmar Reservación
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>