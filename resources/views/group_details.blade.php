@extends('layouts.app')

{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <div class="content">
        <hr>
        <p class="text_component">Ecco i dettagli del gruppo</p>
        <div style="flex: 1;">
            <p class="text_component color_green">Il sushi del Sabato Sera ✨</p>
            <p class="text_component">Codice gruppo:</p>
            <p class="text_component color_green">IHB-WXG-SDT</p>
            <div style="height: 80px; width: 80px; background-color: white; margin: 0px auto;">QR-CODE</div>
            <div class="text_component">
                <a href="#" class="color_green">https://sushitogether.com/join/ihb-wxg-sdt</a>
            </div>
            <button class="button_component bg_green">Condividi</button>
            <p  class="text_component">Chiunque può partecipare al gruppo aprendo questo link</p>
            <hr>
        </div>
        <button class="button_component bg_green">Comincia Ordinare</button>
        <button class="button_component">Torna alla Home</button>
    </div>
@endsection
