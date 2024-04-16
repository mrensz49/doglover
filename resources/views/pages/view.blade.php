<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="container-xl px-4 mt-4">

                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">User Profile</div>
                                <div class="card-body text-center">
                                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar{{$user->id}}.png" alt="">
                                    <div class="small font-italic text-muted"><strong>Name:</strong> {{ $user->name }}</div>
                                    <div class="small font-italic text-muted"><strong>Email:</strong> {{ $user->email }}</div>
                                    <div class="small font-italic text-muted"><strong>Mobile:</strong> {{ $user->mobile }}</div>
                                    <div class="small font-italic text-muted"><strong>Address:</strong> {{ $user->address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Likes</div>
                                <div class="card-body">
                                <div class="row">
                    
                                        @foreach ($likes as $like)
                                        <div class="col-4">
                                            <div class="card mb-5">
                                                <img src="{{ $like->likeable->image_link }}" class="card-img-top" alt="{{ $like->likeable->name; }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $like->likeable->name; }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if (!count($likes)) 
                                            <p>No likes yet!</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
