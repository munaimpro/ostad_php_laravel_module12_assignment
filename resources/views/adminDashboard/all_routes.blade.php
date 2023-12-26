<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-2 p-2 bg-white rounded-lg">
                        <div class="row justify-content-center">
                            <div class="col-md-12 m-1">
                            @if(session('success'))
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h2 class="mb-0">Bus Routes</h2>
                                <div class="right">
                                    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#busModal">Add New Routes</button>
                                </div>
                            </div>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    
                                    <tr>
                                        <th>Sl</th>
                                        <th>Route Name</th>
                                        <th>From</th>
                                        <th>Time</th>
                                        <th>To</th>
                                        <th>Time</th>
                                        <th>Fare</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($busRoutes as $i => $route)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $route->boarding_point }}-{{ $route->dropping_point }}</td>
                                            <td>{{ $route->boarding_point }}</td>
                                            <td>{{ $route->boarding_time }}</td>
                                            <td>{{ $route->dropping_point }}</td>
                                            <td>{{ $route->dropping_time }}</td>
                                            <td>{{ $route->fare }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">No Route found.</td>
                                        </tr>
                                      @endforelse
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Section Start -->
<!-- Create New Bus -->
<div class="modal fade" id="busModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Bus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addbuss') }}" method="post">
                @csrf
            <div class="modal-body">
                <!-- Display the value in an input field dynamically using JavaScript -->
                <div class="form-group">
                        <label for="modalCreditsInput">Bus Name:</label>
                        <input type="text" id="modalCreditsInput" class="form-control" name="coach_name" placeholder="Enter Bus Name" required>
                </div>
                <div class="form-group">
                    <label for="modalCreditsInput">Type:</label>
                    <select class="form-control" id="modalCreditsInput" name="bus_type">
                        <option value="AC">AC</option>
                        <option value="Non-AC">Non-AC</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="modalCreditsInput">Seats Allocation:</label>
                        <input type="number" id="modalCreditsInput" class="form-control" name="total_seats" placeholder="Total Seats" required>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
         </form>
        </div>
    </div>
</div>
</x-app-layout>
