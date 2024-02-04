@extends('layouts.app')

{{-- @section('title', 'Page Title') --}}

{{-- @section('main_tabs')
    @parent

    <p>This is appended to the master main_tabs.</p>
@endsection --}}

@section('content')
    <div class="content">
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

        <button id="join_group_btn" class="button_component bg_grey">Unisciti al gruppo</button>
    </div>
@endsection
