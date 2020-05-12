<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }

            .alert-success {
                background-color: red;
            }
            /**
            * The CSS shown here will not be introduced in the Quickstart guide, but shows
            * how you can use CSS to style your Element's container.
            */
            .StripeElement {
            font-family: 'Poppins', sans-serif;

            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #F7FAFC;

            .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
            border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
            }
        </style>
    </head>
    <body class="bg-white text-gray-500">
        <div class="flex justify-center w-screen h-screen">
            <div class="w-3/12 flex flex-col justify-center">
                <img src="{{ asset('laraflologo.png') }}" alt="Laraflo">
                <p class="text-center mt-4 mb-4">Rapidly build beautiful donation sites for your Laravel open source projects!</p>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <form action="donate" method="post" id="payment-form" class="flex flex-col">
                    @csrf
                    <div class="form-row">
                        <!-- <label for="card-element">
                        Credit or debit card
                        </label> -->
                        <input type="text" name="donationAmount" class="outline-none mb-1 w-full bg-gray-100 px-3 py-2 rounded text-gray-500" placeholder="$">
                        <div class="w-full" id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button type="submit" class="outline-none mt-4 bg-gray-100 px-1 py-2 rounded text-gray-500">Donate!</button>
                </form>
                <!-- <p class="text-center mt-4 text-xs">Made with <span class="text-lg" style="font-family: 'Sacramento', cursive;">Laraflo</span></p> -->
                <p class="text-center mt-4 text-xs">You are in trial mode, launching your site? But a licence!</p>
            </div>
        </div>
        <script>
            window.addEventListener('load',function(){
                    // Create a Stripe client.
                var stripe = Stripe('{{ env('STRIPE_KEY') }}');

                // Create an instance of Elements.
                var elements = stripe.elements();

                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                    color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
                };

                // Create an instance of the card Element.
                var card = elements.create('card', {
                    style: style,
                    hidePostalCode: true
                });

                // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
                });

                // Handle form submission.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                    }
                });
                });

                // Submit the form with the token ID.
                function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                
                // Submit the form
                form.submit();
                }
            });
        </script>
    </body>
</html>
