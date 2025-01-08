<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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