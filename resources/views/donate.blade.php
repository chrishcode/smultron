@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Donate</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="donate" method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                            <!-- <label for="card-element">
                            Credit or debit card
                            </label> -->
                            <input type="text" name="donationAmount" class="outline-none mb-1 w-full bg-gray-200 px-3 py-2 rounded text-gray-500" placeholder="$100">
                            <div class="w-full" id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button type="submit" class="outline-none mt-4 bg-gray-200 px-3 py-2 rounded-full text-gray-500">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
