@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/12 text-center">
            <h1 class="text-2xl mb-4">Donations</h1>
            <p class="bg-gray-100 mb-2 text-center rounded py-4 text-gray-500"><span class="text-green-400 text-4xl">{{ count($donations) }}</span> <br> Total</p>
            <p class="bg-gray-100 mb-2 text-center rounded py-4 text-gray-500"><span class="text-green-400 text-4xl">${{ $revenue }}</span> <br> Revenue</p>
            <p class="mt-5 mb-3">Feed</p>
            @foreach ($donations as $donation)
                <p class="bg-gray-100 mb-2 text-center rounded py-4 text-gray-500"><span class="text-green-400 text-4xl">${{ $donation->amount }}</span> <br> {{ \Carbon\Carbon::parse($donation->created_at)->diffForHumans() }}</p>
            @endforeach
        </div>
    </div>
@endsection
