@extends('layouts.app')

{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <!-- <div class="content">
        <p class="text_component"></p>
        <p>Ecco fatto! ora puoi condividere i dettagli del gruppo con i tuoi amici</p>
        <div style="flex: 1;">
            <p class="text_component color_green">{{ $group_name }} ✨</p>
            <p>Il codice del gruppo è</p>
            <p id="group_id" class="text_component color_green">{{ $group_id }}</p>
            <div style="height: 150px; width: 150px; background-color: rgb(112, 112, 112); margin: 0px auto;">QR-CODE</div>
            <div class="text_component">
                <a id="join_link" href="#" class="color_green">{{ $join_link }}</a>
            </div>
            <p class="text_component">condividi il link con i tuoi amici e falli unire al gruppo!</p>
        </div>
    </div> -->

    <div class="p-4 bg-white rounded shadow">
            <p class="text-center">Ecco fatto! ora puoi condividere i dettagli del gruppo con i tuoi amici</p>
            <h2 class="text-center mb-3">✨ {{ $group_name }} ✨</h2>
            
            <h3 class="text-center mb-3">Il codice del gruppo è</h3>
            <p class="text-center">{{ $group_id }}</p>

        
            
            <div id="qr-code" style="height: 200px; width: 200px; background-color: rgb(112, 112, 112); margin: 0px auto;"></div>
            <div class="text-center mt-5">
                <a id="join_link" href="#">{{ $join_link }}</a>
            </div>
            <p class="text-center mt-2">condividi il link con i tuoi amici e falli unire al gruppo!</p>
        </div>
@endsection

@section('footer_btns')
    <!-- <button id="join_group_btn" class="button_component bg_grey">Unisciti al gruppo</button> -->
    <button id="join_group_btn" type="button" class="btn btn-warning btn-lg w-100 mb-2">Unisciti al gruppo</button>
    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
@endsection