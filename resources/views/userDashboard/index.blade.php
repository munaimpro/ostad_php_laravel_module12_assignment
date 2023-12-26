<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-8 p-4 bg-white rounded-lg shadow-md">
                        <h1 class="text-2xl text-slate-700 font-semibold mb-4">Bus Ticket Information</h1>
                    
                        <!-- Bus Ticket Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                <tr class="bg-sky-600">
                                    <th class="py-2 px-4 border-b">Trip Name</th>
                                    <th class="py-2 px-4 border-b">Coach No</th>
                                    <th class="py-2 px-4 border-b">Starting Counter</th>
                                    <th class="py-2 px-4 border-b">End Counter</th>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Seat</th>
                                    <th class="py-2 px-4 border-b">Price</th>
                                    <th class="py-2 px-4 border-b">Download</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ticketSales as $ticketSale)
                                    <tr class="duration-300 text-center">
                                        <td class="py-2 px-4 border-b">{{ $ticketSale->from }} to {{ $ticketSale->to }} trip</td>
                                        <td class="py-2 px-4 border-b">{{ $ticketSale->bus_id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $ticketSale->from }}</td>
                                        <td class="py-2 px-4 border-b">{{ $ticketSale->to }}</td>
                                        <td class="py-2 px-4 border-b">{{ $ticketSale->doj }}</td>
                                        <td class="py-2 px-4 border-b font-semibold">{{ $ticketSale->seat }}</td>
                                        <td class="py-2 px-4 border-b text-green-500 font-semibold">{{ $ticketSale->amount}}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="{{url('print_pdf',$ticketSale->id)}}" class="btn btn-dark bg-rose-500 p-1.5 rounded-md border-2 text-white hover:border-sky-600 hover:border-2 hover:bg-white hover:text-rose-600 duration-500">Download</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</x-app-layout>
