<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex bg-blue-100 rounded-lg p-4 mt-6 text-sm text-blue-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">¿No estan disponibles los asientos que quieres?</span> Nosotros podemos ayudarte a adquirirlos
        </div>
    </div>
    <center>
        <div class="mt-2 mb-8">
            <a href="https://api.whatsapp.com/send?phone=5216867861084" target="_blank"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex w-44"
                type="submit">
                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                    <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                </svg>
                    Contáctanos
            </a>
        </div>
    </center>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($games as $game)
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <img src="{{ $game->image_url }}"/>
                <div class="px-4 py-5 sm:p-6">
                    <div class="text-2xl font-medium text-gray-900 text-center">
                        {{ $game->day_name }}
                    </div>
                    <div class="mt-2 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($game->date)->format('d/m/Y') }}
                    </div>
                    <div class="mt-3 text-sm">
                        <p class="font-medium">{{ $game->match_1 }}</p>
                        @if($game->match_2)
                            <p class="font-medium mt-1">{{ $game->match_2 }}</p>
                        @endif
                    </div>
                    <div class="mt-4">
                        <span class="text-2xl font-bold">${{ number_format($game->price, 2) }}</span>
                    </div>
                    <button 
                        wire:click="selectGame({{ $game->id }})"
                        class="mt-4 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Seleccionar
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>