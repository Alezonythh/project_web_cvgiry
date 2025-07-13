<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            .text-custom-primary {
                color: #ff8c00;
            }
            .hover\:text-custom-primary:hover {
                color: #ff6b00;
            }
            .bg-custom-primary {
                background-color: #ff8c00;
            }
            .hover\:bg-custom-primary-dark:hover {
                background-color: #cc5500;
            }
            .focus\:ring-custom-primary:focus {
                --tw-ring-color: #ff8c00;
            }
            .border-custom-primary {
                border-color: #ff8c00;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            {{ $slot }}
        </div>
    </body>
</html>
