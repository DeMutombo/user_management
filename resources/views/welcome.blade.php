<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="mx-auto">
        <div class="container mt-5 text-center"> 
                <div class="row">
                    <div class="col-12">
                        <h1> Wellcome to our user management System</h1>
                    </div>
                    <div class="col-12">
                        @if (Route::has('login'))
                            <div class="py-4">
                                <div>
                                    @auth
                                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                        @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </body>
</html>
