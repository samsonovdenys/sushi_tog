@extends('layouts.app')

{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <!-- <div class="content">
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
    </div> -->

        <!-- Scegli il tuo nickname -->
        <div class="p-4 bg-white rounded shadow">
            <p class="text-center">Scegli il tuo nickname e l’emoji per il tuo avatar</p>
            <h2 class="text-center mb-3">Scegli il tuo nickname</h2>
            <div class="mb-3">
                <input id="new_name" type="text" class="form-control" placeholder="Stefano">
            </div>
            <h2 class="text-center mb-3">Scegli avatar</h2>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder=";-)" disabled>
            </div>
            <button class="button_component" disabled>Usa emoji casuale</button>
            
            <p class="text-center">Ti stai per unire al gruppo ✨ groupName</p>
        </div>

@endsection

@section('footer_btns')
    <!-- <button id="begin_order_btn" class="button_component bg_grey">Comincia ordinare</button> -->
    <button id="begin_order_btn" type="button" class="btn btn-warning btn-lg w-100 mb-2">Comincia ordinare</button>
    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
@endsection