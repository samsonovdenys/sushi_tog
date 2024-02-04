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
                <svg width="76" height="62" viewBox="0 0 76 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.6667 45.25C16.1645 45.25 19 42.4144 19 38.9166C19 35.4188 16.1645 32.5833 12.6667 32.5833C9.16886 32.5833 6.33333 35.4188 6.33333 38.9166C6.33333 42.4144 9.16886 45.25 12.6667 45.25Z" fill="#D9D9D9"/>
                <path d="M3.86333 50.2533C1.52 51.2666 0 53.5466 0 56.1116V61.0833H14.25V55.985C14.25 53.3566 14.9783 50.8866 16.245 48.7333C15.0733 48.5433 13.9017 48.4166 12.6667 48.4166C9.53167 48.4166 6.555 49.0816 3.86333 50.2533Z" fill="#D9D9D9"/>
                <path d="M63.3333 45.25C66.8311 45.25 69.6667 42.4144 69.6667 38.9166C69.6667 35.4188 66.8311 32.5833 63.3333 32.5833C59.8355 32.5833 57 35.4188 57 38.9166C57 42.4144 59.8355 45.25 63.3333 45.25Z" fill="#D9D9D9"/>
                <path d="M72.1367 50.2533C69.445 49.0816 66.4683 48.4166 63.3333 48.4166C62.0983 48.4166 60.9267 48.5433 59.755 48.7333C61.0217 50.8866 61.75 53.3566 61.75 55.985V61.0833H76V56.1116C76 53.5466 74.48 51.2666 72.1367 50.2533Z" fill="#D9D9D9"/>
                <path d="M51.4267 47.3083C47.7217 45.6616 43.1617 44.4583 38 44.4583C32.8383 44.4583 28.2783 45.6933 24.5733 47.3083C21.1533 48.8283 19 52.2483 19 55.985V61.0833H57V55.985C57 52.2483 54.8467 48.8283 51.4267 47.3083Z" fill="#D9D9D9"/>
                <path d="M28.5 32.5833C28.5 37.84 32.7433 42.0833 38 42.0833C43.2567 42.0833 47.5 37.84 47.5 32.5833C47.5 27.3266 43.2567 23.0833 38 23.0833C32.7433 23.0833 28.5 27.3266 28.5 32.5833Z" fill="#D9D9D9"/>
                <path d="M7.85333 28.9733C6.87167 26.5666 6.33333 24.2233 6.33333 21.8166C6.33333 13.6466 12.73 7.24996 20.9 7.24996C29.3867 7.24996 32.9967 12.76 38 18.6183C42.9717 12.8233 46.55 7.24996 55.1 7.24996C63.27 7.24996 69.6667 13.6466 69.6667 21.8166C69.6667 24.2233 69.1283 26.5666 68.1467 28.9733C70.205 29.955 71.8833 31.57 72.9917 33.5333C74.8917 29.7333 76 25.87 76 21.8166C76 10.1 66.8167 0.916626 55.1 0.916626C48.4817 0.916626 42.1483 3.98829 38 8.86496C33.8517 3.98829 27.5183 0.916626 20.9 0.916626C9.18333 0.916626 0 10.1 0 21.8166C0 25.87 1.10833 29.7333 3.04 33.5333C4.14833 31.57 5.82667 29.955 7.85333 28.9733Z" fill="#D9D9D9"/>
                </svg>
            </p>
            <p class="text_component">basta stress e confusione quando si ordina il sushi al ristorante, ci pensiamo noi!</p>
        </div>
        <button id="iniziamo_btn" class="button_component bg_grey">Iniziamo</button>
    </div>
@endsection

