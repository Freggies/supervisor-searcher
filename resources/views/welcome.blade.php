<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supervisor Finder</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Figtree', sans-serif;
            overflow: hidden; /* Prevent scrolling */
        }

        .full-page {
            width: 100vw;
            height: 100vh;
            background-image: url('{{ asset('images/UITM.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff; /* Adjust text color for visibility */
        }

        /* Your existing styles */
        /* ... */
    </style>
</head>
<body>
    <div class="full-page">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 text-right">
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">

        <div class="mt-8 lg:mt-12">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                        <!-- If the user is authenticated, you can add content for authenticated users if needed -->
                        @else
                            <a href="{{ route('login') }}" class="btn-login">Student Log In</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-register">Student Register</a>
                            @endif
                            
                            @if (Route::has('lecturer.register'))
                                <a href="{{ route('lecturer.register') }}" class="btn-register">Lecturer Register</a>
                            @endif

                            @if (Route::has('lecturer.login'))
                                <a href="{{ route('login.form') }}" class="btn-login">Lecturer Log In</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

        </div>
    </div>
</body>
</html>

<style>
    .btn-login,
    .btn-register {
        display: inline-block;
        padding: 15px 25px; /* Adjusted padding for a bigger button */
        font-size: 18px; /* Adjusted font size for a bigger button */
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        border-radius: 8px; /* Adjusted border radius for a slightly rounded corner */
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-login {
        background-color: #6B46C1; /* Dark purple color */
        color: white;
    }

    .btn-register {
        background-color: #6B46C1; /* Dark purple color */
        color: white;
    }

    .btn-login:hover, .btn-register:hover {
        background-color: black; /* Black color on hover */
        color: white; /* White text on hover */
    }
</style>

