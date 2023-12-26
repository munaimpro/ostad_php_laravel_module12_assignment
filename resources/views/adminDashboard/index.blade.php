<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-8 p-4 bg-white rounded-lg">
                        <div class="row justify-content-center">
                            <div class="col-md-3 text-center m-1">
                                <div class="border">
                                    <div class="overflow-hidden p-3 text-danger">
                                        <div><i class="fa fa-users fa-5x"></i></div>
                                        <h1>{{ $totalUser }}</h1>
                                    </div>
                                    <div class="bg-danger text-white"><p class="fs-4 px-3 py-1 m-0">Customers</p></div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center m-1">
                                <div class="border">
                                    <div class="overflow-hidden p-3 text-success">
                                        <div><i class="fa fa-ticket fa-5x"></i></div>
                                        <h1>{{ $totalBooking }}</h1>
                                    </div>
                                    <div class="bg-success text-white"><p class="fs-4 px-3 py-1 m-0">Bookings</p></div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center m-1">
                                <div class="border">
                                    <div class="overflow-hidden p-3 text-warning">
                                        <div><i class="fa-solid fa-bus fa-5x"></i></div>
                                        <h1>{{ $totalBus }}</h1>
                                    </div>
                                    <div class="bg-warning text-white"><p class="fs-4 px-3 py-1 m-0">Buses</p></div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center m-1">
                                <div class="border">
                                    <div class="overflow-hidden p-3 text-primary">
                                        <div><i class="fa-solid fa-chair fa-5x"></i></div>
                                        <h1>36</h1>
                                    </div>
                                    <div class="bg-primary text-white"><p class="fs-4 px-3 py-1 m-0">Seats</p></div>
                                </div>
                            </div>

                            <div class="col-md-3 text-center m-1">
                                <div class="border">
                                    <div class="overflow-hidden p-3 text-dark">
                                        <div><i class="fa fa-road fa-5x"></i></div>
                                        <h1>{{ $totalRoute }}</h1>
                                    </div>
                                    <div class="bg-dark text-white"><p class="fs-4 px-3 py-1 m-0">Routes</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
