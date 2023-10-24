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
        <hr>
        <p class="text_component">Scegli il tuo nickname (obbligatorio)</p>
        <input id="new_name" class="input_component" placeholder="Stefano">
        <p class="text_component">Seleziona l’Emoji del tuo Avatar (opzionale)</p>
        <button class="button_component" disabled>Usa emoji casuale</button>
        <hr>
        <div style="flex: 1;">
            <p class="text_component">Inserisci il codice per unirti ad un gruppo esistente</p>
            <input class="input_component" type="text" placeholder="IHB-WXG-SDT">
            <button class="button_component bg_green">Unisciti al gruppo</button>
            <hr>
        </div>
        <p  class="text_component">Oppure Crea il tuo nuovo gruppo</p>
        <input id="new_group_name" class="input_component" placeholder="Mio nuovo gruppo">
        <button id="new_group_button" class="button_component bg_yellow">Crea nuovo gruppo</button>
    </div>
@endsection
