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
            <p class="text_component color_green">{{ $group_name }} ✨</p>
            <p class="text_component">Codice gruppo:</p>
            <p id="group_id" class="text_component color_green">{{ $group_id }}</p>
            <div style="height: 80px; width: 80px; background-color: white; margin: 0px auto;">QR-CODE</div>
            <div class="text_component">
                <a id="join_link" href="#" class="color_green">{{ $join_link }}</a>
            </div>
            <button class="button_component bg_green">Condividi</button>
            <p  class="text_component">Chiunque può partecipare al gruppo aprendo questo link</p>
            <hr>
        </div>
        <hr>
        <p class="text_component">Seleziona l’Emoji del tuo Avatar (opzionale)</p>
        <button class="button_component" disabled>Usa emoji casuale</button>
        <hr>
        <p class="text_component">Scegli il tuo nickname (obbligatorio)</p>
        <input id="new_name" class="input_component" placeholder="Stefano">
        <hr>
        <button id="begin_order_btn" class="button_component bg_green">Comincia ordinare</button>
        <button class="button_component">Torna indietro</button>
    </div>
@endsection
