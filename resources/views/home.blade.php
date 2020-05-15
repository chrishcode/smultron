@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-6/12 text-center">
            @if(Auth::user()->payed == true)
                <p>Welcome to Smultron! Let's get started!</p>
                <p class="mt-4">Clone this github repo</p>
                <code>git clone https://github.com/chrishcode/smultron.git myprojectname</code>
                <p class="mt-4">Paste your stripe keys into the .env file</p>
                <code>STRIPE_KEY=mystripekey <br>STRIPE_SECRET=mystripesecretkey</code>
                <p class="mt-4">Install dependencies, generate an app key, and start the server</p>
                <code>composer update --no-scripts <br> php artisan key:generate <br> php artisan serve</code>
                <p class="mt-4">That's it! Now you have a payed Laravel app up and running!</p>
            @elseif(Auth::user()->payed == false)
                <p class="text-red-400 text-4xl">$99</p>
                <p>Rapidly build payed Laravel apps! Pay $99 and get access today!</p>
                <p class="mt-4">Use stripes demo card during beta period.</p>
                <p>4242 4242 4242 4242 02/22 222</p>
                <form action="donate" method="post" id="payment-form" class="flex flex-col mt-4">
                    @csrf
                    <div class="form-row">
                        <!-- <label for="card-element">
                        Credit or debit card
                        </label> -->
                        <!-- <input type="text" name="donationAmount" class="outline-none mb-1 w-full bg-gray-100 px-3 py-2 rounded text-gray-500" placeholder="$"> -->
                        <div class="w-full" id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button type="submit" class="outline-none mt-4 bg-gray-100 px-1 py-2 rounded text-gray-500">Pay</button>
                </form>
            @endif
    </div>
@endsection
