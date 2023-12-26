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
                                <h2 class="mb-0">Bus Stops</h2>
                                <div class="right">
                                    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#busModal">Add New Stops</button>
                                </div>
                            </div>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    
                                    <tr>
                                        <th>Sl</th>
                                        <th>Bus Stops</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($busStops as $i => $stops)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $stops->name }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">No stops found.</td>
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
                <h5 class="modal-title" id="exampleModalLabel">Create New Bus Stops</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add_busStops') }}" method="post">
                @csrf
            <div class="modal-body">
                <!-- Display the value in an input field dynamically using JavaScript -->
                <div class="form-group">
                        <label for="modalCreditsInput">Bus Stop Name:</label>
                        <input type="text" id="modalCreditsInput" class="form-control" name="name" placeholder="Enter Bus Stop Name" required>
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
