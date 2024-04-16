<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @if (\Session::has('success'))
                    <div class="alert alert-success successAlert show-alert" role="alert">
                        {!! \Session::get('success') !!}
                    </div>
                @endif

                @if (\Session::has('error'))
                    <div class="alert alert-danger errorAlert show-alert" role="alert">
                        {!! \Session::get('error') !!}
                    </div>
                @endif

                    <h1>{{ __("List all breeds") }}</h1>
                    <div class="row">
                    @foreach ($breeds as $breed)
                        <div class="col-3">
                            <div class="card mb-5">
                                <img src="{{ $breed['image_link'] }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $breed['name'] }}</h5>
                                    <!-- Create a form for each like button -->
                                    <form action="{{ route('react') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="breed_id" value="{{ $breed['id'] }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ $breed->like_count ? 'You Liked' : 'Like'}}
                                            <span class="badge bg-secondary">{{ $breed->likes_count }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
