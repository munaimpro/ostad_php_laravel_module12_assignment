<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-2 p-2 bg-white rounded-lg">
                        <div class="row justify-content-center">
                            <div class="col-md-12 m-1">
                                <h2>All User List</h2>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($usersList as $i => $user)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">No users found.</td>
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
</x-app-layout>
