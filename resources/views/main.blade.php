@extends('layouts.app')

@section('content')
    <div class="content">

        <!-----Tab of main order page ------------------>
        <div class="main_tabs" style="display: flex;">
            <button id="tab_left_btn" class="divided underlined">
                <h3>Il tuo ordine (8)</h3>
            </button>
            <button id="tab_right_btn"class="divided">
                <h3>Ordine del gruppo (49)</h3>
            </button>
        </div>
        <!---------------------------------------------->

        <div class="tabs_body">

            @include('partials.left_tab')

            @include('partials.right_tab')

        </div>
        <div id="user_id" data-user_id="{{ $user_id }}"></div>
        <div id="group_id" data-group_id="{{ $group_id }}"></div>
    </div>
@endsection
