<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="row">
            
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Likes</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                               <tr>
                                    <th><img class="img-account-profile rounded-circle" width="50px" src="http://bootdey.com/img/Content/avatar/avatar{{$user->id}}.png" alt=""></th>
                                    <th scope="row">
                                        {{ $user->name }} 
                                        @if ($user->id == auth()->user()->id)
                                            <span class="badge bg-secondary">You</span>
                                        @endif
                                    </th>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->totalLikes }}</td>
                                    <td>
                                        <a href="{{ URL::to('users/' . $user->id) }}">
                                            <button type="button" class="btn btn-secondary">View</button>
                                        </a>
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
</x-app-layout>
