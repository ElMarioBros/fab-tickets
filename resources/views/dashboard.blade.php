<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                            <tr class="border-b border-slate-300 bg-slate-50">
                                <th class="p-4 text-sm font-normal leading-none text-slate-600">Cliente</th>
                                <th class="p-4 text-sm font-normal leading-none text-slate-600">Boletos</th>
                                <th class="p-4 text-sm font-normal leading-none text-slate-600">Día</th>
                                <th class="p-4 text-sm font-normal leading-none text-slate-600">Celular</th>
                                <th class="p-4 text-sm font-normal leading-none text-slate-600">Fecha</th>
                                <th class="p-4 text-sm font-normal leading-none text-slate-600"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reservations as $reservation)
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <p class="block font-semibold text-sm text-slate-800">{{ $reservation->customer_name }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <p class="ml-3 text-lg text-slate-500 font-bold">{{ $reservation->seats->count() }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <p class="text-sm text-slate-500">{{ $reservation->game->day_name }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <p class="text-sm text-slate-500">{{ $reservation->phone_number }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <p class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($reservation->created_at)->format('Y-m-d H:i') }}</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 py-5">
                                        <a href="{{ route('reservation.view', $reservation) }}" class="text-slate-500 hover:text-slate-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    
        </div>
    </div>
</x-app-layout>
