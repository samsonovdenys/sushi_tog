@extends('layouts.app')

{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <div class="content">
        <p class="text_component"></p>
        <p class="text_component">Ti stai per unire al gruppo</p>
        <div style="flex: 1;">
            {{-- <p class="text_component color_green">{{ $group_name }} ✨</p> --}}

        {{-- <p class="text_component">Scegli il tuo nickname e l’emoji per il tuo avatar</p>
        <button class="button_component" disabled>Usa emoji casuale</button> --}}
        <p class="text_component"></p>
        <p class="text_component">Scegli il tuo nickname (obbligatorio)</p>
        <input id="new_name" class="input_component" placeholder="Stefano">

        <button id="begin_order_btn" class="button_component bg_grey">Comincia ordinare</button>
    </div>
@endsection
