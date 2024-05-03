@extends('layouts.app')

{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}


{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <div class="content">

        <div style="flex: 1;">
            <p class="text_component">Benvenuti in</p>
            <h2 class="title">Sushi Together</h2>
            <p class="text_component">l’app che ti aiuta a ordinare
                il sushi con i tuoi amici!</p>
            <p class="text_component">
                <svg width="200" height="200" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="black">
                <!-- Prima figura umana, testa più vicina al corpo -->
                <path d="M15,55 Q25,20 35,55" stroke-width="2" fill="white"/> <!-- Corpo -->
                <circle cx="25" cy="30" r="7" fill="white" stroke="black"/> <!-- Testa più vicina -->
                <path d="M15,55 Q25,65 35,55" stroke-width="2"/> <!-- Mani unite al centro -->

                <!-- Seconda figura umana, testa più vicina al corpo -->
                <path d="M40,55 Q50,20 60,55" stroke-width="2" fill="white"/>
                <circle cx="50" cy="30" r="7" fill="white" stroke="black"/> <!-- Testa più vicina -->
                <path d="M40,55 Q50,65 60,55" stroke-width="2"/>
                
                <!-- Terza figura umana, testa più vicina al corpo -->
                <path d="M65,55 Q75,20 85,55" stroke-width="2" fill="white"/>
                <circle cx="75" cy="30" r="7" fill="white" stroke="black"/> <!-- Testa più vicina -->
                <path d="M65,55 Q75,65 85,55" stroke-width="2"/>
                
                <!-- Piatto mantenuto nella posizione richiesta -->
                <ellipse cx="50" cy="57" rx="30" ry="8" fill="white" stroke="black"/>
                </svg>
            </p>
            <p class="text_component">basta stress e confusione quando si ordina il sushi al ristorante, ci pensiamo noi!</p>
        </div>
        <button id="iniziamo_btn" class="button_component bg_grey">Iniziamo</button>
    </div>
@endsection

