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


@section('content')
    <div class="content">

        <div style="flex: 1;">
            <p class="text_component"></p>
            <p class="text_component">Inserisci il codice per unirti ad un gruppo esistente</p>
            <input id="join_group_id" class="input_component" type="text" placeholder="IHB-WXG-SDT...">
            <button id="join_group_button" class="button_component bg_green">Unisciti al gruppo</button>
            <p class="text_component"></p>
            <p class="text_component">Oppure Crea il tuo nuovo gruppo</p>
            <p class="text_component">Per creare il tuo nuovo gruppo, scegli un nome da dargli</p>
            <input id="new_group_name" class="input_component" placeholder="Gruppo di sabato sera">
            <button id="new_group_button" class="button_component bg_yellow">Crea nuovo gruppo</button>
        </div>
    </div>
@endsection
