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
<!-- <div>
        <p>Inserisci il codice per unirti ad un gruppo esistente</p>
        <input id="join_group_id" class="input_component" type="text" placeholder="IHB-WXG-SDT...">
        <button id="join_group_button" class="button_component bg_green">Unisciti al gruppo</button>
        
        <p>Oppure Crea il tuo nuovo gruppo</p>
        
        <p>Per creare il tuo nuovo gruppo, scegli un nome da dargli</p>
        <input id="new_group_name" class="input_component" placeholder="Gruppo di sabato sera">
        <button id="new_group_button" class="button_component bg_yellow">Crea nuovo gruppo</button>
    </div> -->

    <div class="container py-5">
        <!-- Sezione: Unisciti al gruppo -->
        <div class="mb-4 p-4 bg-white rounded shadow">
            <h2 class="text-center mb-3">Unisciti a un gruppo</h2>
            <p class="text-center">Inserisci il codice per unirti a un gruppo esistente</p>
            <div class="mb-3">
                <input id="join_group_id" type="text" class="form-control" placeholder="IHB-WXG-SDT...">
            </div>
            <div class="text-center">
                <button id="join_group_button" class="btn btn-primary w-100">Unisciti al gruppo</button>
            </div>
        </div>

        <!-- Sezione: Crea un nuovo gruppo -->
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-center mb-3">Crea un nuovo gruppo</h2>
            <p class="text-center">Per creare un nuovo gruppo, scegli un nome da dargli</p>
            <div class="mb-3">
                <input id="new_group_name" type="text" class="form-control" placeholder="Gruppo di sabato sera">
            </div>
            <div class="text-center">
                <button id="new_group_button" class="btn btn-success w-100">Crea nuovo gruppo</button>
            </div>
        </div>
    </div>
@endsection

@section('footer_btns')
    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
@endsection